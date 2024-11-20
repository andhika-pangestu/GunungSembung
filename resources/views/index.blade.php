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
                deskripsi="Pilihan yang tepat untuk anda yang ingin rental bus untuk keperluan Trip " 
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

    <main class="w-screen bg-yellow-50 flex flex-col items-center justify-start mt-10">
        <h2 class="text-3xl font-bold text-left m-5 mt-5 text-gray-900 sm:text-4xl w-full pl-20">Temukan destinasi Favoritmu</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 container mt-1 pl-10">
            <x-card 
                image="https://images.pexels.com/photos/6157052/pexels-photo-6157052.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" 
                title="Pineapple" 
                location="Lorem ipsum" 
            />
            <x-card 
                image="https://images.pexels.com/photos/5966630/pexels-photo-5966630.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" 
                title="Banana" 
                location="Lorem ipsum" 
            />
            <x-card 
                image="https://images.pexels.com/photos/5217960/pexels-photo-5217960.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" 
                title="Mango" 
                location="Jawa timur" 
            />
            <x-card 
                image="https://images.pexels.com/photos/14277667/pexels-photo-14277667.jpeg?" 
                title="Bromo" 
                location="Jawa Timur" 
            />
        </div>
    </main>
    <div class="fixed bottom-5 right-5 md:bottom-20 md:right-20 z-50">
        <a href="https://wa.me/123456789" 
           target="_blank" 
           class="flex items-center justify-center w-12 h-12 md:w-16 md:h-16 bg-green-500 rounded-full shadow-lg hover:bg-green-600 transition-transform transform hover:scale-110">
            <img src="{{ asset('images/whatsapp.svg') }}" 
                 alt="WhatsApp" 
                 class="w-6 h-6 md:w-8 md:h-8">
        </a>
    </div>    

    <div class="w-screen bg-gray-50 flex flex-col items-center mt-10">
        <div class="flex flex-row justify-between items-center w-full px-20">
            <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">One Day Tour</h2>
            <a href="{{ route('tour-packages') }}" class="text-base font-medium text-gray-900 sm:text-base">Lihat Semua</a>
        </div>
        <div class="w-5/6 mt-8">
            <x-carousell :slides="$slides"/>
        </div>
    </div>
    
  
@endsection
