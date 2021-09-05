<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $page_title = 'Reports';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Data',
                'page' => '/reports'
            ],
        ];

        return view('contents.reports.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }
}
