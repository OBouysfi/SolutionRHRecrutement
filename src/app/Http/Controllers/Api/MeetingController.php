<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use Microsoft\Graph\Graph;
use GuzzleHttp\Client;
use Microsoft\Graph\Model;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class MeetingController extends Controller
{

    // public function googleAuthRedirect()
    // {
    //     $client = new Google_Client();
    //     $client->setClientId(env('GOOGLE_CLIENT_ID'));
    //     $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
    //     $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
    //     $client->addScope(Google_Service_Calendar::CALENDAR_EVENTS);
    //     $client->setAccessType('offline'); // Pour obtenir un refresh token
    //     $client->setPrompt('consent'); // Forcer la réauthentification

    //     // Rediriger vers la page d'authentification Google
    //     return redirect($client->createAuthUrl());
    // }

    // public function redirectToGoogle(): RedirectResponse
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // public function googleCallback(Request $request)
    // {
    //     $client = new Google_Client();
    //     $client->setClientId(env('GOOGLE_CLIENT_ID'));
    //     $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
    //     $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
    //     $client->addScope(Google_Service_Calendar::CALENDAR_EVENTS);

    //     if ($request->has('code')) {
    //         $token = $client->fetchAccessTokenWithAuthCode($request->code);

    //         if (!isset($token['access_token'])) {
    //             return response()->json(['error' => 'Erreur lors de la récupération du token.'], 401);
    //         }

    //         // Stocker le token en session
    //         // Session::put('google_access_token', );
    //         session(['google_access_token' => $token['access_token']]);


    //         return redirect('/dashboard')->with('success', 'Connexion Google réussie.');
    //     }

    //     return response()->json(['error' => 'Aucun code de vérification reçu.'], 400);
    // }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->scopes(['https://www.googleapis.com/auth/calendar.events'])
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $accessToken = $user->token;

            // Stocker le token dans la session
            session(['google_access_token' => $accessToken]);

            // Rediriger vers la page de création d'événement
            return redirect()->route('events.listing')->with('google_access_token', $accessToken);
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Erreur lors de la connexion Google.');
        }
    }

    public function createGoogleMeet(Request $request)
    {
        // Vérifier si le token est en session
        if (!session('google_access_token')) {
            return response()->json(['error' => 'Veuillez vous connecter avec Google.'], 401);
        }

        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->addScope(Google_Service_Calendar::CALENDAR_EVENTS);

        $client->setAccessToken(session('google_access_token'));

        if ($client->isAccessTokenExpired()) {
            return response()->json(['error' => 'Le token Google a expiré.'], 401);
        }

        // Création du service Google Calendar
        $service = new Google_Service_Calendar($client);

        $event = new Google_Service_Calendar_Event([
            'summary' => 'Réunion Google Meet',
            'start' => ['dateTime' => now()->addMinutes(5)->toRfc3339String()],
            'end' => ['dateTime' => now()->addMinutes(35)->toRfc3339String()],
            'conferenceData' => ['createRequest' => ['requestId' => uniqid()]],
        ]);

        $event = $service->events->insert('primary', $event, ['conferenceDataVersion' => 1]);

        return response()->json(['url' => $event->getHangoutLink()]);
    }



    // Microsoft Teams
    public function createTeamsMeeting(Request $request)
    {
        $tenantId = env('MS_TENANT_ID');
        $clientId = env('MS_CLIENT_ID');
        $clientSecret = env('MS_CLIENT_SECRET');

        // Récupération du token OAuth (Vous devez implémenter cette partie)
        $token = $this->getMicrosoftAccessToken($tenantId, $clientId, $clientSecret);

        if (!$token) {
            return response()->json(['error' => 'Impossible de récupérer le token OAuth.'], 500);
        }

        $graph = new Graph();
        $graph->setAccessToken($token);

        $meetingData = [
            "subject" => "Réunion Microsoft Teams",
            "startDateTime" => now()->addMinutes(5)->toIso8601String(),
            "endDateTime" => now()->addMinutes(35)->toIso8601String(),
            "attendees" => [],
        ];

        $response = $graph->createRequest("POST", "/me/onlineMeetings")
            ->attachBody($meetingData)
            ->execute();

        return response()->json(['url' => $response->getBody()['joinUrl']]);
    }

    // Fonction pour récupérer un token d'accès Microsoft
    private function getMicrosoftAccessToken($tenantId, $clientId, $clientSecret)
    {
        $http = new Client();

        try {
            $response = $http->post("https://login.microsoftonline.com/$tenantId/oauth2/v2.0/token", [
                'form_params' => [
                    'client_id' => $clientId,
                    'client_secret' => $clientSecret,
                    'scope' => 'https://graph.microsoft.com/.default',
                    'grant_type' => 'client_credentials',
                ],
            ]);

            $body = json_decode((string) $response->getBody(), true);

            return $body['access_token'] ?? null;
        } catch (\Exception $e) {
            \Log::error('Erreur lors de la récupération du token Microsoft : ' . $e->getMessage());
            return null;
        }
    }
    // Zoom
    public function createZoomMeeting(Request $request)
    {
        try {
            $user = Zoom::user()->first();
            $meeting = $user->meetings()->create([
                'topic' => 'Réunion Zoom',
                'duration' => 30,
                'start_time' => now()->addMinutes(5),
                'timezone' => 'Europe/Paris',
                'settings' => ['join_before_host' => true],
            ]);

            return response()->json(['url' => $meeting->join_url]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
