<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHargaPerbaikanColumnInPerbaikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perbaikan', function (Blueprint $table) {
            $table->bigInteger('harga_perbaikan')->change(); // Change to BIGINT
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
            $table->integer('harga_perbaikan')->change(); // Revert back to original type if needed
        });
    }
}