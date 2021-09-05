<?php

namespace App\Interfaces;

interface CityInterface
{
    public function getAllCity();
    public function getAllDistrict($idcity);
    public function getCityById($params);
    public function getCollection();
}
