<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BookingChart extends ChartWidget
{
    protected static ?string $heading = 'Data Pemesanan';
    protected static ?string $description = 'Data 12 bulan terakhir';
    protected static ?int $sort = 2;
    protected function getData(): array
    {
        // Fetch data from the database
        $bookings = DB::table('booking')
            ->select(
                DB::raw('YEAR(tgl_pemesanan) as year'),
                DB::raw('MONTH(tgl_pemesanan) as month'),
                DB::raw('count(*) as count')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->limit(12) // Limit to the last 12 months
            ->get();

        // Format the data for the chart
        $labels = $bookings->map(function ($booking) {
            return $booking->year . '-' . str_pad($booking->month, 2, '0', STR_PAD_LEFT);
        })->toArray();

        $data = $bookings->pluck('count')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'type' => 'line',
                    'label' => 'Bookings Line',
                    'data' => $data,
                    'borderColor' => 'rgba(27, 222, 206, 0.8)',
                    'borderWidth' => 2,
                    'fill' => false,
                ],
                [
                    'type' => 'bar',
                    'label' => 'Bookings Bar',
                    'data' => $data,
                    'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                    'borderColor' => 'rgba(153, 102, 255, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
