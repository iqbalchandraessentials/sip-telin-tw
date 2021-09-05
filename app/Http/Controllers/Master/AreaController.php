<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Repositories\AreaRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class AreaController extends Controller
{
    private $repository;

    public function __construct(AreaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getCity()
    {
        $data = $this->repository->getCity();
        return response()->json($data, 200);
    }

    public function getDistrict($city)
    {
        $data = $this->repository->getDistrict($city);
        return response()->json($data, 200);
    }
}
