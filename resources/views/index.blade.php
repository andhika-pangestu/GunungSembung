@extends('layouts.app')

@section('title', 'PT Gunung Sembung Putra')

@section('content')
    <!-- Bagian lainnya di halaman -->
    <div id="home">
        <x-hero></x-hero>
    </div>

    <div id="about">
        <x-about></x-about>
    </div>

    <div id="services" class="a">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-7xl mx-auto p-6">
            <x-card-service 
                image="../images/4bus.jpg" 
                title="Sewa Bus antar kota" 
                deskripsi="Menyediakan berbagai pilihan bus dengan berbagai macam kapasitas untuk perjalanan dalam dan luar kota" 
            />
            <x-card-service 
                image="../images/FrontBus.jpg" 
                title="Bus Trip Wisata" 
                deskripsi="Pilihan yang tepat untuk anda yang ingin rental bus untuk keperluan Trip" 
            />
            <x-card-service 
            image="../images/busway.jpg" 
            title="Bus untuk Studi Tour" 
            deskripsi="Bus yang nyaman dan aman untuk perjalanan studi tour, dilengkapi fasilitas terbaik untuk pengalaman tak terlupakan." 
        />
            <x-card-service 
                 image="../images/LeftBus.jpg" 
                title="Wisata hingga Luar Pulau Jawa" 
                deskripsi="Menyediakan berbagai pilihan bus dengan berbagai macam kapasitas" 
            />
        </div>
    </div>

    <main id="bus" class="w-screen flex flex-col items-center justify-start mt-10">
        <x-bus-list></x-bus-list>
    </main>

    <div id="contact" class="fixed bottom-5 right-5 md:bottom-20 md:right-20 z-50 flex flex-col items-center space-y-3">
        <h1 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800 text-center relative">
            <span class="bg-gradient-to-r from-red-500 to-red-700 text-transparent bg-clip-text">
                Hubungi Kami
            </span>
        </h1>

        <a href="https://wa.me/6285189700998?text=Halo%2C%20Saya%20ingin%20bertanya%20mengenai%20pemesanan%20BUS%20di%20PT%20Gunung%20Sembung%20Putra" 
           target="_blank" 
           class="flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 bg-gradient-to-br from-green-400 to-green-500 border-4 border-white rounded-full shadow-2xl transition-transform transform hover:scale-125 hover:shadow-[0_0_20px_rgba(72,189,129,0.8)] hover:border-green-300">
            <img src="{{ asset('images/whatsapp.svg') }}" 
                 alt="WhatsApp" 
                 class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12">
        </a>
    </div>

    <div id="tour" class="w-screen bg-gray-50 flex flex-col items-center mt-10">
        <!-- Kontainer responsif -->
        <div class="container px-4 sm:px-6 md:px-8 lg:px-16 xl:px-20 mx-auto">
            <!-- Bagian Judul dan Link Lihat Semua -->
            <div class="flex flex-row justify-between items-center w-full">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">One Day Tour</h2>
                <a href="{{ route('tour-packages') }}" class="text-base font-medium text-gray-900 sm:text-base">
                    Lihat Semua
                </a>
            </div>
            
            <!-- Carousel -->
            <div class="w-full mt-8">
                <x-carousell :slides="$slides" />
            </div>
        </div>
    </div>

        <!-- JavaScript untuk scroll -->
        <script>
            function scrollToSection(sectionId) {
                const element = document.getElementById(sectionId);
                if (element) {
                    element.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }

    
            // Hamburger Menu Toggle
            const menuToggle = document.getElementById('menu-toggle');
            const menu = document.getElementById('menu');
    
            menuToggle.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        </script>

@endsection
