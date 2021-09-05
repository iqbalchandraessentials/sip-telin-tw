<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    private $repository;

    public function __construct(UserRepository $repositories)
    {
        $this->repository = $repositories;
    }

    public function index()
    {
        $page_title = 'Master Data';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'User',
                'page' => '/data-master/user'
            ],
        ];

        return view('contents.data-master.user.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function getUsers()
    {
        $data =  $this->repository->userCollection();
        return DataTables::of($data)->addIndexColumn()->make(true);
    }
}
