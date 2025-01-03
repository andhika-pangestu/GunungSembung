<?php

// namespace App\Filament\Widgets;

// use Filament\Widgets\ChartWidget;
// use Illuminate\Support\Facades\DB;

// class BusChart extends ChartWidget
// {
//     protected static ?string $heading = 'Bus dipesan';
//     protected static ?string $description = 'Jumlah bus yang dipesan setiap bulan';

//     protected function getData(): array
//     {
//         // Fetch data from the database
//         $bookings = DB::table('booking')
//             ->select(
//                 DB::raw('YEAR(tgl_pemesanan) as year'),
//                 DB::raw('MONTH(tgl_pemesanan) as month'),
//                 DB::raw('TRIM(BOTH "[]" FROM pilihan_bus) as no_polisi'),
//                 DB::raw('COUNT(*) as count')
//             )
//             ->groupBy('year', 'month', 'no_polisi')
//             ->orderBy('year', 'asc')
//             ->orderBy('month', 'asc')
//             ->get();

//         // Split the police numbers and count each one separately
//         $expandedBookings = collect();
//         foreach ($bookings as $booking) {
//             $policeNumbers = explode(',', $booking->no_polisi);
//             foreach ($policeNumbers as $noPolisi) {
//                 $noPolisi = trim($noPolisi);
//                 $expandedBookings->push((object)[
//                     'year' => $booking->year,
//                     'month' => $booking->month,
//                     'no_polisi' => $noPolisi,
//                     'count' => $booking->count,
//                 ]);
//             }
//         }

//         // Format the data for the chart
//         $labels = $expandedBookings->map(function ($booking) {
//             return $booking->year . '-' . str_pad($booking->month, 2, '0', STR_PAD_LEFT);
//         })->unique()->values()->toArray();

//         $policeNumbers = $expandedBookings->pluck('no_polisi')->unique()->values()->toArray();

//         $datasets = [];
//         foreach ($policeNumbers as $noPolisi) {
//             $data = [];
//             foreach ($labels as $label) {
//                 $yearMonth = explode('-', $label);
//                 $year = $yearMonth[0];
//                 $month = $yearMonth[1];
//                 $count = $expandedBookings->filter(function ($booking) use ($year, $month, $noPolisi) {
//                     return $booking->year == $year && $booking->month == $month && $booking->no_polisi == $noPolisi;
//                 })->sum('count');
//                 $data[] = $count;
//             }
//             $datasets[] = [
//                 'label' => $noPolisi,
//                 'data' => $data,
//                 'borderColor' => 'rgba(75, 192, 192, 1)', // Use a single color
//                 'borderWidth' => 2,
//                 'fill' => false,
//             ];
//         }

//         return [
//             'labels' => $labels,
//             'datasets' => $datasets,
//         ];
//     }

//     protected function getType(): string
//     {
//         return 'bar'; // Specify the type of chart
//     }
// }