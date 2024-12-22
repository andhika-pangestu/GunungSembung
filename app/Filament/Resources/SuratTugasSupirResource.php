<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\SuratTugasSupir;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Actions\Action;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Blade;
use App\Filament\Resources\SuratTugasSupirResource\Pages;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class SuratTugasSupirResource extends Resource
{
    protected static ?string $model = SuratTugasSupir::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Pemesanan';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('id_booking')
               ->label('Booking')
               ->relationship('booking', 'id_booking', function ($query) {
                   return $query->select('id_booking', 'nama_pemesan')
                                ->orderBy('id_booking', 'asc') // Specify 'asc' or 'desc'
                                ->orderBy('nama_pemesan', 'asc'); // Specify 'asc' or 'desc'
               })
                ->searchable()
                ->required()
                ->reactive()
                ->afterStateUpdated(function (callable $set, $state) {
                    $booking = \App\Models\Booking::find($state);
                    if ($booking) {
                        $set('nama_pemesan', $booking->nama_pemesan);
                        $set('alamat_penjemputan', $booking->alamat_penjemputan);
                        $set('tujuan', $booking->tujuan);
                        $set('tgl_berangkat', $booking->tgl_berangkat);
                        $set('jam_berangkat', $booking->jam_berangkat);
                        $set('no_polisi', $booking->pilihan_bus);
                        $set('tgl_kembali', $booking->tgl_kembali);
                    }
                }),
    
            Select::make('no_polisi')
                ->label('Bus')
                ->relationship('bus', 'no_polisi')
                ->reactive()
                ->afterStateUpdated(function (callable $set, $state) {
                    $bus = \App\Models\Bus::find($state);
                    if ($bus) {
                        $set('nama_supir', $bus->nama_supir);
                    }
                })
                ->required(),
    
            TextInput::make('nama_supir')->required(),
            DatePicker::make('tgl_berangkat')->required(),
            TimePicker::make('jam_berangkat')->required(),
            DatePicker::make('tgl_kembali')->required(),
            TextInput::make('nama_pemesan')->required(),
            TextInput::make('alamat_penjemputan')->required(),
            TextInput::make('tujuan')->required(),
            Forms\Components\TextInput::make('kas_komisi')
                ->label('Kas Komisi')
                ->required()
                ->numeric()
                ->prefix('Rp')
                ->currencyMask(thousandSeparator: ',', decimalSeparator: '.', precision: 2),
            TextInput::make('nama_admin')->required(),
            DatePicker::make('tgl_st')->label('Tanggal Surat')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id_booking')->label('Booking ID')->sortable(),
            TextColumn::make('nama_supir')->sortable()->searchable(),
            TextColumn::make('no_polisi')->sortable()->searchable(),
            TextColumn::make('tgl_berangkat')
                ->sortable()
                ->dateTime('d m y'),
            TextColumn::make('jam_berangkat')->sortable(),
            TextColumn::make('nama_pemesan')->sortable()->searchable(),
            TextColumn::make('alamat_penjemputan')->sortable()->searchable(),
            TextColumn::make('tujuan')->sortable()->searchable(),
            TextColumn::make('kas_komisi')
                ->label('Kas Komisi')
                ->sortable()
                ->currency('IDR'),
            TextColumn::make('nama_admin')->sortable()->searchable(),
            TextColumn::make('tgl_st')
                ->sortable()
                ->dateTime('d m y'),
        ])
        ->filters([
            SelectFilter::make('no_polisi')
                ->label('Nomor Polisi')
                ->options(\App\Models\Bus::all()->pluck('no_polisi', 'no_polisi')->toArray()),
            SelectFilter::make('nama_supir')
                ->label('Nama Supir')
                ->options(\App\Models\Bus::all()->pluck('nama_supir', 'nama_supir')->toArray()),
            Filter::make('tgl_berangkat')
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
                        ->when($data['start_date'], fn ($query, $date) => $query->whereDate('tgl_berangkat', '>=', $date))
                        ->when($data['end_date'], fn ($query, $date) => $query->whereDate('tgl_berangkat', '<=', $date));
                }),
            SelectFilter::make('nama_pemesan')
                ->label('Nama Pemesan')
                ->options(\App\Models\Booking::all()->pluck('nama_pemesan', 'nama_pemesan')->toArray()),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Action::make('pdf')
                ->label('Export to PDF')
                ->color('success')
                ->icon('heroicon-s-arrow-down-tray')
                ->action(function (SuratTugasSupir $record) {
                    return response()->streamDownload(function () use ($record) {
                        echo Pdf::loadHtml(
                            Blade::render('pdf.surat_tugas_supir', ['record' => $record])
                        )->stream();
                    }, $record->id_kuitansi . ' - ' . $record->nama_supir  . ' - ' . $record->tgl_st . '.pdf');
                }),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSuratTugasSupirs::route('/'),
            'create' => Pages\CreateSuratTugasSupir::route('/create'),
            'edit' => Pages\EditSuratTugasSupir::route('/{record}/edit'),
        ];
    }
}
