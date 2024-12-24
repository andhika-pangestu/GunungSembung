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
            $booking->updateJadwal();
        });
    }

    public function updateJadwal()
    {
        // Hapus jadwal yang tidak ada di pilihan_bus
        $currentBuses = is_string($this->pilihan_bus) ? json_decode($this->pilihan_bus, true) : $this->pilihan_bus;
        Jadwal::where('id_booking', $this->id_booking)
            ->whereNotIn('no_polisi', $currentBuses)
            ->delete();

        // Tambahkan jadwal baru untuk bus yang baru ditambahkan
        foreach ($currentBuses as $no_polisi) {
            Jadwal::updateOrCreate(
                ['id_booking' => $this->id_booking, 'no_polisi' => $no_polisi],
                ['tgl_berangkat' => $this->tgl_berangkat, 'tgl_kembali' => $this->tgl_kembali]
            );
        }
    }
}
