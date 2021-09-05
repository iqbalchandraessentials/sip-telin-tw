<?php

namespace App\Http\Traits;

use App\Repositories\ActivationStoreRepository;
use App\Repositories\NationalitiesRepository;
use App\Repositories\AvailabilitiesRepository;
use App\Repositories\CustomerFasconRepository;
use App\Repositories\IdTypeRepository;
use App\Repositories\CredentialRepository;
use App\Repositories\CityRepository;

trait FasconTrait
{
    private $repository, $stores, $nationalities, $availabilities, $credentials, $types;

    public function __construct(
        IdTypeRepository $types,
        CustomerFasconRepository $repository,
        CredentialRepository $credentials,
        ActivationStoreRepository $stores,
        NationalitiesRepository $nationalities,
        CityRepository $cities,
        AvailabilitiesRepository $availabilities
    ) {
        $this->types = $types;
        $this->stores = $stores;
        $this->repository = $repository;
        $this->credentials = $credentials;
        $this->availabilities = $availabilities;
        $this->nationalities = $nationalities;
        $this->cities = $cities;
    }

    public function index()
    {
        $page_title = 'Register';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Fascon',
                'page' => '/register/fascon'
            ],
        ];

        return view('contents.register.fascon.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }
}
