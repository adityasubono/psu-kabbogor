<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCctvpermukimansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cctvpermukimans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('permukiman_id');
            $table->string('nama_cctv');
            $table->string('ip_cctv');
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
        Schema::dropIfExists('cctvpermukimans');
    }
}
