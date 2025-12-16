<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class ZoomController extends Controller
{
    private $zoomApiUrl = 'https://api.zoom.us/v2';

    /**
     * Récupérer un jeton d'accès OAuth2 pour Zoom
     */
    private function getAccessToken()
    {
        $clientId = config('services.zoom.client_id');
        $clientSecret = config('services.zoom.client_secret');
        $accountId = config('services.zoom.account_id'); // Only for Server-to-Server OAuth

        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . base64_encode("$clientId:$clientSecret"),
        ])->post('https://zoom.us/oauth/token', [
            'grant_type' => 'account_credentials', // Correct for Server-to-Server OAuth
            'account_id' => $accountId,
        ]);

        // dd($response->json()); // Check if token is received

        // if ($response->successful()) {
        return $response->json()['access_token'];
        // }

        throw new \Exception('Error retrieving Zoom token: ' . $response->body());
    }

    /**
     * Créer une réunion Zoom
     */ public function createMeeting(Request $request)
    {
        // $validated = $request->validate([
        //     'topic' => 'required|string',
        //     'start_time' => 'required|date',
        //     'duration' => 'required|integer|min:1',
        // ]);

        try {
            $accessToken = $this->getAccessToken(); // Use your existing function to get the access token
            $response = Http::withToken($accessToken)->post("https://api.zoom.us/v2/users/me/meetings", [
                'topic' => $validated['topic'] ?? "Réunion HumanJobs Zoom",
                'type' => 2, // Scheduled meeting
                'start_time' => $validated['start_time'] ?? now()->addMinutes(10)->toIso8601String(),
                'duration' => $validated['duration'] ?? 45,
                'timezone' => 'Europe/Paris',
                'settings' => [
                    'join_before_host' => true,
                    'host_video' => true,
                    'participant_video' => true,
                    'mute_upon_entry' => true,
                    'waiting_room' => true,
                ],
            ]);

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'meeting_link' => $response->json()['join_url'],
                ]);
            }

            return response()->json(['success' => false], 500);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Gérer le callback de Zoom après l'authentification OAuth2
     */
    public function handleZoomCallback(Request $request)
    {
        if ($request->has('code')) {
            $clientId = config('services.zoom.client_id');
            $clientSecret = config('services.zoom.client_secret');
            $redirectUri = config('services.zoom.redirect');

            $response = Http::asForm()->post('https://zoom.us/oauth/token', [
                'grant_type' => 'authorization_code',
                'code' => $request->code,
                'redirect_uri' => $redirectUri,
            ])->withHeaders([
                'Authorization' => 'Basic ' . base64_encode("$clientId:$clientSecret"),
            ]);

            if ($response->successful()) {
                session(['zoom_access_token' => $response->json()['access_token']]);
                return redirect()->route('zoom.meeting.create')->with('success', 'Connexion Zoom réussie !');
            }
        }

        return redirect()->route('home')->with('error', 'Échec de la connexion à Zoom.');
    }
}
