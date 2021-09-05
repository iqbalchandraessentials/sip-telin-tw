<?php

namespace App\Repositories;

use App\Interfaces\ActivationSummaryInterface;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use App\Interfaces\AreaInterface;
use App\Support\Collection;
use App\Support\Model;
use Illuminate\Support\Facades\Http;

class ActivationSummaryRepository implements ActivationSummaryInterface
{
    private $credentials;
    // private  $api = config('app.api.url').'list_customer';

    public function __construct(CredentialRepository $credentials)
    {
        $this->credentials = $credentials;
    }

    public function getSummary()
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post($this->api, [
            'last_creation_date' => '0',
            'limit' => '50',
            'tipe_customer' => '',
            'tipe_keyword' => '',
            'keyword' => '',
            'status' => '',
            'status_trash' => 'N',
            'status_summary' => 'Y'
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'];
    }

    public function getSummaryCollection()
    {
        $data = $this->getSummary();
        $store = new Model($data);
        return new Collection($store);
    }
}
