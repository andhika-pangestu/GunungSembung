<section class="w-full px-8 text-gray-700 bg-white fixed z-50 top-0 left-0">
    <div class="container flex items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
        <!-- Logo -->
        <a href="#_" class="text-xl font-black leading-none text-red-600">GUNUNG SEMBUNG PUTRA</a>

        <!-- Hamburger Button (Mobile) -->
        <button id="menu-toggle" class="block md:hidden ml-auto focus:outline-none">
            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <!-- Navigasi -->
        <nav id="menu"
            class="hidden md:flex flex-col md:flex-row md:space-x-10 w-full md:w-auto mt-5 md:mt-0 md:items-center">
            <a href="javascript:void(0)" onclick="scrollToSection('home')" class="block py-2 font-medium text-gray-600 hover:text-gray-900 md:py-0">Beranda</a>
            <a href="javascript:void(0)" onclick="scrollToSection('about')" class="block py-2 font-medium text-gray-600 hover:text-gray-900">Tentang Kami</a>
            <a href="javascript:void(0)" onclick="scrollToSection('bus')" class="block py-2 font-medium text-gray-600 hover:text-gray-900 md:py-0">List Bus</a>
            <a href="javascript:void(0)" onclick="scrollToSection('tour')" class="block py-2 font-medium text-gray-600 hover:text-gray-900 md:py-0">Paket</a>
        </nav>
    </div>
</section>