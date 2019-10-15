<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MUser;
use App\MPegawai;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Register',[
            'msgType' => '',
            'msgStr' => ''
        ]);
    }

    public function insert(Request $request)
    {
        $username = $request->inputUsername;
        $password = $request->inputPassword;
        $namaPegawai = $request->inputNamaPegawai;
        $email = $request->inputEmail;
        $noTelp = $request->inputNoTelp;

        MPegawai::create([
            'NmMPegawai' => $namaPegawai,
            'Email' => $email,
            'NoTelp' => $noTelp
        ]);

        $mPegawai = MPegawai::where('NmMPegawai', $namaPegawai)
                              ->where('Email', $email)
                              ->where('NoTelp', $noTelp)
                              ->get('IdMPegawai')[0];

        MUser::create([
            'username' => $username,
            'password' => md5($password),
            'IdMPegawai' => $mPegawai->IdMPegawai
        ]);

        // return redirect('/Login')->with('msgType', 'success')->with('msgStr', 'Selamat, kamu telah terdaftar.');

        return view('Login', ['msgType'=>'success',
                              'msgStr'=>'Selamat gaes...']);
    }
}
