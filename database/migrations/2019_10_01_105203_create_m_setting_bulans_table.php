<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSettingBulansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MSettingBulan', function (Blueprint $table) {
            $table->bigIncrements('IdMSettingBulan');
            $table->integer('Bulan');
            $table->integer('Tahun');
            $table->integer('TotalKerjaNonSabtu');
            $table->integer('TotalKerjaSabtu');
            $table->integer('TotalLibur');
            $table->integer('TotalLiburSabtu');
            $table->integer('TotalJamKerja');

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
        Schema::dropIfExists('MSettingBulan');
    }
}
