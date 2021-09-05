<?php

namespace App\Http\Traits;

use App\Repositories\ActivationStoreRepository;
use App\Repositories\CustomerUltimaRepository;
use App\Repositories\NationalitiesRepository;
use App\Repositories\AvailabilitiesRepository;
use App\Repositories\CredentialRepository;
use App\Repositories\CityRepository;
use App\Repositories\IdTypeRepository;

trait UltimaTrait
{
    private $repository, $stores, $nationalities, $availabilities, $credentials, $types,$cities ;

    public function __construct(
        IdTypeRepository $types,
        CredentialRepository $credentials,
        ActivationStoreRepository $stores,
        CityRepository $cities,
        CustomerUltimaRepository $repository,
        NationalitiesRepository $nationalities,
        AvailabilitiesRepository $availabilities
    ) {
        $this->types = $types;
        $this->stores = $stores;
        $this->repository = $repository;
        $this->credentials = $credentials;
        $this->nationalities = $nationalities;
        $this->availabilities = $availabilities;
        $this->cities = $cities;
    }

    public function index()
    {
        $page_title = 'Registration';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Ultima',
                'page' => '/register/ultima'
            ],
        ];

        return view('contents.register.ultima.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function create()
    {
        $page_title = 'Create';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Registration Ultima',
                'page' => '/register/ultima'
            ]
        ];

        return view('contents.register.ultima.create', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }
}
