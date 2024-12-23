<?php

namespace App\Filament\Resources\TransaksiResource\Pages;

use App\Filament\Resources\TransaksiResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Transaksi;

class CreateTransaksi extends CreateRecord
{
    protected static string $resource = TransaksiResource::class;

    protected function handleRecordCreation(array $data): Transaksi
    {
        // Pastikan nilai sisa tidak melebihi batas
        if (isset($data['sisa']) && $data['sisa'] > PHP_INT_MAX) {
            $data['sisa'] = PHP_INT_MAX;
        }

        // Simpan data transaksi
        return Transaksi::create($data);
    }
}
