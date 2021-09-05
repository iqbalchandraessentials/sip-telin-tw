<?php

namespace App\Repositories;

use App\Support\Model;
use GuzzleHttp\Client;
use App\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Interfaces\ActivationStoreInterface;

class ActivationStoreRepository implements ActivationStoreInterface
{
    private $credentials;

    public function __construct(CredentialRepository $credentials)
    {
        $this->credentials = $credentials;
    }

    public function getAll()
    {
        $url = config('app.api.url').'list_activation_store';
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post($url, [
            'last_nama' => '',
            'limit' => '3500',
            'keyword' => ''
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'];
    }

    public function getCollection()
    {
        $data = $this->getAll();
        $store = new Model($data);
        return new Collection($store);
    }
}
