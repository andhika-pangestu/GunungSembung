<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types_metas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('model_id')->unsigned()->nullable();
            $table->string('model_type')->nullable();
            $table->bigInteger('type_id')->unsigned();
            $table->string('key');
            $table->json('value')->nullable();
            $table->timestamps();
        });

        Schema::table('typables', function (Blueprint $table) {
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types_metas');
    }
}