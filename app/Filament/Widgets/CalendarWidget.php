<?php

namespace App\Filament\Widgets;

use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    protected function getViewData(): array
    {
        return [
            'events' => [
                [
                    'id' => 1,
                    'title' => 'Event 1',
                    'start' => '2023-11-01',
                ],
                [
                    'id' => 2,
                    'title' => 'Event 2',
                    'start' => '2023-11-05',
                    'end' => '2023-11-07',
                ],
            ],
        ];
    }
}