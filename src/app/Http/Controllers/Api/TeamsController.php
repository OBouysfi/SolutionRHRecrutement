<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Models\SocialiteModel;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class TeamsController extends Controller
{
    // Rediriger vers Microsoft pour l'authentification
    public function redirectToMicrosoft()
    {
        $url = "https://login.microsoftonline.com/" . config('services.microsoft.tenant_id') . "/oauth2/v2.0/authorize?" . http_build_query([
            'client_id' => config('services.microsoft.client_id'),
            'response_type' => 'code',
            'redirect_uri' => config('services.microsoft.redirect'),
            'response_mode' => 'query',
            'scope' => 'https://graph.microsoft.com/.default',
            'state' => csrf_token(),
        ]);

        return redirect()->away($url);
    }

    // Récupérer le token d'accès après authentification
    public function handleMicrosoftCallback(Request $request)
    {
        $user = SocialiteModel::where('user_id', Auth::id())->first();

        $code = $request->get('code');

        // $response = Http::asForm()->post("https://login.microsoftonline.com/" . config('services.microsoft.tenant_id') . "/oauth2/v2.0/token", [
        //     'client_id' => config('services.microsoft.client_id'),
        //     'client_secret' => config('services.microsoft.client_secret'),
        //     'grant_type' => 'authorization_code',
        //     'redirect_uri' => config('services.microsoft.redirect'),
        //     'code' => $code,
        //     'scope' => 'https://graph.microsoft.com/.default',
        // ]);

        $response = Http::asForm()->post('https://login.microsoftonline.com/' . config('services.microsoft.tenant_id') . '/oauth2/v2.0/token', [
            'client_id' => config('services.microsoft.client_id'),
            'client_secret' => config('services.microsoft.client_secret'),
            'grant_type' => 'authorization_code',
            'redirect_uri' => config('services.microsoft.redirect'),
            'code' => $code,
            'scope' => 'https://graph.microsoft.com/OnlineMeetings.ReadWrite https://graph.microsoft.com/User.Read'
        ]);

        $user = SocialiteModel::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'token_microsoft' => $response->json()['access_token'] ?? $user->token_microsoft,
                'refreshToken_microsoft' => $response->json()['refresh_token'] ?? $user->refreshToken_microsoft,
                'status_microsoft' => true,
            ]
        );
        // return $response->json();

        $token = $response->json()['access_token'] ?? null;

        if (!$token) {
            return response()->json(['error' => 'Impossible de récupérer le token d\'accès.'], 500);
        }

        session(['microsoft_token' => $user->token_microsoft]);

        return redirect()->route('teams.create-meeting');
    }
    public function createTeamsMeeting(Request $request)
    {
        // Récupérer le token Microsoft depuis la base de données
        $socialite = SocialiteModel::where('user_id', Auth::id())->first();

        if (!$socialite || !$socialite->token_microsoft) {
            return redirect()->route('teams.redirect')->with('error', 'Vous devez vous connecter avec Microsoft.');
        }

        $accessToken = $socialite->token_microsoft;

        try {
            // Récupérer les détails de la réunion depuis la session
            $meetingTopic = $request->input('topic', session('meeting_topic', "Réunion HumanJobs Teams"));
            $meetingStartTime = $request->input('start_time', session('meeting_start_time', now()->addMinutes(10)->toIso8601String()));
            $meetingDuration = $request->input('meeting_duration', session('meeting_duration', 60));

            // Définir l'heure de début et de fin
            $startTime = Carbon::parse($meetingStartTime)->toIso8601String();
            $endTime = Carbon::parse($startTime)->addMinutes($meetingDuration)->toIso8601String();

            // Construire les données de la réunion
            $meetingData = [
                "subject" => $meetingTopic,
                "startDateTime" => $startTime,
                "endDateTime" => $endTime,
                "participants" => [
                    "organizer" => [
                        "identity" => [
                            "user" => [
                                "id" => Auth::id(),
                            ],
                        ],
                    ],
                ],
            ];

            // Effectuer la requête HTTP POST vers Microsoft Graph API
            $response = Http::withToken($accessToken)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post('https://graph.microsoft.com/v1.0/me/onlineMeetings', $meetingData);

            // Vérifier si la requête a réussi
            return $response;
            if ($response->failed()) {
                return response()->json(['error' => 'Erreur lors de la création de la réunion: ' . $response->body()], 500);
            }

            // Extraire le lien de la réunion
            $meetingLink = $response->json()['joinWebUrl'] ?? null;
            if (!$meetingLink) {
                return response()->json(['error' => 'Aucun lien de réunion retourné'], 500);
            }

            // Calculer l'heure de fin de la réunion
            $meetingEndTime = Carbon::parse($meetingStartTime)->addMinutes($meetingDuration);

            // Redirection avec le lien de réunion
            // return redirect()->route("events.listing")->with([
            //     'message' => 'Réunion créée avec succès!',
            //     'meet_link' => $meetingLink,
            //     'meeting_topic' => $meetingTopic,
            //     'meeting_start_time' => $meetingStartTime,
            //     'meeting_end_time' => $meetingEndTime,
            //     'meeting_duration' => $meetingDuration,
            // ]);

            return "<script>
            if (window.opener) {
                window.close();
                window.opener.fillMeetingDetails({
                    meetLink: '$meetingLink',
                    meetingTopic: '$meetingTopic',
                    meetingStartTime: '$meetingStartTime',
                    meetingEndTime: '$meetingEndTime',
                    meetingDuration: '$meetingDuration'
                });
            } else {
                alert('Parent window not found');
                window.location.href = '/events/listing';
            }
        </script>";
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la création de la réunion: ' . $e->getMessage()], 500);
        }
    }

    // public function createTeamsMeeting()
    // {
    //     // Récupérer le token de la base de données
    //     $socialite = SocialiteModel::where('user_id', Auth::id())->first();

    //     if (!$socialite || !$socialite->token_microsoft) {
    //         return redirect()->route('teams.redirect')->with('error', 'Vous devez vous connecter avec Microsoft.');
    //     }

    //     $accessToken = $socialite->token_microsoft;

    //     try {
    //         $graph = new Graph();
    //         $graph->setAccessToken($accessToken);
    //         // Récupérer les détails de la réunion depuis la session
    //         $meetingTopic = session('meeting_topic');
    //         $meetingStartTime = session('meeting_start_time');
    //         $meetingDuration = session('meeting_duration');

    //         // Définir les horaires de début et fin
    //         $startTime = Carbon::parse($meetingStartTime);
    //         $endTime = $startTime->copy()->addMinutes(input('start_time', now()->addMinutes(60)->toIso8601String()));
    //         $meetingData = [
    //             'subject' => $request->input('topic', "Réunion HumanJobs Zoom"),
    //             'startDateTime' => $request->input('start_time', now()->addMinutes(10)->toIso8601String()),
    //             'endDateTime' => $endTime,
    //             'participants' => [],
    //         ];

    //         $response = $graph->createRequest("POST", "/me/onlineMeetings")
    //             ->attachBody($meetingData)
    //             ->setReturnType(Model\OnlineMeeting::class)
    //             ->execute();

    //         $meetingLink = $response->getJoinWebUrl();

    //         // return response()->json(['meet_link' => $meetingLink]);
    //         $meetingEndTime = $meetingStartTime->addMinutes($meetingDuration);

    //         return redirect()->route("events.listing")->with([
    //             'message' => 'Event created successfully!',
    //             'meet_link' => $meetingLink,
    //             'meeting_topic' => $meetingTopic,
    //             'meeting_start_time' => $meetingStartTime,
    //             'meeting_end_time' => $meetingEndTime,
    //             'meeting_duration' => $meetingDuration,
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'Erreur lors de la création de la réunion: ' . $e->getMessage()], 500);
    //     }
    // }
}
