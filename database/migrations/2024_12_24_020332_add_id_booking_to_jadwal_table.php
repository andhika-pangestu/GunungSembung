<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdBookingToJadwalTable extends Migration
{
    public function up()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->unsignedBigInteger('id_booking')->after('id');
            $table->foreign('id_booking')->references('id_booking')->on('booking')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropForeign(['id_booking']);
            $table->dropColumn('id_booking');
        });
    }
}