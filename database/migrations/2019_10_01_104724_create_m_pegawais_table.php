<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MPegawai', function (Blueprint $table) {
            $table->bigIncrements('IdMPegawai');
            $table->string('NmMPegawai');
            $table->string('Email')->unique();
            $table->string('NoTelp')->unique();
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
        Schema::dropIfExists('MPegawai');
    }
}
