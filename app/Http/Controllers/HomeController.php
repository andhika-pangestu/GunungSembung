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
                [
                    'image' => 'https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit19201280gsm/events/2024/08/13/0690e857-3357-4cf3-b5b5-eba744f6a784-1723534166661-a4d73af005989d6f43f3863990e8db2c.jpg',
                    'title' => 'Paket Wisata Dufan 2024',
                    'features' => [
                        'Transportasi Elf Ac Pariwisata',
                        'Tiket masuk Gerbang Ancol',
                        'Tiket terusan DUFAN',
                        'Tour Leader Service (Tentative)',
                        'Dan Lainnya'
                    ],
                    'price' => 'Starts from : IDR 363.000,-',
                    'button_text' => 'Selengkapnya: ',
                    'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Dufan%202024.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
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
                'button_text' => 'Selengkapnya: ',
                'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Dufan%202024.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
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
                'button_text' => 'Selengkapnya: ',
                'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Dufan%202024.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
                ]

        ];
    
        return view('index', compact('slides'));
    }
     }

public function allTourPackages()
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
                'Dan Lainnya',
            ],
            'price' => 'Starts from : IDR 363.000,-',
            'button_text' => 'Selengkapnya',
            'button_link' => '#',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Dufan%202024.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
        [
            'image' => 'https://asset.kompas.com/crops/oYMCkVt6GrjFlHD0-ehMleF_wyw=/2x0:1000x665/750x500/data/photo/2022/07/02/62c071947729c.jpg',
            'title' => 'Paket Wisata Yogyakarta 2024',
            'features' => [
                'Transportasi Elf Ac Pariwisata',
                'Tiket masuk Candi Prambanan',
                'Tiket masuk Candi Borobudur',
                'Tour Leader Service (Tentative)',
                'Dan Lainnya',
            ],
            'price' => 'Starts from : IDR 560.000,-',
            'button_text' => 'Selengkapnya',
            'button_link' => '#',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Dufan%202024.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
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
                'Dan Lainnya',
            ],
            'price' => 'Starts from : IDR 499.000,-',
            'button_text' => 'Selengkapnya',
            'button_link' => '#',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Dufan%202024.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
        // Tambahkan data hingga mencapai 9 item
        [
            'image' => 'https://cdn.idntimes.com/content-images/community/2024/03/18cb7e3825681a9d1dea97093606dfde1febca66-s2-n3-y2-6371b2b12fc1bf29fea14f7304914405-98284abb67ea9c3c099de9a12eac87ca.jpg',
            'title' => 'Beach Paradise',
            'features' => ['Private Villa', 'Ocean View', 'Snorkeling', 'Dan Lainnya'],
            'price' => 'Starts from : IDR 899.000,-',
            'button_text' => 'Selengkapnya',
            'button_link' => '#',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Dufan%202024.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
        [
            'image' => 'https://ik.imagekit.io/tvlk/blog/2022/09/Wisata-Gunung-Bromo-Traveloka-Xperience-1.jpg?tr=dpr-2,w-675',
            'title' => 'Mountain Escape',
            'features' => ['Campfire', 'Hiking Trails', 'Cabin Stay', 'Dan Lainnya'],
            'price' => 'Starts from : IDR 799.000,-',
            'button_text' => 'Selengkapnya',
            'button_link' => '#',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Dufan%202024.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
        [
            'image' => 'https://cekunganbandung.jabarprov.go.id/wp-content/uploads/2022/02/gesat-2.jpg',
            'title' => 'City Adventure',
            'features' => ['Nightlife', 'Shopping', 'City Tours', 'Dan Lainnya'],
            'price' => 'Starts from : IDR 1.099.000,-',
            'button_text' => 'Selengkapnya',
            'button_link' => '#',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Dufan%202024.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
        [
            'image' => 'https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/ayobandung/images-bandung/post/articles/2020/06/01/91191/ayobdg_tahura-djuanda-ditutup_kavin-faza2.jpg',
            'title' => 'Forest Retreat',
            'features' => ['Eco-lodge', 'Wildlife', 'Guided Tours', 'Dan Lainnya'],
            'price' => 'Starts from : IDR 699.000,-',
            'button_text' => 'Selengkapnya',
            'button_link' => '#',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Dufan%202024.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
        [
            'image' => 'https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit19201280gsm/events/2024/08/14/594c6072-d53a-4eef-9285-6d69ef1f725a-1723625448894-4199040f8fc0597a41415949abcfef1b.jpg',
            'title' => 'Zoo Gateway',
            'features' => ['Tiket Taman Safari', 'Guided Tours', 'Feeding Time', 'Dan Lainnya'],
            'price' => 'Starts from : IDR 1.299.000,-',
            'button_text' => 'Selengkapnya',
            'button_link' => '#',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Dufan%202024.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
        [
            'image' => 'https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/222/2024/10/05/WhatsApp-Image-2024-09-30-at-154900-3719372467.jpeg',
            'title' => 'Cultural Journey',
            'features' => ['Historical Sites', 'Cultural Shows', 'Local Cuisine', 'Dan Lainnya'],
            'price' => 'Starts from : IDR 899.000,-',
            'button_text' => 'Selengkapnya',
            'button_link' => '#',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Dufan%202024.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
    ];

    return view('components.tour-packages', compact('slides'));
}

    
}
