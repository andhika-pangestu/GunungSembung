<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $fillable = ['no_polisi', 'tgl_berangkat', 'tgl_kembali', 'id_booking'];

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'no_polisi', 'no_polisi');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking', 'id_booking');
    }
}
