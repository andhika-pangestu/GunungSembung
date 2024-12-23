<?php

namespace App\Filament\Widgets;

use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class StatPendapatan extends BaseWidget
{
    protected function getStats(): array
    {
       // Get the current month and year
       $currentMonth = Carbon::now()->month;
       $currentYear = Carbon::now()->year;

       // Fetch the total amount from the transaksi table for the current month
       $totalPendapatan = DB::table('transaksi')
           ->whereMonth('created_at', $currentMonth)
           ->whereYear('created_at', $currentYear)
           ->sum('jml_bayar');

       // Format the amount for display
       $formattedPendapatan = 'Rp. ' . number_format($totalPendapatan, 0, ',', '.');

        // Get the current month and year
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        // Fetch the total number of buses ordered from the pilihan_bus column in the booking table for the current month
        $totalBusesOrdered = DB::table('booking')
        ->select(DB::raw('SUM(CHAR_LENGTH(pilihan_bus) - CHAR_LENGTH(REPLACE(pilihan_bus, ",", "")) + 1) as total_buses'))
            ->whereMonth('tgl_pemesanan', $currentMonth)
            ->whereYear('tgl_pemesanan', $currentYear)
            ->value('total_buses');

        // Format the total for display
        $formattedBusesOrdered = number_format($totalBusesOrdered, 0, ',', '.');
      


        // Fetch the most ordered bus for the current month
        $mostOrderedBus = DB::table('booking')
            ->select(DB::raw('TRIM(BOTH "[]" FROM pilihan_bus) as pilihan_bus'), DB::raw('COUNT(*) as count'))
            ->whereMonth('tgl_pemesanan', $currentMonth)
            ->whereYear('tgl_pemesanan', $currentYear)
            ->groupBy('pilihan_bus')
            ->orderBy('count', 'desc')
            ->first();

        $mostOrderedBusType = $mostOrderedBus ? $mostOrderedBus->pilihan_bus : 'N/A';


        return [
            Stat::make('Total Pemasukan', $formattedPendapatan)
            ->description('Total pemasukan bulan ini')
            ->descriptionIcon('heroicon-m-banknotes',IconPosition::Before)
            ->chart([1,5,9,1])
            ->color('success'),
            Stat::make('Bus Dipesan', $formattedBusesOrdered)
            ->description('Total bus yang dipesan bulan ini')
            ->descriptionIcon('heroicon-m-truck', IconPosition::Before)
            ->chart([1, 5, 9, 1])
            ->color('success'),
            Stat::make('Tipe Bus Terbanyak Dipesan', $mostOrderedBusType)
                ->description('Tipe bus yang paling banyak dipesan bulan ini')
                ->descriptionIcon('heroicon-m-fire', IconPosition::Before)
                ->chart([1, 5, 9, 1])
                ->color('success'),
        ];
    }
}
