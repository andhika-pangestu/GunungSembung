<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $table = 'bus';
    protected $fillable = ['no_polisi', 'jenis', 'kapasitas'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'no_polisi', 'no_polisi');
    }
}
