<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $table = 'bus';
    protected $primaryKey = 'no_polisi'; // Ganti dengan primary key yang benar
    public $incrementing = false; // Jika primary key bukan auto-increment
    protected $keyType = 'string'; // Jika primary key adalah string

    protected $fillable = [
        'no_polisi',
        'jenis',
        'kapasitas',
        'ketersediaan',
        'nama_supir',
        // tambahkan atribut lain yang diperlukan
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'no_polisi', 'no_polisi');
    }
}