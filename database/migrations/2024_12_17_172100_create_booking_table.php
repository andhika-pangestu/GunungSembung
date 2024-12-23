<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id('id_booking');
            $table->date('tgl_pemesanan');
            // Ubah kolom 'pilihan_bus' menjadi JSON
            $table->json('pilihan_bus');  // Menyimpan array JSON
            $table->string('alamat_penjemputan');
            $table->string('tujuan');
            $table->string('nama_pemesan');
            $table->float('jml_tagihan');
            // Ongkos Bus menjadi nullable, karena akan dihitung di controller atau model
            $table->float('ongkos_bus')->nullable(); 
            $table->text('keterangan')->nullable();
            $table->date('tgl_berangkat');
            $table->time('jam_berangkat');
            $table->date('tgl_kembali')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('booking');
    }
}
