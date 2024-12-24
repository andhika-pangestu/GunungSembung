<section class="w-full px-8 text-gray-700 bg-white fixed z-50">
    <div class="container flex items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
        <!-- Logo -->
        <div class="flex items-center space-x-4">
            <!-- Logo -->
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/gsp.jpg') }}" alt="GSP Logo" class="h-12 w-auto">
            </a>
            <!-- Title -->
            <a href="#_" class="text-xl font-black leading-none text-red-600">GUNUNG SEMBUNG PUTRA</a>
        </div>


        <!-- Hamburger Button (Mobile) -->
        <button id="menu-toggle" class="block md:hidden ml-auto focus:outline-none">
            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <!-- Navigasi -->
        <nav id="menu" class="hidden md:flex flex-col md:flex-row md:space-x-10 w-full md:w-auto mt-5 md:mt-0 md:items-center">
            <a href="#sejarah" class="block py-2 font-medium text-gray-600 hover:text-gray-900 md:py-0">Sejarah</a>
            <a href="#keunggulan" class="block py-2 font-medium text-gray-600 hover:text-gray-900">Keunggulan</a>
            <a href="#tim" class="block py-2 font-medium text-gray-600 hover:text-gray-900 md:py-0">Tim Kami</a>
        </nav>
    </div>
</section>
