<?php

namespace App\Interfaces;

interface CredentialsInterface
{
    public function getUsername();
    public function getPassword();
    public function getAuthentication();
}
