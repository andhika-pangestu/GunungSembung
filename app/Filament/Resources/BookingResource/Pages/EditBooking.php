<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Booking;
use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Model;

class EditBooking extends EditRecord
{
    protected static string $resource = BookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
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

        // Update data booking
        $record->update($data);

        // Sinkronisasi jadwal dengan pilihan_bus yang baru
        $pilihan_bus = json_decode($data['pilihan_bus'], true);

        // Hapus jadwal lama yang terkait dengan booking
        $record->jadwals()->delete();

        // Simpan jadwal baru
        foreach ($pilihan_bus as $no_polisi) {
            Jadwal::create([
                'no_polisi' => $no_polisi,
                'tgl_berangkat' => $record->tgl_berangkat,
                'tgl_kembali' => $record->tgl_kembali,
                'id_booking' => $record->id_booking,
            ]);
        }

        return $record;
    }
}