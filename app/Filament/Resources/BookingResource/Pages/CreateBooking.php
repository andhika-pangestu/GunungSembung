<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Booking;

class CreateBooking extends CreateRecord
{
    protected static string $resource = BookingResource::class;

    // Override the saving method to handle array conversion
    protected function handleRecordCreation(array $data): Booking
    {
        // Convert pilihan_bus array into a JSON string for storage
        if (isset($data['pilihan_bus']) && is_array($data['pilihan_bus'])) {
            $data['pilihan_bus'] = json_encode($data['pilihan_bus']);
        }

        // Calculate the ongkos_bus as the tagihan divided by the number of buses
        $numberOfBuses = count(json_decode($data['pilihan_bus'] ?? '[]', true)); // Decoding to count buses
        if ($numberOfBuses > 0 && isset($data['jml_tagihan'])) {
            $data['ongkos_bus'] = $data['jml_tagihan'] / $numberOfBuses;
        }

        // Create the booking record with the modified data
        return Booking::create($data);
    }
}
