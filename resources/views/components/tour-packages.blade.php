@extends('layouts.app')

@section('title', 'All Tour Packages')

@section('content')
    <main class="w-screen bg-gray-50 flex flex-col items-center justify-start mt-0">
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
                        <p class="text-sm font-bold text-gray-800 mt-4">{{ $slide['price'] }}</p>
                        <a href="{{ $slide['button_link'] }}" class="mt-2 inline-block text-blue-500 font-medium hover:underline">
                            {{ $slide['button_text'] }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
