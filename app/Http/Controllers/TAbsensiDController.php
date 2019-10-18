<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TAbsensiD;

class TAbsensiDController extends Controller
{
    public function Insert(Request $request)
    {
    	$Data = TAbsensiD::create([
    				'IdMPegawai' => $request->IdMPegawai,
		            'Tanggal' => $request->Tanggal,
		            'JamMulai' => $request->JamMulai,
		            'JamSelesai' => $request->JamSelesai,
		            'Selisih' => $request->Selisih,
		            'Jenis' => $request->Jenis
    			]);
    }
}
