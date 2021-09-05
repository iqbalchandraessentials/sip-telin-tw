<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use App\Interfaces\AreaInterface;
use App\Support\Collection;
use App\Support\Model;
use Illuminate\Support\Facades\Http;

class AreaRepository implements AreaInterface
{
    private $credentials;

    public function __construct(CredentialRepository $credentials)
    {
        $this->credentials = $credentials;
    }

    public function getCity()
    {
        $client = new Client();
        $url = config('app.api.url').'list_city';
        $response = $client->request('POST', $url, [
            'auth' => [
                $this->credentials->getUsername(),
                $this->credentials->getPassword()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'];
    }

    public function getDistrict($city)
    {
        $url = config('app.api.url').'list_disrict';
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post($url, [
            'id_city' => $city,
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'];
    }
}
