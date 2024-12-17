<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerbaikanTable extends Migration
{
    public function up()
    {
        Schema::create('perbaikan', function (Blueprint $table) {
            $table->id();
            $table->string('no_polisi');
            $table->string('tipe_perbaikan');
            $table->string('nama_suku_cadang');
            $table->date('tgl_perbaikan');
            $table->decimal('harga_perbaikan', 10, 2);
            $table->timestamps();

            $table->foreign('no_polisi')->references('no_polisi')->on('bus');
        });
    }

    public function down()
    {
        Schema::dropIfExists('perbaikan');
    }
}
