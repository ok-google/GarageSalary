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

    public function fetch()
    {
    	$data = MPegawai::all();

		return response()->json($data);
    }

    public function find($id)
    {
        $data = MPegawai::findOrFail('IdMPegawai', $id);
        return response()->json($data);
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

    public function delete(request $request)
    {
        MPegawai::where('IdMPegawai', $request->IdMPegawai)->delete();

        return redirect()->route('Master.MPegawai');
    }
}
