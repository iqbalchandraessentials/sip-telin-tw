<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Http\Traits\FasconTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FasconController extends Controller
{
    use FasconTrait;

    public function editPending($id, $id_customer_number)
    {
        $page_title = 'Update';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Register Fascon',
                'page' => '/register/fascon/update/pending/' . $id . '/' . $id_customer_number
            ]
        ];

        $data = $this->repository->getDetailSummary($id, $id_customer_number);
        // dd($data);
        $customer = $data['customer'];
        $customerNumber = $data['customer_number'];
        $customerIdentity = $data['customer_identity'];
        $customer_city = $customerNumber['customer_id_city'];
        $nationalities = $this->nationalities->getNationality();
        $cities = $this->cities->getAllCity();
        $districts = $this->cities->getAllDistrict($customer_city);
        $activationStores = $this->stores->getAll();
        $availabilities = $this->availabilities->getAvailability();
        $types = $this->types->getTypeID();
        return view('contents.register.fascon.update', compact(
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
            'cities',
            'customer_city',
            'districts'
        ));
    }

    public function editRegistered($id, $id_customer_number)
    {
        $page_title = 'Update';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Register Fascon',
                'page' => '/register/fascon/update/registered/' . $id . '/' .  $id_customer_number
            ]
        ];

        $data = $this->repository->getDetailSummary($id, $id_customer_number);
        $customer = $data['customer'];
        $customerNumber = $data['customer_number'];
        $customerIdentity = $data['customer_identity'];
        $customer_city = $customerNumber['customer_id_city'];
        $nationalities = $this->nationalities->getNationality();
        $cities = $this->cities->getAllCity();
        $districts = $this->cities->getAllDistrict($customer_city);
        $activationStores = $this->stores->getAll();
        $availabilities = $this->availabilities->getAvailability();
        $types = $this->types->getTypeID();
        return view('contents.register.fascon.update', compact(
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
            'cities',
            'customer_city',
            'districts'
        ));
    }

    public function editRejected($name)
    {
        $page_title = 'Update';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Register Fascon',
                'page' => '/register/fascon/update/rejected/' . $name
            ]
        ];

        $data = $this->repository->getRejectedName($name);
        $nationalities = $this->nationalities->getNationality();
        $activationStores = $this->stores->getAll();
        $availabilities = $this->availabilities->getAvailability();
        return view('contents.register.fascon.update', compact('page_title', 'page_description', 'page_breadcrumbs', 'data', 'nationalities', 'activationStores', 'availabilities'));
    }

    public function editTrashed($name)
    {
        $page_title = 'Update';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Register Fascon',
                'page' => '/register/fascon/update/trashed/' . $name
            ]
        ];

        $data = $this->repository->getTrashedName($name);
        $nationalities = $this->nationalities->getNationality();
        $activationStores = $this->stores->getAll();
        $availabilities = $this->availabilities->getAvailability();
        return view('contents.register.fascon.update', compact('page_title', 'page_description', 'page_breadcrumbs', 'data', 'nationalities', 'activationStores', 'availabilities'));
    }

    public function getCustomerPending()
    {
        $collection = $this->repository->getPendingCollection();
        return DataTables::of($collection)->addIndexColumn()
            ->toJson();
    }

    public function getCustomerRegistered()
    {
        $collection = $this->repository->getRegisteredCollection();
        return DataTables::of($collection)
            ->addIndexColumn()
            ->make(true);
    }

    public function getCustomerRejected()
    {
        $collection = $this->repository->getRejectedCollection();
        return DataTables::of($collection)->addIndexColumn()->make(true);
    }

    public function getCustomerTrashed()
    {
        $collection = $this->repository->getTrashedCollection();
        return DataTables::of($collection)->addIndexColumn()->make(true);
    }

    public function getDetail(Request $request)
    {
        $id = $request->id;
        $idc = $request->idc;
        $data = $this->repository->getDataPart($id, $idc);
        return response()->json($data, 200);
    }
}
