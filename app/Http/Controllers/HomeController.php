<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class homeController extends Controller
{
    public function index()
    {
        $slides = [
                [
                    'image' => 'https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit19201280gsm/events/2024/08/13/0690e857-3357-4cf3-b5b5-eba744f6a784-1723534166661-a4d73af005989d6f43f3863990e8db2c.jpg',
                    'title' => 'Paket Wisata Dufan',
                    'features' => [
                        'Transportasi Bus Ac Pariwisata',
                        'Tiket masuk Gerbang Ancol',
                        'Tiket terusan DUFAN',
                        'Tour Leader Service',
                        'Dan Lainnya'
                    ],
                    'price' => 'Mulai dari : IDR 363.000,-',
                    'button_text' => 'Selengkapnya: ',
                    'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Dufan.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
                ],
            [
                'image' => 'https://asset.kompas.com/crops/oYMCkVt6GrjFlHD0-ehMleF_wyw=/2x0:1000x665/750x500/data/photo/2022/07/02/62c071947729c.jpg',
                'title' => 'Paket Wisata Yogyakarta',
                'features' => [
                    'Transportasi Bus Ac Pariwisata',
                    'Tiket masuk Candi Prambanan',
                    'Tiket masuk Candi Borobudur',
                    'Tour Leader Service',
                    'Dan Lainnya'
                ],
                'price' => 'Mulai dari : IDR 560.000,-',
                'button_text' => 'Selengkapnya: ',
                'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Yogyakarta.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
            ],
            [
                'image' => 'https://busdiscovery.id/wp-content/uploads/2020/11/8-Rekomendasi-Tempat-Wisata-Pangandaran-Yang-Eksotis-1.jpg',
                'title' => 'Pangandaran Tour',
                'features' => [
                    'Transportasi Bus AC Pariwisata',
                    'Tiket masuk Pantai Pangandaran',
                    'Tiket masuk Green Canyon',
                    'Tiket masuk Pantai Batuhiu',
                    'Dan Lainnya'
                ],
                'price' => 'Mulai dari : IDR 499.000,-',
                'button_text' => 'Selengkapnya: ',
                'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Pangandaran.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
            ],
            [
                'image' => 'https://ik.imagekit.io/tvlk/blog/2023/03/shutterstock_727461226.jpg?tr=c-at_max',
                'title' => 'Ziarah Wali Songo Jabar - Jateng',
                'features' => [
                    'Transportasi Bus AC Pariwisata',
                    'Tiket Masuk Ziarah',
                    'BBM, Tol, dan Parkir',
                    'Sumbangan Makam',
                    'Dan Lainnya'
                ],
                'price' => 'Mulai dari : IDR 1.799.000,-',
                'button_text' => 'Selengkapnya: ',
                'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Ziarah%20Wali%20Songo%20Jabar-Jateng.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
            ]

        ];
    
        return view('index', compact('slides'));
     }

public function allTourPackages()
{
    $slides = [
        [
            'image' => 'https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit19201280gsm/events/2021/12/08/9c6ae660-1799-4276-b81d-f8b0b85669d6-1638949473006-1e6c55a1b1edca6bf250012af2cc79e2.jpg',
            'title' => 'Paket Wisata Dufan',
            'features' => [
                'Transportasi Bus Ac Pariwisata',
                'Tiket masuk Gerbang Ancol',
                'Tiket terusan DUFAN',
                'Tour Leader Service',
                'Dan Lainnya',
            ],
            'price' => 'Mulai dari : IDR 363.000,-',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Dufan.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
        [
            'image' => 'https://asset.kompas.com/crops/oYMCkVt6GrjFlHD0-ehMleF_wyw=/2x0:1000x665/750x500/data/photo/2022/07/02/62c071947729c.jpg',
            'title' => 'Paket Wisata Yogyakarta',
            'features' => [
                'Transportasi Bus Ac Pariwisata',
                'Tiket masuk Candi Prambanan',
                'Tiket masuk Candi Borobudur',
                'Tour Leader Service (Tentative)',
                'Dan Lainnya',
            ],
            'price' => 'Mulai dari : IDR 560.000,-',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Yogyakarta.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
        [
            'image' => 'https://busdiscovery.id/wp-content/uploads/2020/11/8-Rekomendasi-Tempat-Wisata-Pangandaran-Yang-Eksotis-1.jpg',
            'title' => 'Pangandaran Tour',
            'features' => [
                'Transportasi Bus AC Pariwisata',
                'Tiket masuk Pantai Pangandaran',
                'Tiket masuk Green Canyon',
                'Tiket masuk Pantai Batuhiu',
                'Dan Lainnya',
            ],
            'price' => 'Mulai dari : IDR 499.000,-',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Pangandaran.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
        [
            'image' => 'https://ik.imagekit.io/tvlk/blog/2023/03/shutterstock_727461226.jpg?tr=c-at_max',
            'title' => 'Ziarah Wali Songo Jabar - Jateng',
            'features' => ['Transportasi Bus AC Pariwisata','Tiket Masuk Ziarah','BBM, Tol, dan Parkir','Sumbangan Makam','Dan Lainnya'],
            'price' => 'Mulai dari : IDR 1.799.000,-',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Ziarah%20Wali%20Songo%20Jabar-Jateng.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
        [
            'image' => 'https://citraniwisata.com/wp-content/uploads/2017/05/Paket-Wisata-Religi-Ziarah-Wali-9.jpg',
            'title' => 'Ziarah Wali Songo Jabar - Jateng - Jatim',
            'features' => ['Transportasi Bus AC Pariwisata','Tiket Masuk Ziarah','BBM, Tol, dan Parkir','Sumbangan Makam','Dan Lainnya'],
            'price' => 'Mulai dari : IDR 2.599.00,-',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Ziarah%20Wali%20Songo%20Jabar-Jateng-Jatim.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
        [
            'image' => 'https://cdn.idntimes.com/content-images/post/20240323/2022-03-26-11zon-4b2636e099b9a0addaf3355485ac2820_600x400.jpg',
            'title' => 'Ziarah Wali Pitu Bali',
            'features' => ['Transportasi Bus AC Pariwisata','Tiket Masuk Ziarah','BBM, Tol, dan Parkir','Sumbangan Makam','Dan Lainnya'],
            'price' => 'Mulai dari : IDR 1.799.000,-',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Ziarah%20Wali%20Pitu%20Bali.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
        [
            'image' => 'https://inionline.id/wp-content/uploads/2023/01/5-Wisata-Religi-di-Madura-yang-Wajib-Anda-Kunjungi.jpg',
            'title' => 'Ziarah Religi Pulau Madura ',
            'features' => ['Transportasi Bus AC Pariwisata','Tiket Masuk Ziarah','BBM, Tol, dan Parkir','Sumbangan Makam','Dan Lainnya'],
            'price' => 'Mulai dari: IDR 2.100.000,-',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Ziarah%20Religi%20Pulau%20Madura.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
        [
            'image' => 'https://asset.kompas.com/crops/ahwdNiveuBYvO76STMpdaJeAVQo=/14x0:1000x657/1200x800/data/photo/2023/08/13/64d87b14d1016.jpg',
            'title' => 'Tour Museum Bandung',
            'features' => ['Transportasi Bus AC Pariwisata', 'Tiket Museum Geologi', 'Tiket Masuk Museum Gedung Sate', 'Galeri IPTEK Sabuga ITB', 'Dan Lainnya'],
            'price' => 'Mulai dari: IDR 150.000,-',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Wisata%20Tour%20Museum%20Bandung.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
        [
            'image' => 'https://asset.kompas.com/crops/KzpFilk7phq-fcwfZtcNevSfOi0=/0x74:847x639/1200x800/data/photo/2024/08/16/66bf18f9ead40.png',
            'title' => 'Rekreasi AnakTaman Lalu Lintas dan Kebun Binatang',
            'features' => ['Transportasi Bus AC Pariwisata', 'Tiket Masuk Taman Lalu Lintas', 'Tiket Masuk Kebun Binatang Bandung', 'BBM dan Parkir', 'Dan Lainnya'],
            'price' => 'Mulai dari : IDR 199.000,-',
            'button_text' => 'Pesan Sekarang ',
            'button_link' => 'https://wa.me/6285189700998?text=Halo,%20Saya%20tertarik%20dengan%20Paket%20Rekreasi%20Anak%20Taman%20Lalu%20Lintas%20dan%20Kebun%20Binatang%20Bandung.%20Bisakah%20Anda%20berikan%20info%20lebih%20lanjut?'
        ],
    ];

    return view('pages.tour-packages', compact('slides'));
}

    
}