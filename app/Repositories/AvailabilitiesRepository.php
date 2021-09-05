<?php

namespace App\Repositories;

use App\Interfaces\AvailabilitiesInterface;
use App\Support\Collection;
use App\Support\Model;

class AvailabilitiesRepository implements AvailabilitiesInterface
{
    public function getAvailability()
    {
        $availabilities = ['ok_new', 'ok_former', 'terminate', 'not_ok'];
        $model = new Model($availabilities);
        $collection = new Collection($model);
        return $collection;
    }
}
