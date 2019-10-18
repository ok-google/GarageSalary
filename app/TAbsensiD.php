<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TAbsensiD extends Model
{
    protected $table = 'TAbsensiD';
    protected $fillable = [
    						'IdMPegawai',
				            'Tanggal',
				            'JamMulai',
				            'JamSelesai',
				            'Selisih',
				            'Jenis'
    					  ];
}
