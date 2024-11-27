
@extends('layouts.app')

@section('title', 'Index') 

@section('content') 
    <x-hero>
        
    </x-hero>
    <x-about></x-about>
    <div class="grid grid-cols-2 items-center container mx-auto gap-4">
        <x-card-l 
            image="https://images.unsplash.com/photo-1526494631344-8c6fa6462b17?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
            title="Wisata Keliling Jawa" 
        />
        <x-card-l 
        image="https://images.unsplash.com/photo-1526494631344-8c6fa6462b17?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
        title="Jelajah Bali" 
        />
        <x-card-l 
            image="https://images.unsplash.com/photo-1526494631344-8c6fa6462b17?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
            title="Wisata Keliling Jawa" 
        />
        <x-card-l 
        image="https://images.unsplash.com/photo-1526494631344-8c6fa6462b17?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
        title="Jelajah Bali" 
        />

    </div>
    <main class="w-screen flex flex-col items-center justify-start mt-10">
      <x-bus-list></x-bus-list>
    </div>

    <x-carousell></x-carousell>
    
    
    
      
      
      
@endsection
