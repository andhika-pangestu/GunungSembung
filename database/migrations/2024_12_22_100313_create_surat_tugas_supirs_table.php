<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTugasSupirsTable extends Migration
{
    public function up()
{
    Schema::create('surat_tugas_supirs', function (Blueprint $table) {
        $table->id('id_st');
        $table->unsignedBigInteger('id_booking');
        $table->string('no_polisi');
        $table->date('tgl_berangkat');
        $table->time('jam_berangkat');
        $table->string('nama_pemesan');
        $table->string('alamat_penjemputan');
        $table->string('tujuan');
        $table->decimal('kas_komisi', 10, 2);
        $table->string('nama_admin');
        $table->date('tgl_st');
        $table->timestamps();

        $table->foreign('id_booking')->references('id_booking')->on('booking')->onDelete('cascade');
        $table->foreign('no_polisi')->references('no_polisi')->on('bus')->onDelete('cascade');
    });
}

    public function down()
    {
        Schema::dropIfExists('surat_tugas_supirs');
    }
}