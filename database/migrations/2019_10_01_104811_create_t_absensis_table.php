<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TAbsensi', function (Blueprint $table) {
            $table->bigIncrements('IdTAbsensi');
            $table->date('TglAbsensi');
            $table->time('JamMasuk');
            $table->time('JamPulang');
            $table->time('JamAwalLembur');
            $table->time('JamAkhirLembur');
            $table->time('TotalJam');
            $table->time('Terlambat');
            $table->time('Ijin');
            $table->time('Sakit');
            $table->integer('IdMPegawai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TAbsensi');
    }
}
