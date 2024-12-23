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
use Filament\Tables\Columns\BadgeColumn;
use App\Filament\Resources\BookingResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Blade;
use Barryvdh\DomPDF\Facade\Pdf;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;
 
use App\Models\Transaksi;



class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationGroup = 'Pemesanan';

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
                TextInput::make('jml_tagihan')
                    ->required()
                    ->label('Jumlah Tagihan')
                    ->numeric()
                    ->prefix('Rp')
                    ->currencyMask(thousandSeparator: '.', decimalSeparator: ',', precision: 0),
                Textarea::make('keterangan')->nullable(),
                DatePicker::make('tgl_berangkat')->required(),
                TimePicker::make('jam_berangkat')->required(),
                DatePicker::make('tgl_kembali')->nullable(),
            ]);
    }


    public static function table(Table $table): Table
    {      return $table
           ->defaultSort('id_booking', 'desc')
           ->columns([
            TextColumn::make('id_booking')
            ->searchable()
            ->label('Id Booking')
            ->sortable(),
               TextColumn::make('nama_pemesan')->searchable()->label('Nama Pemesan'),
               TextColumn::make('tgl_pemesanan')->sortable()->label('Tanggal Pemesanan') ->dateTime('d F Y'),
               TextColumn::make('pilihan_bus')->searchable()->label('Pilihan Bus'),
               TextColumn::make('alamat_penjemputan')->searchable()->label('Alamat Penjemputan'),
               TextColumn::make('tujuan')->searchable()->label('Tujuan'),
               TextColumn::make('jml_tagihan')
                   ->sortable()
                   ->label('Jumlah Tagihan')
                   ->currency('IDR'),
               TextColumn::make('keterangan')->label('Keterangan'),
               TextColumn::make('tgl_berangkat')->sortable()->label('Tanggal Berangkat')  ->dateTime('d F Y'),
               TextColumn::make('jam_berangkat')->sortable()->label('Jam Berangkat'),
               TextColumn::make('tgl_kembali')->sortable()->label('Tanggal Kembali')  ->dateTime('d F Y'),
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
                   ->currency('IDR'),
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
        ];
    }
}
