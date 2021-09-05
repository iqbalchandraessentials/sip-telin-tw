<?php

namespace App\Repositories;

use App\Interfaces\CustomerFasconInterface;
use App\Support\Model;
use App\Support\Collection;
use Illuminate\Support\Facades\Http;

class CustomerFasconRepository implements CustomerFasconInterface
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
            'tipe_customer' => 'kartu_nusantara',
            'tipe_keyword' => 'nama',
            'keyword' => '',
            'status' => '',
            'status_trash' => 'N'
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'];
    }

    public function getPending()
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer', [
            'last_creation_date' => '0',
            'limit' => '50',
            'tipe_customer' => 'kartu_nusantara',
            'tipe_keyword' => 'nama',
            'keyword' => '',
            'status' => 'pending'
        ]);
        $dt = json_decode($response->getBody()->getContents(), true);
        if ($dt['status']['msg'] == 'Data has been NOT successfuly retrieve') {

            return [];
        } else {
            return $dt['data'];
        }
    }

    public function getPendingName($name)
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer', [
            'last_creation_date' => '0',
            'limit' => '50',
            'tipe_customer' => 'kartu_nusantara',
            'tipe_keyword' => 'nama',
            'keyword' => $name,
            'status' => 'pending',
            'status_trash' => 'N'
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'][0];
    }

    public function getPendingCollection()
    {
        $data = $this->getPending();
        $store = new Model($data);
        return new Collection($store);
    }

    public function getRegistered()
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer', [
            'last_creation_date' => '0',
            'limit' => '50',
            'tipe_customer' => 'kartu_nusantara',
            'tipe_keyword' => 'nama',
            'keyword' => '',
            'status' => 'registered',
            'status_trash' => 'N'
        ]);
        $dt = json_decode($response->getBody()->getContents(), true);
        if ($dt['status']['msg'] == 'Data has been NOT successfuly retrieve') {

            return [];
        } else {
            return $dt['data'];
        }
    }

    public function getRegisteredName($name)
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer', [
            'last_creation_date' => '0',
            'limit' => '50',
            'tipe_customer' => 'kartu_nusantara',
            'tipe_keyword' => 'nama',
            'keyword' => $name,
            'status' => 'registered',
            'status_trash' => 'N'
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'][0];
    }

    public function getRegisteredCollection()
    {
        $data = $this->getRegistered();
        $store = new Model($data);
        return new Collection($store);
    }

    public function getRejected()
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer', [
            'last_creation_date' => '0',
            'limit' => '50',
            'tipe_customer' => 'kartu_nusantara',
            'tipe_keyword' => 'nama',
            'keyword' => '',
            'status' => 'rejected',
            'status_trash' => 'N'
        ]);
        $dt = json_decode($response->getBody()->getContents(), true);
        if ($dt['status']['msg'] == 'Data has been NOT successfuly retrieve') {

            return [];
        } else {
            return $dt['data'];
        }
    }

    public function getRejectedCollection()
    {
        $data = $this->getRejected();
        $store = new Model($data);
        return new Collection($store);
    }

    public function getRejectedName($name)
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer', [
            'last_creation_date' => '0',
            'limit' => '50',
            'tipe_customer' => 'kartu_nusantara',
            'tipe_keyword' => 'nama',
            'keyword' => $name,
            'status' => 'rejected',
            'status_trash' => 'N'
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'][0];
    }

    public function getTrashed()
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer', [
            'last_creation_date' => '0',
            'limit' => '50',
            'tipe_customer' => 'kartu_nusantara',
            'tipe_keyword' => 'nama',
            'keyword' => '',
            'status' => 'trash'
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'];
    }

    public function getTrashedCollection()
    {
        $data = $this->getTrashed();
        $store = new Model($data);
        return new Collection($store);
    }

    public function getTrashedName($name)
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'list_customer', [
            'last_creation_date' => '0',
            'limit' => '50',
            'tipe_customer' => 'kartu_nusantara',
            'tipe_keyword' => 'nama',
            'keyword' => $name,
            'status' => 'trashed',
            'status_trash' => 'N'
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'][0];
    }

    public function getDataPart($id, $idc)
    {
        $response = Http::timeout(0)->asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'detail_customer', [
            'id_customer' => $idc,
            'id_customer_number' => $id,
        ]);
        return json_decode($response->getBody()->getContents(), true);
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
}
