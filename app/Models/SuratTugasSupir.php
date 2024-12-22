<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTugasSupir extends Model
{
    use HasFactory;

    protected $table = 'surat_tugas_supirs';
    protected $fillable = [
        'id_booking', 'nama_supir', 'no_polisi', 'tgl_berangkat', 
        'jam_berangkat', 'nama_pemesan', 'alamat_penjemputan', 
        'tujuan', 'kas_komisi', 'nama_admin', 'tgl_st', 'tgl_kembali'
    ];

    protected $primaryKey = 'id_st';

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'id_booking');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'no_polisi', 'no_polisi');
    }
}