<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTAbsensiDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TAbsensiD', function (Blueprint $table) {
            $table->bigIncrements('IdTAbsensiD');
            $table->integer('IdMPegawai');
            $table->date('Tanggal');
            $table->time('JamMulai');
            $table->time('JamSelesai');
            $table->decimal('Selisih');
            $table->string('Jenis');
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
        Schema::dropIfExists('TAbsensiD');
    }
}
