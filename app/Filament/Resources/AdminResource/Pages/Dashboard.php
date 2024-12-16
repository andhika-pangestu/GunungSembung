<?php
namespace App\Filament\Resources\AdminResource\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\StatsOverviewWidget;
use App\Filament\Widgets\CustomStatsWidget; // Widget custom
use Filament\Widgets\ChartWidget;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            StatsOverviewWidget::class, // Widget bawaan Filament
            CustomStatsWidget::class,   // Widget custom Anda
        ];
    }
}

