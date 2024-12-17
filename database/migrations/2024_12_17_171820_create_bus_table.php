<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusTable extends Migration
{
    public function up()
    {
        Schema::create('bus', function (Blueprint $table) {
            $table->string('no_polisi')->primary(); // Primary key
            $table->string('jenis');
            $table->integer('kapasitas');
            $table->boolean('ketersediaan');
            $table->string('nama_supir');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bus');
    }
}
