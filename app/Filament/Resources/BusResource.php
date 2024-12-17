<?php

namespace App\Filament\Resources;

use App\Models\Bus;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use App\Filament\Resources\BusResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BusResource\RelationManagers;
use Filament\Tables\Columns\IconColumn;

class BusResource extends Resource
{
    protected static ?string $model = Bus::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('no_polisi')->required()->maxLength(15),
                TextInput::make('jenis')->required(),
                TextInput::make('kapasitas')->required()->numeric(),
                Toggle::make('ketersediaan')->required(),
                TextInput::make('nama_supir')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('no_polisi')->sortable()->searchable(),
            TextColumn::make('jenis')->sortable()->searchable(),
            TextColumn::make('kapasitas')->sortable(),
            IconColumn::make('ketersediaan')
                ->boolean()
                ->sortable()
                ->label(fn($state) => $state ? 'Tersedia' : 'Tidak Tersedia'),
            TextColumn::make('nama_supir')->sortable()->searchable(),
        ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBuses::route('/'),
            'create' => Pages\CreateBus::route('/create'),
            'edit' => Pages\EditBus::route('/{record}/edit'),
        ];
    }
}
