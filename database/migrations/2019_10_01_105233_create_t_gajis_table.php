<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGajisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TGaji', function (Blueprint $table) {
            $table->bigIncrements('IdTGaji');
            $table->integer('IdMPegawai');
            $table->integer('IdMSettingBulan');
            $table->decimal('Selisih', 20, 2);
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
        Schema::dropIfExists('TGaji');
    }
}
