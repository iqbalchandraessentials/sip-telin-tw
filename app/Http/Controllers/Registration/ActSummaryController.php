<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Repositories\ActivationSummaryRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ActSummaryController extends Controller
{
    private $repository;

    public function __construct(ActivationSummaryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $page_title = 'Register';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Activation Summary',
                'page' => '/register/summary'
            ],
        ];

        return view('contents.register.summary.index'
        ,compact('page_title', 'page_description', 'page_breadcrumbs')
    );
    }

    public function getSummaries()
    {
        $collection = $this->repository->getSummaryCollection();
        return DataTables::of($collection)->addIndexColumn()
            ->toJson();
    }
}
