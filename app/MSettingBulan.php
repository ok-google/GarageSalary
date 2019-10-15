<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MSettingBulan extends Model
{
    protected $table = "msettingbulan";
    protected $fillable = ['Bulan',
            			   'Tahun',
            			   'TotalKerjaNonSabtu',
            			   'TotalKerjaSabtu',
            			   'TotalLibur',
            			   'TotalLiburSabtu',
            			   'TotalJamKerja'];
}
