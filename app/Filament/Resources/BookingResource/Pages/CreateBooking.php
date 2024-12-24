<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Booking;
use App\Models\Jadwal;

class CreateBooking extends CreateRecord
{
    protected static string $resource = BookingResource::class;

    protected function handleRecordCreation(array $data): Booking
    {
        // Konversi pilihan_bus menjadi string JSON
        if (isset($data['pilihan_bus']) && is_array($data['pilihan_bus'])) {
            $data['pilihan_bus'] = json_encode($data['pilihan_bus']);
        }

        // Hitung ongkos_bus sebagai tagihan dibagi dengan jumlah bus
        $numberOfBuses = count(json_decode($data['pilihan_bus'] ?? '[]', true)); // Decoding to count buses
        if ($numberOfBuses > 0 && isset($data['jml_tagihan'])) {
            $data['ongkos_bus'] = $data['jml_tagihan'] / $numberOfBuses;
        }

        // Simpan data booking
        $booking = Booking::create($data);

        // Ubah pilihan_bus dari string JSON menjadi array
        $pilihan_bus = json_decode($data['pilihan_bus'], true);

        // Simpan data ke tabel jadwal
        foreach ($pilihan_bus as $no_polisi) {
            Jadwal::create([
                'no_polisi' => $no_polisi,
                'tgl_berangkat' => $data['tgl_berangkat'],
                'tgl_kembali' => $data['tgl_kembali'],
                'id_booking' => $booking->id_booking,
            ]);
        }

        return $booking;
    }
}