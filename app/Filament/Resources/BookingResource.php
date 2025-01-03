<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Booking;
use Filament\Resources\Form;
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
use Filament\Tables\Columns\BadgeColumn;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\BookingResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Blade;
use Barryvdh\DomPDF\Facade\Pdf;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;
use App\Models\Transaksi;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationGroup = 'Pemesanan';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([

                DatePicker::make('tgl_pemesanan')
                    ->required(),
                    
                TextInput::make('nama_pemesan')
                    ->required(),
                DatePicker::make('tgl_berangkat')
                    ->required(),
              DatePicker::make('tgl_kembali')
                    ->required()
                    ->afterOrEqual('tgl_berangkat')
                    ->helperText('Tanggal kembali harus lebih dari tanggal keberangkatan.'),
              
                TimePicker::make('jam_berangkat')
                    ->required(),

                 MultiSelect::make('pilihan_bus')
                    ->required()
                    ->options(function ($get, $record) {
                        $tgl_berangkat = $get('tgl_berangkat');
                        $tgl_kembali = $get('tgl_kembali');

                        if (!$tgl_berangkat || !$tgl_kembali) {
                            return [];
                        }

                        $query = \App\Models\Bus::whereDoesntHave('jadwal', function ($query) use ($tgl_berangkat, $tgl_kembali, $record) {
                            $query->where(function ($query) use ($tgl_berangkat, $tgl_kembali) {
                                $query->whereBetween('tgl_berangkat', [$tgl_berangkat, $tgl_kembali])
                                      ->orWhereBetween('tgl_kembali', [$tgl_berangkat, $tgl_kembali])
                                      ->orWhere(function ($query) use ($tgl_berangkat, $tgl_kembali) {
                                          $query->where('tgl_berangkat', '<=', $tgl_berangkat)
                                                ->where('tgl_kembali', '>=', $tgl_kembali);
                                      });
                            });

                            if ($record) {
                                $query->where('id_booking', '!=', $record->id_booking);
                            }
                        });

                        if ($record && is_array($record->pilihan_bus)) {
                            $query->orWhereIn('no_polisi', $record->pilihan_bus);
                        }

                        return $query->get()->mapWithKeys(function ($bus) {
                            return [$bus->no_polisi => "{$bus->jenis} - {$bus->no_polisi}"];
                        });
                    }),

                TextInput::make('alamat_penjemputan')
                    ->required(),

                TextInput::make('tujuan')
                    ->required(),

                TextInput::make('jml_tagihan')
                    ->required()
                    ->label('Jumlah Tagihan')
                    ->numeric()
                    ->prefix('Rp')
                    ->currencyMask(thousandSeparator: '.', decimalSeparator: ',', precision: 0),
                  Textarea::make('keterangan')
                    ->nullable()
                    ->maxLength(255),

            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id_booking', 'desc')
            ->columns([
                TextColumn::make('id_booking')
                    ->searchable()
                    ->label('Id Booking')
                    ->sortable(),
                
               TextColumn::make('nama_pemesan')
                    ->searchable()
                    ->label('Nama Pemesan'),
               
               TextColumn::make('tgl_pemesanan')
                    ->sortable()
                    ->label('Tanggal Pemesanan')
                    ->dateTime('d F Y'),

                TextColumn::make('tujuan')
                    ->searchable()
                    ->label('Tujuan')
                    ->limit(100)
                    ->wrap(),

               TextColumn::make('pilihan_bus')
                    ->searchable()
                    ->label('Pilihan Bus')
                    ->limit(100)
                    ->wrap(),
                
                TextColumn::make('tgl_berangkat')
                    ->sortable()
                    ->label('Tanggal Berangkat')
                    ->dateTime('d F Y'),

               TextColumn::make('jam_berangkat')
                    ->sortable()
                    ->label('Jam Berangkat'),
               
               TextColumn::make('alamat_penjemputan')
                    ->searchable()
                    ->label('Alamat Penjemputan')
                    ->limit(50)
                    ->wrap(),
               
                TextColumn::make('tgl_kembali')
                    ->sortable()
                    ->label('Tanggal Kembali')
                    ->dateTime('d F Y')
                    ->toggleable(isToggledHiddenByDefault: true),

               TextColumn::make('jml_tagihan')
                   ->sortable()
                   ->label('Jumlah Tagihan')
                   ->currency('IDR')
                   ->formatStateUsing(fn($state) => 'Rp. ' . number_format($state, 0, ',', '.')),

               TextColumn::make('keterangan')
                    ->label('Keterangan')
                    ->limit(100)
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: true),                  
               
               BadgeColumn::make('status')
                   ->label('Status Pemesanan')
                   ->sortable()
                   ->searchable()
                   ->colors([
                       'danger' => 'pending',
                       'warning' => 'dp',
                       'success' => 'lunas',
                   ]),

               TextColumn::make('ongkos_bus')
                   ->sortable()
                   ->label('Ongkos Bus')
                   ->currency('IDR')
                   ->formatStateUsing(fn($state) => 'Rp. ' . number_format($state, 0, ',', '.'))
                ->toggleable(isToggledHiddenByDefault: true),
           ])
           ->filters([
               Tables\Filters\Filter::make('status')
                   ->label('Status')
                   ->query(fn (Builder $query): Builder => $query->where('status', 'pending'))
                   ->toggle(),
               Tables\Filters\Filter::make('nama_pemesan')
                   ->label('Nama Pemesan')
                   ->query(fn (Builder $query): Builder => $query->where('nama_pemesan', 'like', '%'.request('search').'%'))
                   ->toggle(),
                   DateRangeFilter::make('tgl_berangkat')
                   ->label('Tanggal Berangkat')
                   ->useRangeLabels()
                   ->modifyQueryUsing(function (Builder $query, $startDate, $endDate) {
                       if ($startDate && $endDate) {
                           $query->whereBetween('tgl_pemesanan', [$startDate, $endDate]);
                       }
                   }),
            DateRangeFilter::make('tgl_pemesanan')
                   ->label('Tanggal Pemesanan')
                   ->useRangeLabels()
                   ->modifyQueryUsing(function (Builder $query, $startDate, $endDate) {
                       if ($startDate && $endDate) {
                           $query->whereBetween('tgl_pemesanan', [$startDate, $endDate]);
                       }
                   })
               
           ])
           ->actions([
            Tables\Actions\EditAction::make(),
               Tables\Actions\DeleteAction::make(),
           ])
           ->bulkActions([
               Tables\Actions\DeleteBulkAction::make(),
               ExportBulkAction::make()->label('Export to Excel'),
           ]);

    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
            'view' => Pages\ViewBooking::route('/{record}'),
        ];
    }
}