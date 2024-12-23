<?php
namespace App\Filament\Widgets;

use App\Models\Bus;
use Filament\Widgets\BarChartWidget;

class BusChart extends BarChartWidget
{
    protected static ?string $heading = 'Data Kapasitas Bus';

    protected function getData(): array
    {
        // Ambil data dari tabel buses
        $buses = Bus::select('jenis', 'kapasitas')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Kapasitas Bus',
                    'data' => $buses->pluck('kapasitas')->toArray(), // Kapasitas setiap bus
                    'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                ],
            ],
            'labels' => $buses->pluck('jenis')->toArray(), // Label setiap bus (jenis)
        ];
    }
}
