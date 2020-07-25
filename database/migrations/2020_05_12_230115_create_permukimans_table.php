<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermukimansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permukimans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_tpu');
            $table->string('luas_tpu');
            $table->string('tahun_digunakan');
            $table->string('lokasi');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('RW');
            $table->string('RT');
            $table->string('status');
            $table->string('keterangan_status');
            $table->string('keterangan');
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
        Schema::dropIfExists('permukimans');
    }
}
