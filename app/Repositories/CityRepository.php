<?php

namespace App\Repositories;

use App\Support\Model;
use GuzzleHttp\Client;
use App\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Interfaces\CityInterface;

class CityRepository implements CityInterface
{
    private $credentials;

    public function __construct(CredentialRepository $credentials)
    {
        $this->credentials = $credentials;
    }

    public function getAllCity()
    {
        $url = config('app.api.url').'list_city';
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post($url, []);
        return json_decode($response->getBody()->getContents(), true)['data'];
    }
    public function getAllDistrict($idc)
    {
        $url = config('app.api.url').'list_disrict';
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post($url, [
            'id_city' => $idc
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'];
    }

    public function getCityById($params)
    {
        $url = config('app.api.url').'list_city';
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post($url, []);

        $dt = json_decode($response->getBody()->getContents(), true)['data'];
        foreach ($dt as $d) {
            if ($d == $params) {
                return $d;
            }
        }
    }

    public function getCollection()
    {
        $data = $this->getAllCity();
        $store = new Model($data);
        return new Collection($store);
    }
}
