<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('login_state')) { // Jika Sudah Login
            return view('Home');
        } else {
            return redirect('/Login');
        }
    }
}
