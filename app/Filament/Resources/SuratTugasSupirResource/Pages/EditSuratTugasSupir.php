<?php

namespace App\Filament\Resources\SuratTugasSupirResource\Pages;

use App\Filament\Resources\SuratTugasSupirResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSuratTugasSupir extends EditRecord
{
    protected static string $resource = SuratTugasSupirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
