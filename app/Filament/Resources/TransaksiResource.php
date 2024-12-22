<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Booking;
use App\Models\Transaksi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Http\Request;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\Action;
use App\Filament\Resources\TransaksiResource\Pages;
use App\Filament\Resources\TransaksiResource\Pages\EditTransaksi;
use App\Filament\Resources\TransaksiResource\Pages\ListTransaksis;
use App\Filament\Resources\TransaksiResource\Pages\CreateTransaksi;
use Filament\Notifications\Notification;
use Barryvdh\DomPDF\Facade\Pdf;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;


use Illuminate\Support\Facades\Blade;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                            return [$booking->id_booking => $booking->display_name];
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
                ->minValue(0)
                ->maxValue(function (callable $get) {
                    return $get('sisa');
                })
                ->currencyMask(thousandSeparator: '.', decimalSeparator: ',', precision: 0),

            TextInput::make('sisa')
                ->label('Sisa')
                ->currencyMask(thousandSeparator: '.', decimalSeparator: ',', precision: 0)
                ->disabled(),

            Textarea::make('keterangan_transaksi')
                ->label('Keterangan'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
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
                ->searchable(),

            TextColumn::make('jml_bayar')
                ->label('Jumlah Bayar')
                ->sortable()
                ->formatStateUsing(fn($state) => 'Rp. ' . number_format($state, 0, ',', '.')),

            TextColumn::make('sisa')
                ->label('Sisa')
                ->sortable()
                ->searchable()
                ->formatStateUsing(fn($state) => 'Rp. ' . number_format($state, 0, ',', '.')),

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
                        }, $record->id_kuitansi . '.pdf');
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
