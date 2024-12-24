<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tgl_pemesanan' => 'required|date',
            'tgl_berangkat' => 'required|date',
            'tgl_kembali' => 'required|date',
            'pilihan_bus' => 'required|array',
            'alamat_penjemputan' => 'required|string',
            'tujuan' => 'required|string',
            'nama_pemesan' => 'required|string',
            'jml_tagihan' => 'required|numeric',
        ]);

        // Simpan data booking
        $booking = Booking::create($validated);

        // Simpan data ke tabel jadwal
        foreach ($validated['pilihan_bus'] as $no_polisi) {
            Jadwal::create([
                'no_polisi' => $no_polisi,
                'tgl_berangkat' => $validated['tgl_berangkat'],
                'tgl_kembali' => $validated['tgl_kembali'],
                'id_booking' => $booking->id,
            ]);
        }

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dibuat.');
    }
}