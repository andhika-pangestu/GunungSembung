<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Booking::insert([
            [
                'tgl_pemesanan' => now()->toDateString(),
                'pilihan_bis' => json_encode(['B1234XYZ', 'B5678ABC']),
                'alamat_penjemputan' => 'Jl. Sudirman No.10, Jakarta',
                'tujuan' => 'Bandung',
                'nama_pemesan' => 'Andhika Pangestu',
                'tgl_berangkat' => now()->addDays(1)->toDateString(),
                'jam_berangkat' => '08:00:00',
                'jml_tagihan' => 1500000,
                'keterangan' => 'Perjalanan bisnis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tgl_pemesanan' => now()->toDateString(),
                'pilihan_bis' => json_encode(['B9876DEF']),
                'alamat_penjemputan' => 'Jl. Diponegoro No.20, Surabaya',
                'tujuan' => 'Malang',
                'nama_pemesan' => 'Rina Kartika',
                'tgl_berangkat' => now()->addDays(3)->toDateString(),
                'jam_berangkat' => '10:00:00',
                'jml_tagihan' => 2000000,
                'keterangan' => 'Wisata keluarga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
