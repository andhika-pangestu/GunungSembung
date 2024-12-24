<!-- filepath: /c:/laragon/www/GunungSembung/resources/views/filament/widgets/calendar-widget.blade.php -->
<x-filament-widgets::widget>
    <x-filament::section>
        <div>
            <h2>{{ $heading }}</h2>
            <p>{{ $description }}</p>
            <div id="calendar"></div>
        </div>

        <!-- Modal for Displaying Booking Details -->
        @if(isset($record) && $record)
            <div
                x-data="{ open: {{ $record ? 'true' : 'false' }} }"
                x-show="open"
                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
                style="display: none;"
            >
                <div class="bg-white p-6 rounded shadow-lg w-1/3">
                    <h2 class="text-xl font-bold mb-4">Booking Details</h2>
                    <p><strong>ID:</strong> {{ $record->id_booking }}</p>
                    <p><strong>Bus Number:</strong> {{ $record->pilihan_bus }}</p>
                    <p><strong>Departure:</strong> {{ $record->tgl_berangkat }}</p>
                    <p><strong>Return:</strong> {{ $record->tgl_kembali }}</p>
                    <p><strong>Passenger Name:</strong> {{ $record->nama_pemesan }}</p>
                    <button @click="open = false" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Close</button>
                </div>
            </div>
        @endif

        <!-- Include FullCalendar CSS and JS from CDN -->
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: @json($events), // Inject events from PHP
                    editable: false, // Disable editing of events
                    selectable: false, // Disable date selection
                    eventStartEditable: false, // Disable dragging of events
                    eventDurationEditable: false, // Disable resizing of events
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    views: {
                        dayGridMonth: { buttonText: 'Month' },
                        timeGridWeek: { buttonText: 'Week' },
                        timeGridDay: { buttonText: 'Day' }
                    },
                    eventClick: function(info) {
                        // Prevent default behavior
                        info.jsEvent.preventDefault();

                        // Emit Livewire event to set the record
                        @this.set('record', info.event.id);
                    },
                });
                calendar.render();
            });
        </script>
    </x-filament::section>
</x-filament-widgets::widget>