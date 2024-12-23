<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTglKembaliToSuratTugasSupirsTable extends Migration
{
    public function up()
    {
        Schema::table('surat_tugas_supirs', function (Blueprint $table) {
            $table->date('tgl_kembali')->nullable()->after('tgl_st');
        });
    }

    public function down()
    {
        Schema::table('surat_tugas_supirs', function (Blueprint $table) {
            $table->dropColumn('tgl_kembali');
        });
    }
}