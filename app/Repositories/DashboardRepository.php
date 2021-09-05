<?php

namespace App\Repositories;

use App\Support\Model;
use GuzzleHttp\Client;
use App\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Interfaces\DashboardInterface;

class DashboardRepository implements DashboardInterface
{
    private $credentials;

    public function __construct(CredentialRepository $credentials)
    {
        $this->credentials = $credentials;
    }

    public function getRegistrationChart($start_date,$end_date)
    {
        $response = Http::timeout(10)->asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'dashboard/get_registration_chart', [
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);
        return json_decode($response->getBody()->getContents(), true)['data'];
    }

    public function getRegistrationTable($page,$limit,$tipe_keyword,$keyword,$start_date,$end_date)
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'dashboard/get_registration_table', [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'tipe_keyword' => $tipe_keyword,
            'keyword' => $keyword,
            'limit' => $limit,
            'page' => $page,
        ]);
        // dd($response);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getApfSlaList($page_control,$last_id_customer,$limit)
    {
        $response = Http::timeout(10)->asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'dashboard/get_apf_sla', [
            'limit' => $limit,
            'last_id_customer' => $last_id_customer,
            'page_control' => $page_control
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getApfType()
    {
        $response = Http::timeout(10)->asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'dashboard/get_apf', [

        ]);
        return json_decode($response->getBody()->getContents(), true)['data'];
    }

    public function getApfTypeList($ap_form_type,$page_control,$last_id_customer,$limit)
    {
        $response = Http::timeout(10)->asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url').'dashboard/get_apf_list', [
            'ap_form_type' => $ap_form_type,
            'limit' => $limit,
            'last_id_customer' => $last_id_customer,
            'page_control' => $page_control
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

}
