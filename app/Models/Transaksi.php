<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = ['id_booking', 'nama_pemesan', 'jml_bayar', 'keterangan', 'tujuan', 'lokasi_wisata', 'ongkos_bus', 'sisa', 'tgl_kuitansi', 'status'];

    // Relasi ke Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking');
    }
}

