<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $fillable = [
        'tgl_pemesanan', 'pilihan_bus', 'alamat_penjemputan', 
        'tujuan', 'nama_pemesan', 'jml_tagihan', 'ongkos_bus', 
        'keterangan', 'tgl_berangkat', 'jam_berangkat', 'tgl_kembali',
        'status',
    ];

    protected $primaryKey = 'id_booking';

    protected $casts = [
        'pilihan_bus' => 'array', // Automatically cast pilihan_bus to array
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'pilihan_bus', 'no_polisi');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_booking');
    }

    public function suratTugasSupir()
    {
        return $this->hasMany(SuratTugasSupir::class, 'id_booking');
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'id_booking', 'id_booking');
    }

    public function updateStatus()
    {
        $totalBayarSebelumnya = $this->transaksi->sum('jml_bayar');
        $sisa = $this->jml_tagihan - $totalBayarSebelumnya;
        $this->status = $sisa == 0 ? 'lunas' : 'dp';
        $this->save();
    }

    protected static function booted()
    {
        static::updated(function ($booking) {
            // Check if pilihan_bus is an array
            if (is_array($booking->pilihan_bus)) {
                // Delete old jadwal records
                $booking->jadwals()->delete();

                // Save new jadwal records
                foreach ($booking->pilihan_bus as $no_polisi) {
                    Jadwal::create([
                        'no_polisi' => $no_polisi,
                        'tgl_berangkat' => $booking->tgl_berangkat,
                        'tgl_kembali' => $booking->tgl_kembali,
                        'id_booking' => $booking->id_booking,
                    ]);
                }
            } else {
                // Handle the case where pilihan_bus is not an array (optional logging or error handling)
                // Optionally log or throw an exception
            }

            // Update transaksi records
            foreach ($booking->transaksi as $transaksi) {
                $transaksi->update([
                    'tgl_berangkat' => $booking->tgl_berangkat,
                    'tgl_kembali' => $booking->tgl_kembali,
                ]);
            }
        });
    }
}
