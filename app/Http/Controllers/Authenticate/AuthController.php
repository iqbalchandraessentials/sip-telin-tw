<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('contents.auth.index');
    }

    public function login(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            $request->session()->flush();
            $request->session()->put('user', []);
            $request->session()->push('user', Auth::user());
            $request->session()->push('user', [
                'username' => base64_encode($request->username),
                'password' => base64_encode($request->password)
            ]);
            return Redirect::to('/dashboard/registration');
        } else {
            $request->session()->flush();
            return Redirect::to('/')->with('error', 'Username/Password Wrong');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return Redirect::to('/');
    }

    public function register(Request $request)
    {
        $url = 'http://sip.telin.tw/api/create_user';
        $client = new Client([
            'auth' => ['admin', '123'],
            'headers' => [
                'Content-Type' => 'application/json',
            ]
        ]);

        try {
            $response = $client->request('POST', $url, [
                'json' => [
                    'email' => $request->email,
                    'username' => $request->username,
                    'password' => $request->password,
                    'password2' => $request->password2,
                    'nama' => $request->nama,
                    'image' => '',
                    'posisi' => 'customer',
                    'status' => 'Y',
                ],
            ]);

            $array = json_decode($response->getBody()->getContents(), true);
            if ($array['status']['code'] == 200) {
                return Redirect::to('/dashboard/registration');
            } else {
                return $array['status']['msg'] ?: 'Something went wrong, please try again.';
            }
        } catch (RequestException $e) {
            print_r($e->getResponse());
        }
    }

    public function retrieveAuth()
    {
        $credentials = Session::get('user')[1];
        $authentication = [
            'username' => $credentials['username'],
            'password' => $credentials['password'],
        ];
        $data = json_encode($authentication);

        return response()->json($credentials, 200);
    }
}
