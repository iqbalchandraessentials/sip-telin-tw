<?php

namespace App\Http\Controllers;

use App\Http\Traits\FasconTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\UltimaTrait;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Http;
use League\CommonMark\HtmlRenderer;
use SebastianBergmann\Environment\Console;
use App\Repositories\DashboardRepository;

class DashboardController extends Controller
{
    private $repository;

    public function __construct(DashboardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function registration(Request $request)
    {
        $page_title = 'Dashboard';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Registration',
                'page' => '/dashboard/registration'
            ],
        ];

        return view('contents.dashboard.registration', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function registrationDetail($type)
    {
        $page_title = 'Dashboard';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Registration',
                'page' => '/dashboard/registration'
            ],
        ];

        $start_date = date('Y-m-d');
        $time = strtotime('monday this week');
        $end_date = date('Y-m-d', $time);

        return view('contents.dashboard.registration-detail', compact('page_title', 'page_description', 'page_breadcrumbs', 'type', 'start_date', 'end_date'));
    }

    public function registrationChart(Request $request)
    {
        // $time = strtotime('monday this week');
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        $data = $this->repository->getRegistrationChart($start_date, $end_date);
        return response()->json($data);
    }

    public function registrationTable(Request $request)
    {
        $page = ($request->get('start') / $request->get('length') + 1);
        $limit = $request->get('length');

        $tipe_keyword = 'nama';
        $keyword = ($request->get('search')['value'] != '') ? $request->get('search')['value'] : '';

        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        $collection = $this->repository->getRegistrationTable($page, $limit, $tipe_keyword, $keyword, $start_date, $end_date);
        // dd($collection);
        $data = $collection['data'];
        $total = ($request->get('records_total')) ? $request->get('records_total') : $collection['count'];
        $total_filter = ($request->get('search')['value'] != '') ? $collection['count'] : $total;

        return DataTables::of($data)
            ->setTotalRecords($total)
            ->filter(function ($instance) use ($request) {
                return ($request->get('search')['value'] != '') ? true : false;
            })
            ->setFilteredRecords($total_filter)
            ->setOffset($_GET['start'])
            ->addIndexColumn()
            ->toJson();
    }

    public function activationStore()
    {
        $page_title = 'Dashboard';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Activation Store',
                'page' => '/dashboard/activation-store'
            ],
        ];

        return view('contents.dashboard.activation-store', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }



    public function activationList()
    {
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic YWRtaW46MTIz',
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(config('app.api.url') . 'list_activation_store', [
            'last_nama' => '',
            'limit' => '20',
            'keyword' => ''
        ]);
        $data = json_decode($response->getBody()->getContents(), true)['data'];
        // return response()->json($data, 200);
        return DataTables::of($data)->addIndexColumn()->make(true);
    }

    public function chart()
    {
        $page_title = 'Dashboard';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Chart',
                'page' => '/dashboard/chart'
            ],
        ];

        return view('contents.dashboard.chart', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function mapOfTaiwan()
    {
        $page_title = 'Dashboard';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Map of Taiwan',
                'page' => '/dashboard/map'
            ],
        ];

        return view('contents.dashboard.map-of-taiwan', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function activationTrend()
    {
        $page_title = 'Dashboard';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Activation Trend',
                'page' => '/dashboard/activation-trend'
            ],
        ];

        return view('contents.dashboard.activation-trend', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function apformSla()
    {
        $page_title = 'Dashboard';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'APForm Performance',
                'page' => '/dashboard/apf-performance-sla'
            ],
        ];
        return view('contents.dashboard.apform-sla', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function getApFromSlaList()
    {
        $last_id_customer = (isset($_GET['last_id_customer'])) ? $_GET['last_id_customer'] : '';
        $page_control = (isset($_GET['page_control'])) ? $_GET['page_control'] : 'next';
        $limit = $_GET['length'];
        $collection = $this->repository->getApfSlaList($page_control, $last_id_customer, $limit);
        $data = $collection['data'];
        $total = (isset($_GET['records_total'])) ? $_GET['records_total'] : $collection['count'];
        // dd($data);
        return DataTables::of($data)
            ->setTotalRecords($total)
            ->setOffset($_GET['start'])
            ->addIndexColumn()
            ->toJson();
    }

    public function apformType()
    {
        $page_title = 'APForm Performance';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'APForm',
                'page' => '/reports/apform'
            ],
        ];

        $collection = $this->repository->getApfType();

        $chart = [];
        $chart['label'] = [];
        $chart['series'] = [];
        foreach ($collection['table'] as $_list) {
            array_push($chart['label'], $_list['name']);
            array_push($chart['series'], $_list['total']);
        }

        return view('contents.dashboard.apform-type', compact('page_title', 'page_description', 'page_breadcrumbs', 'chart'));
    }

    public function getApFromTypeList(Request $request)
    {
        $ap_form_type = '';
        $last_id_customer = (isset($_GET['last_id_customer'])) ? $_GET['last_id_customer'] : '';
        $page_control = (isset($_GET['page_control'])) ? $_GET['page_control'] : 'next';
        $limit = $_GET['length'];
        $collection = $this->repository->getApfTypeList($ap_form_type, $page_control, $last_id_customer, $limit);

        $data = $collection['data'];
        $total = (isset($_GET['records_total'])) ? $_GET['records_total'] : $collection['count'];
        // dd($data);
        return DataTables::of($data)
            ->setTotalRecords($total)
            ->setOffset($_GET['start'])
            ->addIndexColumn()
            ->toJson();
    }
}
