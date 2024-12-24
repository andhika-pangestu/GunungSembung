<?php

namespace App\Filament\Widgets;

use App\Models\Booking; 
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Illuminate\Support\Facades\DB;
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
         // Fetch booking data from the database
         $bookings = DB::table('booking') // Ensure the table name is correct (typically plural: 'bookings')
             ->select('id_booking', 'pilihan_bus', 'tgl_berangkat', 'tgl_kembali', 'nama_pemesan')
             ->get();
     
         // Format the booking data as events for FullCalendar
         $events = $bookings->map(function ($booking) {
             // Assuming 'pilihan_bus' is a comma-separated string like "1,2,3"
             $busNumbers = explode(',', trim($booking->pilihan_bus, '[]'));
     
             return array_map(function ($busNumber) use ($booking) {
                 return [
                     'id' => $booking->id_booking, // Use 'id_booking' instead of 'id'
                     'title' => trim($busNumber) . ' - ' . $booking->nama_pemesan,
                     'start' => $booking->tgl_berangkat,
                     'end' => $booking->tgl_kembali,
                     'extendedProps' => [ // Attach additional booking details if needed
                         'pilihan_bus' => trim($busNumber),
                         'nama_pemesan' => $booking->nama_pemesan,
                     ],
                 ];
             }, $busNumbers);
         })->flatten(1)->toArray();
     
         return $events;
     }
        /**
     * Provide data to the Blade view.
     *
     * @return array
     */

    protected function getViewData(): array
    {
        return [
            'heading' => static::$heading,
            'description' => static::$description,
            'events' => $this->fetchEvents([]),
        ];
    }

        /**
     * Define the Blade view path.
     *
     * @return string
     */

    protected static function getView(): string
    {
        return 'filament.widgets.calendar-widget';
    }

}