namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class SuratTugasSupirController extends Controller
{
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        $suratTugasSupirData = $booking->generateSuratTugasSupirData();

        return view('pdf.surat_tugas_supir', ['record' => (object) $suratTugasSupirData]);
    }
}