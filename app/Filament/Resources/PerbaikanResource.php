<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Perbaikan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\Summarizers\Sum;

use App\Filament\Resources\PerbaikanResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class PerbaikanResource extends Resource
{
    protected static ?string $model = Perbaikan::class;
    protected static ?string $navigationGroup = 'Transportasi';
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('no_polisi')
                    ->label('Bus')
                    ->relationship('bus', 'no_polisi')
                    ->required(),
                TextInput::make('tipe_perbaikan')
                    ->label('Tipe Perbaikan')
                    ->required(),
                TextInput::make('nama_suku_cadang')
                    ->label('Nama Suku Cadang')
                    ->required(),
                DatePicker::make('tgl_perbaikan')
                    ->label('Tanggal Perbaikan')
                    ->required(),
                    TextInput::make('harga_perbaikan')
                    ->label('harga_perbaikan')
                    ->currencyMask(thousandSeparator: '.', decimalSeparator: ',', precision: 0)
                    ->prefix('Rp'),
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table

        ->columns([
            TextColumn::make('bus.no_polisi')
                ->label('Nomor Polisi')
                ->sortable()
                ->searchable(),
            TextColumn::make('tipe_perbaikan')
                ->label('Tipe Perbaikan')
                ->sortable()
                ->searchable(),
            TextColumn::make('nama_suku_cadang')
                ->label('Nama Suku Cadang')
                ->sortable()
                ->searchable(),
            TextColumn::make('tgl_perbaikan')
                ->label('Tanggal Perbaikan')
                ->sortable()
                ->searchable(),
            MoneyColumn::make('harga_perbaikan')
                ->label('Harga Perbaikan')
                ->currency('IDR') // Set your currency here
                ->locale('id_ID') // Set your locale here
                ->sortable()
                ->searchable(),
        ])
        ->filters([
            Filter::make('tgl_perbaikan')
                ->form([
                    DatePicker::make('start_date')
                        ->label('Start Date')
                        ->placeholder('Select start date'),
                    DatePicker::make('end_date')
                        ->label('End Date')
                        ->placeholder('Select end date'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when($data['start_date'], fn ($query, $date) => $query->whereDate('tgl_perbaikan', '>=', $date))
                        ->when($data['end_date'], fn ($query, $date) => $query->whereDate('tgl_perbaikan', '<=', $date));
                }),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])

            ])
            ->filters([
                Filter::make('tgl_perbaikan')
                    ->form([
                        DatePicker::make('start_date')
                            ->label('Start Date')
                            ->placeholder('Select start date'),
                        DatePicker::make('end_date')
                            ->label('End Date')
                            ->placeholder('Select end date'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['start_date'], fn ($query, $date) => $query->whereDate('tgl_perbaikan', '>=', $date))
                            ->when($data['end_date'], fn ($query, $date) => $query->whereDate('tgl_perbaikan', '<=', $date));
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPerbaikans::route('/'),
            'create' => Pages\CreatePerbaikan::route('/create'),
            'edit' => Pages\EditPerbaikan::route('/{record}/edit'),
        ];
    }
}