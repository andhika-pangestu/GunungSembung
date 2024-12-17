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
        'keterangan', 'tgl_berangkat', 'jam_berangkat', 'tgl_kembali'
    ];

    // Tentukan primary key yang benar
    protected $primaryKey = 'id_booking';

    // Relasi ke Bus
    public function bus()
    {
        return $this->belongsTo(Bus::class, 'pilihan_bus', 'no_polisi');
    }

    // Relasi ke Transaksi
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id_booking');
    }
}
