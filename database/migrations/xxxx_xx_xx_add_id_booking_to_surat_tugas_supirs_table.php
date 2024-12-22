use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdBookingToSuratTugasSupirsTable extends Migration
{
    public function up()
    {
        Schema::table('surat_tugas_supirs', function (Blueprint $table) {
            $table->unsignedBigInteger('id_booking')->after('id_st');

            $table->foreign('id_booking')->references('id_booking')->on('booking')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('surat_tugas_supirs', function (Blueprint $table) {
            $table->dropForeign(['id_booking']);
            $table->dropColumn('id_booking');
        });
    }
}