<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Session;
use App\Interfaces\CredentialsInterface;
use Illuminate\Support\Facades\Http;

class CredentialRepository implements CredentialsInterface
{
    public function getUsername()
    {
        $sessions = Session::get('user')[1];
        return base64_decode($sessions['username']);
    }

    public function getPassword()
    {
        $sessions = Session::get('user')[1];
        return base64_decode($sessions['password']);
    }

    public function getAuthentication()
    {
        return base64_encode($this->getUsername() . ':' . $this->getPassword());
    }
}
