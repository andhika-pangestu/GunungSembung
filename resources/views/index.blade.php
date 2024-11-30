@extends('layouts.app')

@section('title', 'Index')

@section('content')
    <x-hero></x-hero>
    <x-about id="about"></x-about>

    <div class="a">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-7xl mx-auto p-6">
            <x-card-l 
                image="https://live.staticflickr.com/904/26963530927_2852239fbf_b.jpg" 
                title="Sewa Bus antar kota" 
                deskripsi="Menyediakan berbagai pilihan bus dengan berbagai macam kapasitas untuk perjalanan dalam dan luar kota" 
            />
            <x-card-l 
                image="https://images.unsplash.com/photo-1526494631344-8c6fa6462b17?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                title="Bus Trip Wisata" 
                deskripsi="Pilihan yang tepat untuk anda yang ingin rental bus untuk keperluan Trip" 
            />
            <x-card-l 
                image="https://images.unsplash.com/photo-1526494631344-8c6fa6462b17?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                title="Bus untuk Ziarah" 
                deskripsi="Untuk anda yang akan melakukan perjalan ziarah ke tempat tempat sakral" 
            />
            <x-card-l 
                image="https://images.unsplash.com/photo-1526494631344-8c6fa6462b17?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                title="Wisata hingga Luar Pulau Jawa" 
                deskripsi="Menyediakan berbagai pilihan bus dengan berbagai macam kapasitas" 
            />
        </div>
    </div>

    <main class="w-screen flex flex-col items-center justify-start mt-10">
        <x-bus-list></x-bus-list>
    </main>

    <div class="w-screen bg-gray-50 flex flex-col items-center mt-10">
        <div class="flex flex-row justify-between items-center w-full px-20">
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">One Day Tour</h2>
            <a href="{{ route('tour-packages') }}" class="text-base font-medium text-gray-900 sm:text-base">Lihat Semua</a>
        </div>
        <div class="w-5/6 mt-8">
            <x-carousell :slides="$slides" />
        </div>
    </div>

    <div class="fixed bottom-5 right-5 md:bottom-20 md:right-20 z-50 flex items-center space-x-3">
        <!-- Judul -->
        <h1 class="text-lg md:text-xl font-bold text-gray-800 text-left">Hubungi Kami</h1>
    
        <!-- Tombol WhatsApp -->
        <a href="https://wa.me/123456789" 
           target="_blank" 
           class="flex items-center justify-center w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-green-400 to-green-500 border-4 border-white rounded-full shadow-2xl transition-transform transform hover:scale-125 hover:shadow-[0_0_20px_rgba(72,189,129,0.8)] hover:border-green-300">
            <img src="{{ asset('images/whatsapp.svg') }}" 
                 alt="WhatsApp" 
                 class="w-8 h-8 md:w-10 md:h-10">
        </a>
    </div>
    
    
@endsection
