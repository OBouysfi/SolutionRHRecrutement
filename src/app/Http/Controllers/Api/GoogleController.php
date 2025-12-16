<?php

namespace App\Http\Controllers\Api;

use App\Models\SocialiteModel;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    /**
     * Redirection vers Google pour l'authentification OAuth
     */
    public function redirectToGoogle(Request $request)
    {
        // Validation des données
        // $request->validate([
        //     'topic' => 'required|string',
        //     'start_time' => 'required|date',
        //     'duration' => 'required|integer|min:1'
        // ]);

        // Stocker les détails de la réunion dans la session
        session([
            'meeting_topic' => $request->input('topic') ?? "Human jobs meet",
            'meeting_start_time' => $request->input('start_time') ?? now(),
            'meeting_duration' => $request->input('duration') ?? 60
        ]);

        return Socialite::driver('google')
            ->with(['access_type' => 'offline', 'prompt' => 'consent']) // Pour obtenir un refresh token
            ->scopes(['https://www.googleapis.com/auth/calendar.events']) // Autoriser l'accès à Google Calendar
            ->redirect();
    }

    /**
     * Gestion du callback de Google OAuth
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Vérifier si l'utilisateur est connecté
            if (!auth()->check()) {
                return response()->json(['error' => 'Utilisateur non authentifié.'], 401);
            }

            // Vérifier si l'utilisateur existe dans la table `socialite`
            $socialiteUser = SocialiteModel::updateOrCreate(
                ['user_id' => auth()->id()],
                [
                    'token_google' => $googleUser->token,
                    'refreshToken_google' => $googleUser->refreshToken,
                    'status_google' => true
                ]
            );

            return $this->createGoogleMeet();
        } catch (\Exception $e) {
            Log::error('Erreur lors du callback Google: ' . $e->getMessage());
            return response()->json(['error' => 'Erreur lors de l\'authentification Google.'], 500);
        }
    }

    /**
     * Création d'un événement Google Meet
     */
    public function createGoogleMeet()
    {
        try {
            $user = auth()->user();
            if (!$user) {
                return response()->json(['error' => 'Utilisateur non authentifié.'], 401);
            }

            $socialiteUser = SocialiteModel::where('user_id', $user->id)->first();
            if (!$socialiteUser || !$socialiteUser->token_google) {
                return response()->json(['error' => 'Aucun jeton Google disponible.'], 401);
            }

            // Configurer le client Google
            $client = new Google_Client();
            $client->setAccessToken($socialiteUser->token_google);

            // Rafraîchir le token si expiré
            // if ($client->isAccessTokenExpired()) {
            //     $newToken = $client->fetchAccessTokenWithRefreshToken($socialiteUser->refreshToken_google);
            //     if (isset($newToken['access_token'])) {
            //         $socialiteUser->token_google = $newToken['access_token'];
            //         $socialiteUser->refreshToken_google = $newToken['refresh_token'] ?? $socialiteUser->refreshToken_google;
            //         $socialiteUser->save();
            //         $client->setAccessToken($newToken['access_token']);
            //     } else {
            //         return response()->json(['error' => 'Échec de la mise à jour du token Google.'], 500);
            //     }
            // }

            // Vérifier la session avant de créer la réunion
            // if (!session()->has(['meeting_topic', 'meeting_start_time', 'meeting_duration'])) {
            //     return response()->json(['error' => 'Détails de la réunion non trouvés dans la session.'], 400);
            // }

            // Récupérer les détails de la réunion depuis la session
            $meetingTopic = session('meeting_topic') ?? "Human jobs meet";
            $meetingStartTime = session('meeting_start_time') ?? now();
            $meetingDuration = session('meeting_duration') ?? 60;

            // Définir les horaires de début et fin
            $startTime = Carbon::parse($meetingStartTime);
            $endTime = $startTime->copy()->addMinutes($meetingDuration);

            // Créer l'événement Google Meet
            $calendarService = new Google_Service_Calendar($client);
            $event = new Google_Service_Calendar_Event([
                'summary' => $meetingTopic ?? "Réunion HumanJobs Zoom",
                'location' => 'Online',
                'start' => ['dateTime' => $startTime->toIso8601String() ?? now()->addMinutes(10)->toIso8601String(), 'timeZone' => 'Africa/Casablanca'],
                'end' => ['dateTime' => $endTime->toIso8601String() ?? now()->addMinutes(100)->toIso8601String(), 'timeZone' => 'Africa/Casablanca'],
                'conferenceData' => [
                    'createRequest' => [
                        'requestId' => uniqid('req_'),
                        'conferenceSolutionKey' => ['type' => 'hangoutsMeet'],
                    ],
                ],
            ]);

            $createdEvent = $calendarService->events->insert('primary', $event, ['conferenceDataVersion' => 1]);
            $meetLink = $createdEvent->getHangoutLink();

            // return response()->json(['meet_link' => $meetLink]);
            // session("meet_link", $meetLink);
            $meetingEndTime = $meetingStartTime->addMinutes($meetingDuration);

            // return redirect()->route("events.listing")->with([
            //     'message' => 'Event created successfully!',
            //     'meet_link' => $meetLink,
            //     'meeting_topic' => $meetingTopic,
            //     'meeting_start_time' => $meetingStartTime,
            //     'meeting_end_time' => $meetingEndTime,
            //     'meeting_duration' => $meetingDuration,
            // ]);

            return "<script>
            if (window.opener) {
                window.close();
                window.opener.fillMeetingDetails({
                    meetLink: '$meetLink',
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
            Log::error('Erreur de création Google Meet: ' . $e->getMessage());
            return response()->json(['error' => 'Erreur lors de la création de la réunion Google Meet.'], 500);
        }
    }
}
