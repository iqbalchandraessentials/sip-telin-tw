<?php

namespace App\Repositories;

use App\Interfaces\NationalitiesInterface;
use App\Support\Collection;
use App\Support\Model;
use Illuminate\Support\Facades\Http;

class NationalitiesRepository implements NationalitiesInterface
{
    public function getNationality()
    {
        $nationalities = ['indonesia', 'vietnam', 'taiwan', 'philippines'];
        $model = new Model($nationalities);
        $collection = new Collection($model);
        return $collection;
    }
}
