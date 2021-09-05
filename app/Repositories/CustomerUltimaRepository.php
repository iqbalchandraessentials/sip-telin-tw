<?php

namespace App\Repositories;

use App\Support\Model;
use GuzzleHttp\Client;
use App\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Interfaces\CustomerUltimaInterface;

class CustomerUltimaRepository implements CustomerUltimaInterface
{
    private $credentials;

    public function __construct(CredentialRepository $credentials)
    {
        $this->credentials = $credentials;
    }

    public function getAll()
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer', [
            'last_creation_date' => '0',
            'limit' => '50',
            'tipe_customer' => 'kartu_as',
            'tipe_keyword' => 'nama',
            'keyword' => '',
            'status' => '',
            'status_trash' => 'N'
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'];
    }

    public function getLeadCollection($page,$limit,$tipe_keyword,$keyword,$year,$filter)
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer_pagination', [
            'tipe_customer' => 'kartu_as',
            'tipe_keyword' => $tipe_keyword,
            'keyword' => $keyword,
            'filter' => $filter,
            'status' => 'lead',
            'status_summary' => 'N',
            'limit' => $limit,
            'page' => $page,
            'year' => $year
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getProcessCollection($page,$limit,$tipe_keyword,$keyword,$year,$filter)
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer_pagination', [
            'tipe_customer' => 'kartu_as',
            'tipe_keyword' => $tipe_keyword,
            'keyword' => $keyword,
            'filter' => $filter,
            'status' => 'process',
            'status_summary' => 'N',
            'limit' => $limit,
            'page' => $page,
            'year' => $year
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getActivatedCollection($page,$limit,$tipe_keyword,$keyword,$year,$filter)
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer_pagination', [
            'tipe_customer' => 'kartu_as',
            'tipe_keyword' => $tipe_keyword,
            'keyword' => $keyword,
            'filter' => $filter,
            'status' => 'activated',
            'status_summary' => 'N',
            'limit' => $limit,
            'page' => $page,
            'year' => $year
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getLeadName($name)
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer', [
            'last_creation_date' => '0',
            'limit' => '50',
            'tipe_customer' => 'kartu_as',
            'tipe_keyword' => 'nama',
            'keyword' => $name,
            'status' => 'lead',
            'status_trash' => 'N'
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'][0];
    }

    public function getProcessName($name)
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer', [
            'last_creation_date' => '0',
            'limit' => '50',
            'tipe_customer' => 'kartu_as',
            'tipe_keyword' => 'nama',
            'keyword' => $name,
            'status' => 'process',
            'status_trash' => 'N'
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'][0];
    }

    public function getActivatedName($name)
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer', [
            'last_creation_date' => '0',
            'limit' => '50',
            'tipe_customer' => 'kartu_as',
            'tipe_keyword' => 'nama',
            'keyword' => $name,
            'status' => 'activated',
            'status_trash' => 'N'
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'][0];
    }

    public function getDataPart($name, $status)
    {
        $response = Http::timeout(0)->asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer', [
            'last_creation_date' => '0',
            'limit' => '50',
            'tipe_customer' => 'kartu_as',
            'tipe_keyword' => 'nama',
            'keyword' => $name,
            'status' => $status,
            'status_trash' => 'N'
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'][0];
    }

    public function getDetailSummary($id_customer, $id_customer_number)
    {
        $response = Http::timeout(0)->asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'detail_customer', [
            'id_customer' => $id_customer,
            'id_customer_number' => $id_customer_number
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'];
    }

    public function getCustomerApfHistory($id_customer, $id_customer_number)
    {
        $response = Http::timeout(0)->asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer_apf_history', [
            'id_customer_number' => $id_customer_number
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'];
    }

    public function exportCustomer($status,$start_date,$end_date)
    {
        $response = Http::timeout(10)->asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'export_customer', [
            'tipe' => $status,
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);
        return $response->getBody()->getContents();
    }
}
