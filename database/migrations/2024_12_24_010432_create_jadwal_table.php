<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('no_polisi');
            $table->date('tgl_berangkat');
            $table->date('tgl_kembali')->nullable();
            $table->foreign('no_polisi')->references('no_polisi')->on('bus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
}