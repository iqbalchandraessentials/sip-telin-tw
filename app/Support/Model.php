<?php

namespace App\Support;

class Model
{
    public function __construct(array $data = array())
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }
}
