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

    public function getDisplayNameAttribute()
    {
        return "{$this->id_booking} - {$this->nama_pemesan}";
    }

    // Tambahkan metode updateStatus
    public function updateStatus($status)
    {
        $this->status = $status;
        $this->save();
    }
}
