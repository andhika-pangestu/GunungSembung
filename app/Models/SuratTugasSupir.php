<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTugasSupir extends Model
{
    use HasFactory;

    protected $table = 'surat_tugas_supir';
    protected $fillable = ['no_polisi', 'id_booking', 'nama_supir', 'tgl_berangkat', 'jam_berangkat', 'nama_pemesan', 'alamat_penjemputan', 'tujuan', 'lokasi_wisata', 'kas_komisi', 'nama_admin', 'tgl_st'];

    // Relasi ke Bus
    public function bus()
    {
        return $this->belongsTo(Bus::class, 'no_polisi', 'no_polisi');
    }

    // Relasi ke Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking');
    }

    // Relasi ke Transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_booking', 'id_booking');
    }
}
