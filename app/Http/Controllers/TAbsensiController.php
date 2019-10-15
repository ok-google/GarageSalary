<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TAbsensiController extends Controller
{
    public function Index()
    {
    	return view('Transaksi.TAbsensi');
    }
}
