<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdPerbaikanToPerbaikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perbaikan', function (Blueprint $table) {
            $table->bigIncrements('id_perbaikan'); // Menambah kolom primary key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perbaikan', function (Blueprint $table) {
            $table->dropColumn('id_perbaikan');
        });
    }
}