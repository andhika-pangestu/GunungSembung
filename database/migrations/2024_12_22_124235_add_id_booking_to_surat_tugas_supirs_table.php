<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('surat_tugas_supirs', function (Blueprint $table) {
            $table->unsignedBigInteger('id_booking')->after('id_st');

            $table->foreign('id_booking')->references('id_booking')->on('booking')->onDelete('cascade');
        });
    }
};
