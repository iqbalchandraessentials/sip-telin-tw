<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    public function index()
    {
        $page_title = 'Performance';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Data',
                'page' => '/performance'
            ],
        ];

        return view('contents.performance.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }
}
