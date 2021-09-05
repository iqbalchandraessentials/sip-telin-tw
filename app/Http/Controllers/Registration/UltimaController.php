<?php

namespace App\Http\Controllers\Registration;

use App\Http\Traits\FasconTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\UltimaTrait;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Http;
use League\CommonMark\HtmlRenderer;
use SebastianBergmann\Environment\Console;

class UltimaController extends Controller
{
    use UltimaTrait;

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

        $nationalities = $this->nationalities->getNationality();
        $activationStores = $this->stores->getAll();

        return view('contents.register.ultima.index', compact('page_title', 'page_description', 'page_breadcrumbs', 'nationalities', 'activationStores'));
    }

    public function editLead($id, $id_customer_number)
    {
        $page_title = 'Update';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Register Ultima',
                'page' => '/register/ultima'
            ]
        ];
        $data = $this->repository->getDetailSummary($id, $id_customer_number);
        $customer = $data['customer'];
        $customerNumber = $data['customer_number'];
        $customerIdentity = $data['customer_identity'][0];
        $identities = $data['customer_identity'];
        $nationalities = $this->nationalities->getNationality();
        $activationStores = $this->stores->getAll();
        $availabilities = $this->availabilities->getAvailability();
        $types = $this->types->getTypeID();
        return view('contents.register.ultima.update', compact(
            'page_title',
            'page_description',
            'page_breadcrumbs',
            'data',
            'nationalities',
            'activationStores',
            'availabilities',
            'customer',
            'customerNumber',
            'customerIdentity',
            'types',
            'identities'
        ));
    }

    public function editProcess($id, $id_customer_number)
    {
        $page_title = 'Update';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Register Ultima',
                'page' => '/register/ultima'
            ]
        ];

        $data = $this->repository->getDetailSummary($id, $id_customer_number);
        $customer = $data['customer'];
        $customerNumber = $data['customer_number'];
        $customerIdentity = $data['customer_identity'][0];
        $identities = $data['customer_identity'];
        $nationalities = $this->nationalities->getNationality();
        $activationStores = $this->stores->getAll();
        $availabilities = $this->availabilities->getAvailability();
        $types = $this->types->getTypeID();

        return view('contents.register.ultima.update', compact(
            'page_title',
            'page_description',
            'page_breadcrumbs',
            'nationalities',
            'activationStores',
            'availabilities',
            'customer',
            'customerNumber',
            'customerIdentity',
            'types',
            'identities'
        ));
    }

    public function editActivated($id, $id_customer_number)
    {
        $page_title = 'Update';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Register Ultima',
                'page' => '/register/ultima'
            ]
        ];

        $data = $this->repository->getDetailSummary($id, $id_customer_number);
        $apfHistory = $this->repository->getCustomerApfHistory($id, $id_customer_number);
        // dd($data);
        $customer = $data['customer'];
        $customerNumber = $data['customer_number'];
        $customerIdentity = $data['customer_identity'][0];
        $identities = $data['customer_identity'];
        $nationalities = $this->nationalities->getNationality();
        $activationStores = $this->stores->getAll();

        $customer_city = $customerNumber['customer_id_city'];
        $cities = $this->cities->getAllCity();
        $districts = $this->cities->getAllDistrict($customer_city);
        $availabilities = $this->availabilities->getAvailability();
        $types = $this->types->getTypeID();
        return view('contents.register.ultima.edit-activated', compact(
            'page_title',
            'page_description',
            'page_breadcrumbs',
            'nationalities',
            'activationStores',
            'customer',
            'availabilities',
            'customerNumber',
            'customerIdentity',
            'types',
            'cities',
            'customer_city',
            'districts',
            'identities',
            'apfHistory'
        ));
    }

    public function getCustomerLead(Request $request)
    {
        $page = ($request->get('start') / $request->get('length') + 1);
        $limit = $request->get('length');

        $tipe_keyword = 'nama';
        $keyword = ($request->get('search')['value'] != '') ? $request->get('search')['value'] : '';
        $year = $request->get('year');
        $filter = ($request->get('filter')) ? json_encode($request->get('filter')) : '';
        $collection = $this->repository->getLeadCollection($page, $limit, $tipe_keyword, $keyword, $year, $filter);
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
        // return DataTables::of($collection)->addIndexColumn()
        //     ->toJson();
    }

    public function getCustomerProcess(Request $request)
    {
        $page = ($request->get('start') / $request->get('length') + 1);
        $limit = $request->get('length');

        $tipe_keyword = 'nama';
        $keyword = ($request->get('search')['value'] != '') ? $request->get('search')['value'] : '';
        $year = $request->get('year');
        $filter = ($request->get('filter')) ? json_encode($request->get('filter')) : '';
        $collection = $this->repository->getProcessCollection($page, $limit, $tipe_keyword, $keyword, $year, $filter);
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
        // return DataTables::of($collection)
        //     ->addIndexColumn()
        //     ->make(true);
    }

    public function getCustomerActivated(Request $request)
    {
        $page = ($request->get('start') / $request->get('length') + 1);
        $limit = $request->get('length');

        $tipe_keyword = 'nomor_tw';
        $keyword = ($request->get('search')['value'] != '') ? $request->get('search')['value'] : '';
        $year = $request->get('year');
        $filter = ($request->get('filter')) ? json_encode($request->get('filter')) : '';
        $collection = $this->repository->getActivatedCollection($page, $limit, $tipe_keyword, $keyword, $year, $filter);
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

        // $collection = $this->repository->getActivatedCollection();
        // return DataTables::of($collection)->addIndexColumn()->make(true);
    }

    public function getDetail(Request $request)
    {
        $name = $request->name;
        $status = $request->status;
        $data = $this->repository->getDataPart($name, $status);
        return response()->json($data, 200);
    }

    public function getDetailSummary($id, $id_customer_number)
    {
        $data = $this->repository->getDetailSummary($id, $id_customer_number);
        return response()->json($data, 200);
    }

    public function getPrintData($id, $id_customer_number)
    { {
            $page_title = 'Print';
            $page_description = '';
            $page_breadcrumbs = [
                [
                    'title' => 'Print Ultima',
                    'page' => '/register/ultima'
                ]
            ];
            $data = $this->repository->getDetailSummary($id, $id_customer_number);
            // dd($data);
            $customer = $data['customer'];
            $customerNumber = $data['customer_number'];
            $customerIdentity = $data['customer_identity'][0];
            $identities = $data['customer_identity'];
            $nationalities = $this->nationalities->getNationality();
            $activationStores = $this->stores->getAll();
            $availabilities = $this->availabilities->getAvailability();
            $types = $this->types->getTypeID();
            return view('contents.register.ultima.print', compact(
                'page_title',
                'page_description',
                'page_breadcrumbs',
                'data',
                'nationalities',
                'activationStores',
                'availabilities',
                'customer',
                'customerNumber',
                'customerIdentity',
                'types',
                'identities'
            ));
        }
    }



    public function updateProcess(Request $request)
    {
        $url = 'http://20.194.7.52:3000/api/update_customer';
        $data = [
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'negara' => $request->negara,
            'nomor_identity[]' => $request->nomor_identity,
            'id_activation_store' => $request->id_activation_store,
            'availibility' => $request->availibility,
            'information' => $request->information,
            'tipe_number' => $request->tipe_number,
            'status' => $request->status,
            'ap_form' => $request->file('ap_form'),
            'upload_identity[]' => $request->file('upload_identity'),
            'id_customer' => $request->id_customer,
            'nomor_identity_ori[]' => $request->nomor_identity_ori,
            'id_customer_number' => $request->id_customer_number,
            'id_type[]' => $request->id_type,
            'tempat_lahir' => $request->tempat_lahir,
        ];
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . $this->credentials->getAuthentication(),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post($url, $data);
        $result = json_decode($response->getBody()->getContents(), true);
        return response()->json($result, 200);
        // return Redirect::to('/dashboard/registration');
    }

    public function renderIdentities()
    {
        $identities = view('contents.register.shared.identities')->render();
        // echo $identities->render();
    }

    public function exportTable($status)
    {
        $start_date = (isset($_GET['start_date'])) ? $_GET['start_date'] : '';
        $end_date = (isset($_GET['end_date'])) ? $_GET['end_date'] : '';

        $data = $this->repository->exportCustomer($status, $start_date, $end_date);
        $filename = $status . '_' . date('Ymdhis');
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=" . $filename . ".csv");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo $data;
        die;
    }

    public function uploadApFormExcel(Request $request)
    {
        $filePath = $_FILES['file']['tmp_name'];
        $type = $_FILES['file']['type'];
        $fileName = $_FILES['file']['name'];

        $data = array('file_template' => curl_file_create($filePath, $type, $fileName));
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, config('app.api.url') . 'upload_apf_excell');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic YWRtaW46MTIz',
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        // dd($response);
        curl_close($ch);

        $page_title = 'Registration';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Ultima',
                'page' => '/register/ultima'
            ],
        ];

        return Redirect::back();
    }
}
