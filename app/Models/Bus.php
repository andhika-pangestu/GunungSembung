<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'bus';

    // Menetapkan no_polisi sebagai primary key
    protected $primaryKey = 'no_polisi';

    // Matikan auto-increment karena primary key menggunakan string
    public $incrementing = false;

    // Kolom yang bisa diisi massal
    protected $fillable = ['no_polisi', 'jenis', 'kapasitas', 'ketersediaan', 'nama_supir'];

    // Relasi ke Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'pilihan_bus', 'no_polisi');
    }


    // Relasi ke Perbaikan
    public function perbaikans()
    {
        return $this->hasMany(Perbaikan::class, 'no_polisi', 'no_polisi');
    }
}
