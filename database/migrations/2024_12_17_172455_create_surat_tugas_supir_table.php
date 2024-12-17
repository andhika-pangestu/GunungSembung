<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratTugasSupirTable extends Migration
{
    public function up()
    {
        Schema::create('surat_tugas_supir', function (Blueprint $table) {
            $table->id('id_st');
            $table->foreignId('no_polisi')->constrained('bus');
            $table->foreignId('id_booking')->constrained('booking');
            $table->string('nama_supir');
            $table->date('tgl_berangkat');
            $table->time('jam_berangkat');
            $table->string('nama_pemesan');
            $table->string('alamat_penjemputan');
            $table->string('tujuan');
            $table->string('lokasi_wisata');
            $table->float('kas_komisi');
            $table->string('nama_admin');
            $table->date('tgl_st')->default(now());
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_tugas_supir');
    }
}
