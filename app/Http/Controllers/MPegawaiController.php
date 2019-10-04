<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MPegawai;

class MPegawaiController extends Controller
{
     public function index()
    {
        return view('Master.MPegawai');
    }

    public function store(request $request)
    {	
    	$MPegawaiModel = MPegawai::create([
            'NmMPegawai' => $request->NmMPegawai, 
            'Email' => $request->Email, 
            'NoTelp' => $request->NoTelp
          ]);

        return response()->json(['success'=> $request->NmMPegawai.' berhasil ditambahkan']);
    }

    public function update(request $request)
    {
        $MPegawaiModel = MPegawai::where('IdMPegawai', $request->IdMPegawai)->update([
            			'NmMPegawai' => $request->NmMPegawai, 
			            'Email' => $request->Email, 
			            'NoTelp' => $request->NoTelp
          ]);

        return response()->json(['success'=> 'data berhasil diupdate']);
    }

    public function delete($id)
    {
        MPegawai::where('IdMPegawai', $id)->delete();

        return redirect()->route('mapel.index');
    }
}
