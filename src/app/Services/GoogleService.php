<?php

namespace App\Services;

use Google_Client;
use Google_Service_Calendar;

class GoogleService
{
    public function getClient()
    {
        $client = new Google_Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));
        $client->addScope(Google_Service_Calendar::CALENDAR);
        return $client;
    }

    public function getAuthUrl()
    {
        $client = $this->getClient();
        $authUrl = $client->createAuthUrl();
        return $authUrl;
    }


    public function authenticate($code)
    {
        // dd($code);
        $client = $this->getClient();
        // dd($client);
        $token = $client->fetchAccessTokenWithAuthCode($code);

        // Log or inspect the token
        \Log::info('Google Access Token:', $token);

        session(['google_token' => $token]);
    }


    public function getCalendarService()
    {
        $client = $this->getClient();
        $token = session('google_token');

        if ($token) {
            // Check if the token is expired
            if ($client->isAccessTokenExpired()) {
                // If expired, refresh the token or request re-authentication
                return null;  // Or handle refresh token logic here
            }
            $client->setAccessToken($token);
            return new Google_Service_Calendar($client);
        }
        return null;
    }
}
