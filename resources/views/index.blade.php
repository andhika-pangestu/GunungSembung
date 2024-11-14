
@extends('layouts.app')

@section('title', 'Index') 

@section('content') 
    <x-hero>
        
    </x-hero>
    <x-about></x-about>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-7xl mx-auto p-6">
        <x-card-l 
            image="https://live.staticflickr.com/904/26963530927_2852239fbf_b.jpg" 
            title="Sewa Bus antar kota" 
            deskripsi="Menyediakan berbagai pilihan bus dengan berbagai macam kapasitas untuk perjalan dalam dan luar kota" 
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
            title="Wisata hingga Luar sumatra" 
            deskripsi="Menyediakan berbagai pilihan bus dengan berbagai macam kapasitas" 
        />
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
    </div>

    <x-carousell :slides="$slides"/>
    
    
    
    
      
      
      
@endsection
