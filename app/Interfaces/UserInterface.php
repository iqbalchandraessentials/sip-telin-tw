<?php

namespace App\Interfaces;

interface UserInterface
{
    public function getUsers();
    public function userCollection();
    public function createUser();
    public function updateUser($user);
    public function deleteUser($user);
}
