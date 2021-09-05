<?php

namespace App\Providers;

use App\Auth\ApiUser;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Support\Facades\Http;

class ApiUserProvider implements UserProvider
{
    protected $model;
    protected $modelUser;

    public function __construct()
    {
        $this->model = ApiUser::class;
    }

    public function fetchUser($credentials)
    {
        if ($credentials['username'] and $credentials['password']) {
            $username = $credentials['username'];
            $password = $credentials['password'];

            try {
                $response = Http::asForm()->withHeaders([
                    'Content-Type' => 'application/json'
                ])->post(config('app.api.url').'login',[
                    'username' => $username,
                    'password' => $password,
                ]);
                $array =  json_decode($response->getBody()->getContents(), true);
                if ($array['status']['code'] == 200) {
                    $userInfo = $array['data'];
                    return new $this->model($userInfo);
                } else {
                    return $array['status']['msg'] ?: 'Something went wrong, please try again.';
                }
            } catch (RequestException $e) {
                print_r($e->getResponse());
            }
        }
    }

    public function retrieveById($identifier)
    {
        return $this->modelUser;
    }

    public function retrieveByCredentials(array $credentials)
    {
        $user = $this->fetchUser($credentials);
        return $user;
    }

    public function validateCredentials(UserContract $user, array $credentials)
    {
        return true;
    }

    public function retrieveByToken($identifier, $token)
    {
        //
    }

    public function updateRememberToken(UserContract $user, $token)
    {
        //
    }
}
