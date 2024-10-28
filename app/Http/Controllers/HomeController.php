<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $slides = [
            [
                'image' => 'https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit19201280gsm/events/2021/12/08/9c6ae660-1799-4276-b81d-f8b0b85669d6-1638949473006-1e6c55a1b1edca6bf250012af2cc79e2.jpg',
                'title' => 'Paket Wisata Dufan 2024',
                'features' => [
                    'Transportasi Elf Ac Pariwisata',
                    'Tiket masuk Gerbang Ancol',
                    'Tiket terusan DUFAN',
                    'Tour Leader Service (Tentative)',
                    'Dan Lainnya'
                ],
                'price' => 'Starts from : IDR 363.000,-',
                'button_text' => 'Selengkapnya',
                'button_link' => '#'
            ],
            // Add more slides as needed
            [
                'image' => 'https://asset.kompas.com/crops/oYMCkVt6GrjFlHD0-ehMleF_wyw=/2x0:1000x665/750x500/data/photo/2022/07/02/62c071947729c.jpg',
                'title' => 'Paket Wisata Yogyakarta 2024',
                'features' => [
                    'Transportasi Elf Ac Pariwisata',
                    'Tiket masuk Candi Prambanan',
                    'Tiket masuk Candi Borobudur',
                    'Tour Leader Service (Tentative)',
                    'Dan Lainnya'
                ],
                'price' => 'Starts from : IDR 560.000,-',
                'button_text' => 'Selengkapnya',
                'button_link' => '#'
            ],
            [
                'image' => 'https://busdiscovery.id/wp-content/uploads/2020/11/8-Rekomendasi-Tempat-Wisata-Pangandaran-Yang-Eksotis-1.jpg',
                'title' => 'Pangandaran Tour 2024',
                'features' => [
                    'Transportasi Bus AC Pariwisata',
                    'Tiket masuk Pantai Pangandaran',
                    'Tiket masuk Green Canyon',
                    'Tiket masuk Pantai Batuhiu',
                    'Tour Leader Service (Tentative)',
                    'Dan Lainnya'
                ],
                'price' => 'Starts from : IDR 499.000,-',
                'button_text' => 'Selengkapnyaa',
                'button_link' => '#'
            ]

        ];
    
        return view('index', compact('slides'));
    }
    
}
