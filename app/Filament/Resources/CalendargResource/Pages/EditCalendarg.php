<?php

namespace App\Filament\Resources\CalendargResource\Pages;

use App\Filament\Resources\CalendargResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCalendarg extends EditRecord
{
    protected static string $resource = CalendargResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
