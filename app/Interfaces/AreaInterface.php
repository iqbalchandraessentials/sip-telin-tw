<?php

namespace App\Interfaces;

interface AreaInterface
{
    public function getCity();
    public function getDistrict($city);
}
