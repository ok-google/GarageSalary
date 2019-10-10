<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MUser extends Model
{
    protected $table = 'MUser';
    protected $filleble = ['username', 'password', 'IdMPegawai'];
}
