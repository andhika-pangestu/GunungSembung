<?php

namespace App\Filament\Resources\CalendargResource\Pages;

use App\Filament\Resources\CalendargResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCalendargs extends ListRecords
{
    protected static string $resource = CalendargResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
