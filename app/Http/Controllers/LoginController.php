<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MUser;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('login_state')) {
            redirect('/');
        } else {
            return view('Login');
        }
    }

    public function auth(Request $request)
    {
        $username = $request->inputUsername;
        $password = $request->inputPassword;

        $data_MUser = MUser::where('username', $username)
                           ->where('password', md5($password))
                           ->get();

        if (count($data_MUser) > 0) {
            $request->session()->put('login_state', $data_MUser);
            return redirect('/');
        } else {
            return view('Login', [
                'msgType' => 'warning', // WAJIB meski kosong! agar tidak error dan sesuai dengan halaman login
                'msgStr' => 'Maaf, User name / Password kamu salah!'
            ]);
        }
    }
}
