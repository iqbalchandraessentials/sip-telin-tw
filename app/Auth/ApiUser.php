<?php

namespace App\Auth;

use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class ApiUser extends GenericUser implements UserContract
{
    protected $attributes = [];

    public function __construct($attributes)
    {
        $this->attributes = $attributes;
    }

    public function __get($attribute)
    {
        return $this->attributes;
    }

    public function getKey()
    {
        return $this->attributes['username'];
    }

    public function getAuthIdentifierName()
    {
        return $this->attributes['nama'];
    }

    public function getAuthIdentifierEmail()
    {
        return $this->attributes['email'];
    }

    public function getAuthIdentifier()
    {
        return $this->attributes['username'];
    }

    public function getRememberToken()
    {
        return $this->attributes[$this->getRememberTokenName()];
    }

    public function setRememberToken($value)
    {
        $this->attributes[$this->getRememberTokenName()] = $value;
    }

    public function getRememberTokenName()
    {
        //
    }

    public function getAttributes()
    {
        return $this->attributes;
    }
}
