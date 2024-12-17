<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Booking;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MultiSelect;
use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard';
    protected static ?string $navigationGroup = 'Transport';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            DatePicker::make('tgl_pemesanan')->required(),
            MultiSelect::make('pilihan_bus')
                ->required()
                ->options(function () {
                    return \App\Models\Bus::pluck('jenis', 'no_polisi')->toArray();
                })
                ->label('Pilih Bus')
                ->reactive(),
            TextInput::make('alamat_penjemputan')->required(),
            TextInput::make('tujuan')->required(),
            TextInput::make('nama_pemesan')->required(),
            TextInput::make('jml_tagihan')->required()->numeric(),
            Textarea::make('keterangan')->nullable(),
            DatePicker::make('tgl_berangkat')->required(),
            TimePicker::make('jam_berangkat')->required(),
            DatePicker::make('tgl_kembali')->nullable(),
        ]);
}



public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('tgl_pemesanan')->sortable(),
            TextColumn::make('alamat_penjemputan')->searchable(),
            TextColumn::make('tujuan')->searchable(),
            TextColumn::make('nama_pemesan')->searchable(),
            TextColumn::make('jml_tagihan')->sortable(),
            TextColumn::make('id_booking')->sortable()->label('Booking ID'),
            TextColumn::make('status')->sortable()->label('Status Pemesanan')->searchable(),
            // Add ongkos_bus column to display the calculated fare
            TextColumn::make('ongkos_bus')->sortable()->label('Ongkos Bus'),
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
