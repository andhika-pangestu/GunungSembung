<?php

namespace App\Providers;

use App\Filament\Widgets\BookingCalendarWidget;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use App\Filament\Widgets\CalendarWidget;
use Filament\Widgets\Widget;
use Saade\FilamentFullCalendar\FilamentFullCalendarServiceProvider;

class DashboardProvider extends ServiceProvider
{
    public function register()
    {
        // Tidak perlu mendaftarkan DashboardServiceProvider jika tidak ada
        $this->app->register(FilamentFullCalendarServiceProvider::class);
    }
    public function boot(): void
    {
        // Register the widgets
        // Widget::register([
        //     CalendarWidget::class,
        // ]);
    }

}