<?php

namespace App\Filament\Widgets;

use App\Models\Booking; 
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Filament\Resources\BookingResource;
use Illuminate\Database\Eloquent\Model;

class CalendarWidget extends FullCalendarWidget
{
    /**
     * FullCalendar will call this function whenever it needs new event data.
     * This is triggered when the user clicks prev/next or switches views on the calendar.
     */
    protected static ?int $sort = 1;
    protected static ?string $heading = 'Bus Availability Calendar';
    protected static ?string $description = 'This calendar shows the availability of buses based on bookings.';
    public Model|string|int|null $record = Booking::class;

    public function mount(): void
{
    $this->record = Booking::first(); // Assign the first Booking record or null
}

    /**
     * Fetch events for FullCalendar.
     *
     * @param array $fetchInfo
     * @return array
     */

     public function fetchEvents(array $fetchInfo): array
     {
         // Log the incoming fetchInfo
         Log::info('fetchEvents called with fetchInfo:', $fetchInfo);
     
         // Validate required keys ('start' and 'end')
         if (!isset($fetchInfo['start']) || !isset($fetchInfo['end'])) {
             Log::warning('Missing start or end in fetchInfo');
     
             // Optionally, set default dates for testing
             $fetchInfo = [
                 'start' => '2023-01-01',
                 'end' => '2023-12-31',
             ];
         }
     
         // Map 'start' and 'end' to 'tgl_berangkat' and 'tgl_kembali'
         $tgl_berangkat = $fetchInfo['start'];
         $tgl_kembali = $fetchInfo['end'];
     
         // Fetch booking data using Eloquent ORM
         try {
             $bookings = Booking::select('id_booking', 'pilihan_bus', 'tgl_berangkat', 'tgl_kembali', 'nama_pemesan')
                 ->where('tgl_berangkat', '>=', $tgl_berangkat)
                 ->where('tgl_kembali', '<=', $tgl_kembali)
                 ->get();
     
             // Log the retrieved bookings
             Log::info('Bookings fetched:', $bookings->toArray());
         } catch (\Exception $e) {
             Log::error('Error fetching bookings: ' . $e->getMessage());
             return [];
         }
     
         // Format the booking data as events for FullCalendar
         try {
             $events = $bookings->map(function (Booking $booking) {
                 // Ensure 'pilihan_bus' is a comma-separated string
                 $busNumbers = explode(',', trim($booking->pilihan_bus, '[]'));
     
                 return array_map(function ($busNumber) use ($booking) {
                     return [
                         'id' => $booking->id_booking, 
                         'title' => trim($busNumber) . ' - ' . $booking->nama_pemesan,
                         'start' => $booking->tgl_berangkat,
                         'end' => $booking->tgl_kembali,
                         'url' => BookingResource::getUrl('view', ['record' => $booking]),
                         'extendedProps' => [
                             'pilihan_bus' => trim($busNumber),
                             'nama_pemesan' => $booking->nama_pemesan,
                         ],
                     ];
                 }, $busNumbers);
             })->flatten(1)->toArray();
     
             // Log the formatted events
             Log::info('Formatted events:', $events);
     
             return $events;
         } catch (\Exception $e) {
             Log::error('Error formatting events: ' . $e->getMessage());
             return [];
         }
     }

    protected function getViewData(): array
    {
        return [
            'heading' => static::$heading,
            'description' => static::$description,
            'events' => $this->fetchEvents([]),
        ];
    }

    protected static function getView(): string
    {
        return 'filament.widgets.calendar-widget';
    }

}