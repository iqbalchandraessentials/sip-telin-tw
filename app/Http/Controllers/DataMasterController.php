<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataMasterController extends Controller
{
    public function profile()
    {
        $page_title = 'Master Data';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Profile',
                'page' => '/data-master/profile'
            ],
        ];

        return view('contents.data-master.profile.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function kartuAs()
    {
        $page_title = 'Kartu As';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Kartu As',
                'page' => '/data-master/as'
            ],
        ];

        return view('contents.data-master.as.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function nusantara()
    {
        $page_title = 'Kartu Nusantara';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Nusantara',
                'page' => '/data-master/nusantara'
            ],
        ];

        return view('contents.data-master.nusantara.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function activationStore()
    {
        $page_title = 'Master Data';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Activation Store',
                'page' => '/data-master/activation-store'
            ],
        ];
        return view('contents.data-master.activation-store.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }
}
