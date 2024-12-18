@extends('layouts.app')

@section('title', 'All Tour Packages')

@section('content')
    <main class="w-screen bg-gray-50 flex flex-col items-center justify-start mt-10">
        <h2 class="text-3xl font-bold text-left m-5 mt-5 text-gray-900 sm:text-4xl w-full pl-20">Semua Paket Wisata</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 container mt-1">
            @foreach ($slides as $slide)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="{{ $slide['image'] }}" alt="{{ $slide['title'] }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $slide['title'] }}</h3>
                        <ul class="text-sm text-gray-600 mt-2">
                            @foreach ($slide['features'] as $feature)
                                <li>- {{ $feature }}</li>
                            @endforeach
                        </ul>
                        <div class="flex items-center space-x-4">
                            <span class="text-sm font-bold text-gray-800 mt-4">{{ $slide['price'] }}</span>
                        </div>
                        <a href="{{ $slide['button_link'] }}" target="_blank" class="bg-red-500 hover:bg-red-600 text-white text-sm font-semibold px-5 py-1 mt-4 rounded-lg flex items-center justify-center">
                            {{ $slide['button_text'] }} &nbsp;
                            <img src = "https://upload.wikimedia.org/wikipedia/commons/5/5e/WhatsApp_icon.png" alt = "WA" class="w-7 h-7 mr-2">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
