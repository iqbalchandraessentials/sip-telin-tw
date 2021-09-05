<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use App\Interfaces\AreaInterface;
use App\Interfaces\UserInterface;
use App\Support\Collection;
use App\Support\Model;
use Illuminate\Support\Facades\Http;


class UserRepository implements UserInterface
{
    private $credentials;

    public function __construct(CredentialRepository $credentials)
    {
        $this->credentials = $credentials;
    }

    public function getUsers()
    {
        $url = config('app.api.url').'list_user';
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post($url, [
            'last_username' => '',
            'limit' => '50',
            'keyword' => ''
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'];
    }

    public function userCollection()
    {
        $data = $this->getUsers();
        $store = new Model($data);
        return new Collection($store);
    }

    public function createUser()
    {
        $url = config('app.api.url').'list_disrict';
    }

    public function updateUser($user)
    {
        //
    }

    public function deleteUser($user)
    {
        //
    }
}
