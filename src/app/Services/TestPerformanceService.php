<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use GuzzleHttp\Client;

class TestPerformanceService
{
    protected $apiKey;
    protected $apiSecret;
    protected $authUrl;
    protected $apiUrl;


    public function __construct()
    {
        $this->apiKey = env('ISOGRAD_API_KEY');
        $this->apiSecret = env('ISOGRAD_API_SECRET');
        $this->authUrl = env('ISOGRAD_API_AUTH_URL');
        $this->apiUrl = env('ISOGRAD_API_URL_DEV');
    }







    public function IsogradAuth(){
        $client = new Client();
        $credentials = [
            'client_id' => $this->apiKey,
            'client_secret' => $this->apiSecret,
        ];
        $auth_url = $this->authUrl;

        $response = $client->post($auth_url, [
            'form_params' => $credentials,
        ]);


        $body = json_decode($response->getBody(), true);

        $access_token = $body['access_token'];

        return $access_token;
    }

    public function IsogradRequest($data){
        $client = new Client();
        $url = $this->apiUrl;
        $access_token = $this->IsogradAuth();

        $headers = ['Authorization' => 'Bearer ' . $access_token];


        $response = $client->post($url, [
            'headers' => $headers,
            'form_params' => $data
        ]);

        $body = json_decode($response->getBody(), true);
        return $body;
    }
}
