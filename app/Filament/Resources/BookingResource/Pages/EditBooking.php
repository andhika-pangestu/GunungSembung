<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Booking;
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

        return $record;
    }
}