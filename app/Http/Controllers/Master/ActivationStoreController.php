<?php

namespace App\Http\Controllers\Master;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Repositories\ActivationStoreRepository;
use App\Repositories\CredentialRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Support\Collection;
use App\Support\Model;
use GuzzleHttp\Client;

class ActivationStoreController extends Controller
{
    private $repository;

    public function __construct(ActivationStoreRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $page_title = 'Data Master';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Activation Store',
                'page' => '/data-master/activation-store'
            ],
        ];

        return view('contents.data-master.activation-store.index', compact(
            'page_title',
            'page_description',
            'page_breadcrumbs',
        ));
    }

    public function store(Request $request)
    {
        $collection = $request->except(['_token', '_method']);
        $url = config('app.api.url').'create_activation_store';
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic YWRtaW46MTIz',
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post($url, $collection);
        $data = json_decode($response->getBody()->getContents(), true);
        return response()->json($data, 200);
    }

    public function getActivationStore()
    {
        $collection = $this->repository->getCollection();
        return DataTables::of($collection)
            ->addIndexColumn()->make(true);
    }
}
