<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_kuitansi');
            $table->foreignId('id_booking')->constrained('booking'); // FK ke Booking
            $table->string('nama_pemesan');
            $table->float('jml_bayar');
            $table->text('keterangan');
            $table->string('tujuan');
            $table->string('lokasi_wisata');
            $table->float('ongkos_bus');
            $table->float('sisa');
            $table->date('tgl_kuitansi')->default(now());
            $table->enum('status', ['pending', 'dp', 'lunas']); // Menambahkan status pembayaran
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
