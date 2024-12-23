<?php
namespace App\Filament\Widgets;
use App\Models\Transaksi;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\DB;
class MonthlyPaymentWidget extends Widget
{
    protected static string $view = 'filament.widgets.monthly-payment-widget';

    public function getData(): array
    {
        // Mengambil total pembayaran per bulan
        $monthlyPayments = Transaksi::select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(jml_bayar) as total')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
         return [
            'monthlyPayments' => $monthlyPayments,
        ];
    }
}
