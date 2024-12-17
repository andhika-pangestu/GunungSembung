<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    use HasFactory;

    protected $table = 'perbaikan';
    protected $fillable = ['no_polisi', 'tipe_perbaikan', 'nama_suku_cadang', 'tgl_perbaikan', 'harga_perbaikan'];

    // Relasi ke Bus
    public function bus()
    {
        return $this->belongsTo(Bus::class, 'no_polisi', 'no_polisi');
    }
}
