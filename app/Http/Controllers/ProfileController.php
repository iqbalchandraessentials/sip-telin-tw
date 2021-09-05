<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $page_title = 'Update Profile';
        $page_description = '';
        $page_breadcrumbs = [
            [
                'title' => 'Update Profile',
                'page' => '/profile/update'
            ],
        ];

        return view('contents.profile.update', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }
}
