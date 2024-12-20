<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_kuitansi');
            $table->unsignedBigInteger('id_booking'); // Menentukan kolom id_booking
            $table->foreign('id_booking')->references('id_booking')->on('booking')->onDelete('cascade');
            $table->float('jml_bayar');
            $table->text('keterangan_transaksi')->nullable();
            $table->decimal('sisa', 10, 2);
            $table->date('tgl_kuitansi')->nullable();
            $table->enum('status', ['pending', 'dp', 'lunas']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
