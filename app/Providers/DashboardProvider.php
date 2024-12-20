<?php

namespace App\Providers;

use App\Filament\Widgets\BookingCalendarWidget;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class DashboardProvider extends ServiceProvider
{
    public function register()
    {
        // Tidak perlu mendaftarkan DashboardServiceProvider jika tidak ada
    }

}