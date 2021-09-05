<?php

namespace App\Repositories;

use App\Interfaces\IdTypeInterface;
use App\Support\Collection;
use App\Support\Model;

class IdTypeRepository implements IdTypeInterface
{
    public function getTypeID()
    {
        $types = [
            'passport',
            'arc',
            'taiwan_id'
        ];
        $model = new Model($types);
        $collection = new Collection($model);
        return $collection;
    }
}
