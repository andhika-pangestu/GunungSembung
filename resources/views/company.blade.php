@extends('layouts.company')

@section('title', 'Tentang') 

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- Sejarah Perusahaan -->
<section id="sejarah" class="bg-white p-8 rounded-lg pt-20">
    <div class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-6">
        <!-- Teks Sejarah -->
        <div class="lg:w-1/2 text-gray-700 space-y-6">
            <h2 class="text-3xl font-extrabold text-red-500 pb-4">Sejarah Perusahaan</h2>
            <p class="text-lg text-justify leading-relaxed">
                Sejak didirikan pada tahun <strong class="font-bold">1990</strong>, kami telah berkomitmen untuk memberikan layanan transportasi berkualitas tinggi dengan fokus utama pada <strong class="font-bold">keamanan</strong>, 
                <strong class="font-bold">kenyamanan</strong>, dan <strong class="font-bold">kepuasan anda</strong>. 
                Dengan pengalaman lebih dari <strong class="font-bold">30 tahun</strong>, kami telah melayani ratusan pelanggan
                 di lebih dari <strong class="font-bold">50 kota</strong> dan destinasi di seluruh <strong class="font-bold">Sumatra, Jawa Barat, Bali, Madura dan Sekitarnya</strong>.
                Kami menyediakan berbagai pilihan armada, yang dapat disesuaikan dengan kebutuhan perjalanan, dengan harga yang fleksibel untuk memenuhi berbagai anggaran anda. 
                Armada kami selalu terawat dengan baik, memastikan setiap perjalanan berlangsung dengan aman dan nyaman. 
                Percayakan kebutuhan transportasi anda kepada kami, dan nikmati perjalanan yang terpercaya dengan <strong class="font-bold">harga yang kompetitif</strong>.
            </p>
            <p class="text-lg text-justify leading-relaxed">
                Kami berlokasi di Cibiru, Bandung. Tepatnya di Jl. Cinunuk No. 126, Kabupaten Bandung, <strong class="font-bold">siap melayani Anda kapan saja!</strong>
            </p>
            
        </div>
    
        <!-- Gambar -->
        <div class="lg:w-1/2 mt-8 lg:mt-0 lg:ml-10">
            <img src="images/buss.jpeg" alt="Gambar Perusahaan" class="w-full h-auto rounded-lg shadow-md">
        </div>
    </div>
    
    

    <!-- Tiga Baris Informasi Layanan Kami -->
    <h2 class="text-3xl font-bold text-red-500 text-center pt-16">Layanan Kami</h2>
    <div class="mt-12 grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">
        

        <div class="flex flex-col items-center space-y-2">
            <h3 class="text-2xl font-semibold text-red-500">259+</h3>
            <p class="text-sm text-gray-600">Pelanggan Puas</p>
        </div>

        <div class="flex flex-col items-center space-y-2">
            <h3 class="text-2xl font-semibold text-red-500">7+</h3>
            <p class="text-sm text-gray-600">Bus Tersedia</p>
        </div>

        <div class="flex flex-col items-center space-y-2">
            <h3 class="text-2xl font-semibold text-red-500">50+</h3>
            <p class="text-sm text-gray-600">Kota & Destinasi yang Telah Kami Kunjungi</p>
        </div>
    </div>
</section>

    <!-- Keunggulan -->
    <section id="keunggulan" class="bg-gray-50 py-12">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-extrabold text-red-500 pb-4 mb-6">
                Keunggulan Kami
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Keunggulan  -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <div class="flex justify-center mb-4">
                        <span class="bg-red-100 text-red-500 p-4 rounded-full">
                            <i class="fa-solid fa-bus fa-xl"></i>
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-700">Armada Modern</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Armada modern dengan fasilitas lengkap seperti Wi-Fi, AC, Audio (TV dan karaoke), dan kenyamanan lainnya untuk perjalanan anda
                    </p>
                </div>
                <!-- Keunggulan  -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <div class="flex justify-center mb-4">
                        <span class="bg-red-100 text-red-500 p-4 rounded-full">
                            <i class="fas fa-map-marked-alt text-2xl"></i>
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-700">Jangkauan Rute</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Jangkauan rute luas ke berbagai kota dan destinasi populer di Jawa Barat, Sumatra, Bali, dan sekitarnya
                    </p>
                </div>
                <!-- Keunggulan  -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <div class="flex justify-center mb-4">
                        <span class="bg-red-100 text-red-500 p-4 rounded-full">
                            <i class="fa-solid fa-wallet fa-xl"></i>
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-700">Harga Fleksibel, Sesuai Budget</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Nikmati perjalanan nyaman dengan sewa bus fleksibel sesuai anggaran anda. Harga yang bisa disesuaikan, solusi transportasi terbaik tanpa khawatir biaya
                    </p>
                </div>
                
                <!-- Keunggulan  -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <div class="flex justify-center mb-4">
                        <span class="bg-red-100 text-red-500 p-4 rounded-full">
                            <i class="fas fa-user-shield text-2xl"></i>
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-700">Pengemudi Berpengalaman</h3>
                    <p class="text-sm text-gray-500 mt-2">
                        Pengemudi berpengalaman yang siap memastikan keselamatan dan kenyamanan perjalanan anda
                    </p>
                </div>
            </div>
        </div>
    </section>
    

    <!-- Temui Tim Kami -->
    <section id="tim" class="bg-white p-8 rounded-lg pt-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-extrabold text-red-500 pb-4 mb-6">
                Tim Gunung Sembung
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                <!-- Member 1 -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <img class="rounded-full mx-auto w-24 h-24 mb-4" src="images/member.jpeg" alt="John Doe">
                    <h3 class="font-bold text-lg text-gray-700">Pak Haji</h3>
                    <p class="text-sm text-gray-500">CEO</p>
                </div>
                <!-- Member 2 -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <img class="rounded-full mx-auto w-24 h-24 mb-4" src="images/member.jpeg" alt="Jane Smith">
                    <h3 class="font-bold text-lg text-gray-700">Bu Euis</h3>
                    <p class="text-sm text-gray-500">CTO</p>
                </div>
                <!-- Member 3 -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <img class="rounded-full mx-auto w-24 h-24 mb-4" src="images/member.jpeg" alt="Ahmad Rafi">
                    <h3 class="font-bold text-lg text-gray-700">Bu Esih</h3>
                    <p class="text-sm text-gray-500">COO</p>
                </div>
                <!-- Member 4 -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <img class="rounded-full mx-auto w-24 h-24 mb-4" src="images/member.jpeg" alt="Emily Chen">
                    <h3 class="font-bold text-lg text-gray-700">Pak Dede</h3>
                    <p class="text-sm text-gray-500">CMO</p>
                </div>
                <!-- Member 5 -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <img class="rounded-full mx-auto w-24 h-24 mb-4" src="images/member.jpeg" alt="Emily Chen">
                    <h3 class="font-bold text-lg text-gray-700">Bapak Rully</h3>
                    <p class="text-sm text-gray-500">CMO</p>
                </div>
            </div>
        </div>
    </section>
    
</main>
@endsection