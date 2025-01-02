<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Booking;
use Filament\Forms\Form;
use App\Models\Transaksi;
use Filament\Tables\Table;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Blade;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\DateFilter;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Actions\DeleteBulkAction;
use Saade\FilamentFullCalendar\Actions\EditAction;
use App\Filament\Resources\TransaksiResource\Pages;

use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\TransaksiResource\Pages\EditTransaksi;
use App\Filament\Resources\TransaksiResource\Pages\ListTransaksis;
use App\Filament\Resources\TransaksiResource\Pages\CreateTransaksi;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $navigationGroup = 'Pemesanan';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('id_booking')
                ->label('Booking')
                ->relationship('booking', 'id_booking', function ($query) {
                    return $query->select('id_booking', 'nama_pemesan')
                        ->orderBy('id_booking');
                })
                ->searchable()
                ->getSearchResultsUsing(function (string $search) {
                    return Booking::where('id_booking', 'like', "%{$search}%")
                        ->orWhere('nama_pemesan', 'like', "%{$search}%")
                        ->get()
                        ->mapWithKeys(function ($booking) {
                            $displayName = "{$booking->id_booking} - {$booking->nama_pemesan}";
                            return [$booking->id_booking => $displayName];
                        });
                })
                ->required()
                ->reactive()
                ->afterStateUpdated(function (callable $get, callable $set) {
                    $booking = Booking::find($get('id_booking'));
                    if ($booking) {
                        $totalBayarSebelumnya = $booking->transaksi->sum('jml_bayar');
                        $sisa = $booking->jml_tagihan - $totalBayarSebelumnya;
                        $set('sisa', $sisa);
                        $set('status', $sisa == 0 ? 'lunas' : 'dp');
                    }
                }),

            TextInput::make('jml_bayar')
                ->required()
                ->label('Jumlah Bayar')
                ->numeric()
                ->prefix('Rp')
                ->minValue(0)
                ->maxValue(function (callable $get) {
                    return $get('sisa');
                })
                ->currencyMask(thousandSeparator: '.', decimalSeparator: ',', precision: 0),

            TextInput::make('sisa')
                ->label('Sisa')
                ->currencyMask(thousandSeparator: '.', decimalSeparator: ',', precision: 0)
                ->disabled()
                ->prefix('Rp'),

            Textarea::make('keterangan_transaksi')
                ->label('Keterangan'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return
            $table
            ->defaultSort('id_booking', 'desc')
            ->columns([
                TextColumn::make('id_booking')
                    ->label('Booking ID')
                    ->sortable(),

                TextColumn::make('booking.nama_pemesan')
                    ->label('Nama Pemesan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('booking.alamat_penjemputan')
                    ->label('Alamat Penjemputan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('booking.tujuan')
                    ->label('Tujuan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('booking.tgl_pemesanan')
                    ->label('Tanggal Pemesanan')
                    ->sortable()
                    ->searchable()
                    ->dateTime('d F Y'),


                TextColumn::make('jml_bayar')
                    ->label('Jumlah Bayar')
                    ->sortable()
                    ->currency('IDR')
                    ->summarize(Sum::make()->currency('IDR')),

                TextColumn::make('sisa')
                    ->label('Sisa')
                    ->sortable()
                    ->searchable()
                    ->currency('IDR'),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->colors([
                        'danger' => 'pending',
                        'warning' => 'dp',
                        'success' => 'lunas',
                    ])
                    ->searchable(),
            ])
            ->filters([
                DateRangeFilter::make('booking.tgl_pemesanan')
                    ->label('Tanggal Pemesanan')
                    ->useRangeLabels()
                    ->modifyQueryUsing(function (Builder $query, $startDate, $endDate) {
                        if ($startDate && $endDate) {
                            $query->whereHas('booking', function (Builder $query) use ($startDate, $endDate) {
                                $query->whereBetween('tgl_pemesanan', [$startDate, $endDate]);
                            });
                        }
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('pdf')
                    ->label('Export to PDF')
                    ->color('success')
                    ->icon('heroicon-s-arrow-down-tray')
                    ->action(function (Transaksi $record) {
                        return response()->streamDownload(function () use ($record) {
                            echo Pdf::loadHtml(
                                Blade::render('pdf.transaksi', ['record' => $record])
                            )->stream();
                        }, $record->id_kuitansi . '-' . $record->booking->nama_pemesan . '-' . $record->booking->tgl_pemesanan . '.pdf');
                    }),
            ])

            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make()->label('Export to Excel'),

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
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }
}
