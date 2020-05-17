<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerngelolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perngelolahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('permukiman_id');
            $table->string('nama');
            $table->string('umur');
            $table->string('pendidikan');
            $table->string('tugas');
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
        Schema::dropIfExists('perngelolahs');
    }
}
