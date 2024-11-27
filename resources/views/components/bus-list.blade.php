<div class="max-w-7xl mx-auto px-4 py-12">
    <h2 class="text-3xl font-extrabold text-center mb-8 text-gray-900 sm:text-4xl">Pilihan Bus</h2>

    <!-- Grid untuk 2 Card -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Card Kiri -->
        <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
            <!-- Carousel -->
            <div x-data="{ current: 0, images: ['https://happy-bus.id/wp-content/uploads/2023/08/jenis-jenis-bus-shd-jetbus.jpeg', 'https://via.placeholder.com/600x400?text=Bus+2', 'https://via.placeholder.com/600x400?text=Bus+3'] }" class="relative">
                <!-- Images -->
                <template x-for="(image, index) in images" :key="index">
                    <div x-show="current === index" class="w-full h-auto">
                        <img :src="image" alt="Bus Image" class="w-full h-auto object-cover">
                    </div>
                </template>
        
                <!-- Navigation Buttons -->
                <button @click="current = (current > 0) ? current - 1 : images.length - 1"
                    class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full shadow-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    <span class="material-icons">chevron_left</span>
                </button>
                <button @click="current = (current < images.length - 1) ? current + 1 : 0"
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full shadow-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    <span class="material-icons">chevron_right</span>
                </button>
            </div>
        
            <!-- Content -->
            <div class="p-3">
                <h2 class="text-orange-500 text-lg font-bold mb-2">Medium Bus 31</h2>
                <p class="text-gray-600 text-xs mb-3">
                    Medium Bus 31 adalah pilihan ideal untuk perjalanan grup kecil hingga menengah. Dilengkapi dengan
                    fasilitas modern seperti AC, kursi reclining, dan hiburan lengkap, bus ini siap memberikan
                    pengalaman perjalanan terbaik.
                </p>
                <div class="grid grid-cols-2 gap-y-3">
                    <!-- Fasilitas Kiri -->
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-500 rounded-full">
                            <span class="material-icons text-sm">ac_unit</span>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs">Air Conditioner</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-500 rounded-full">
                            <span class="material-icons text-sm">airline_seat_recline_normal</span>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs">Reclining Seats</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-500 rounded-full">
                            <span class="material-icons text-sm">tv</span>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs">TV/LCD</p>
                        </div>
                    </div>
                    <!-- Fasilitas Kanan -->
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-500 rounded-full">
                            <span class="material-icons text-sm">music_note</span>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs">Audio & Karaoke</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-500 rounded-full">
                            <span class="material-icons text-sm">work</span>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs">Bagasi</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-500 rounded-full">
                            <span class="material-icons text-sm">wc</span>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs">Toilet</p>
                        </div>
                    </div>
                </div>
        
                <!-- WhatsApp Button -->
                <div class="mt-6 flex justify-end">
                    <a href="https://wa.me/1234567890" target="_blank" class="inline-flex items-center space-x-2">
                        <button
                            class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-5 rounded-full inline-flex items-center focus:outline-none focus:ring-2 focus:ring-green-400">
                            <svg id="fi_15707820" enable-background="new 0 0 1000 1000" viewBox="0 0 1000 1000"
                                xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                                <g>
                                    <path
                                        d="m500 1000c-276.1 0-500-223.9-500-500 0-276.1 223.9-500 500-500 276.1 0 500 223.9 500 500 0 276.1-223.9 500-500 500z"
                                        fill="#25d366"></path>
                                    <g>
                                        <g id="WA_Logo">
                                            <g>
                                                <path clip-rule="evenodd"
                                                    d="m733.9 267.2c-62-62.1-144.6-96.3-232.5-96.4-181.1 0-328.6 147.4-328.6 328.6 0 57.9 15.1 114.5 43.9 164.3l-46.6 170.3 174.2-45.7c48 26.2 102 40 157 40h.1c181.1 0 328.5-147.4 328.6-328.6.1-87.8-34-170.4-96.1-232.5zm-232.4 505.6h-.1c-49 0-97.1-13.2-139-38.1l-10-5.9-103.4 27.1 27.6-100.8-6.5-10.3c-27.3-43.5-41.8-93.7-41.8-145.4.1-150.6 122.6-273.1 273.3-273.1 73 0 141.5 28.5 193.1 80.1s80 120.3 79.9 193.2c0 150.7-122.6 273.2-273.1 273.2zm149.8-204.6c-8.2-4.1-48.6-24-56.1-26.7s-13-4.1-18.5 4.1-21.2 26.7-26 32.2-9.6 6.2-17.8 2.1-34.7-12.8-66-40.8c-24.4-21.8-40.9-48.7-45.7-56.9s-.5-12.7 3.6-16.8c3.7-3.7 8.2-9.6 12.3-14.4s5.5-8.2 8.2-13.7 1.4-10.3-.7-14.4-18.5-44.5-25.3-61c-6.7-16-13.4-13.8-18.5-14.1-4.8-.2-10.3-.3-15.7-.3-5.5 0-14.4 2.1-21.9 10.3s-28.7 28.1-28.7 68.5 29.4 79.5 33.5 84.9c4.1 5.5 57.9 88.4 140.3 124 19.6 8.5 34.9 13.5 46.8 17.3 19.7 6.3 37.6 5.4 51.7 3.3 15.8-2.4 48.6-19.9 55.4-39 6.8-19.2 6.8-35.6 4.8-39s-7.5-5.4-15.7-9.6z"
                                                    fill="#fff" fill-rule="evenodd"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <span>Pesan Bus</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        

        <!-- Card Kanan -->
        <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
            <!-- Carousel -->
            <div x-data="{ current: 0, images: ['https://happy-bus.id/wp-content/uploads/2023/08/jenis-jenis-bus-shd-jetbus.jpeg', 'https://via.placeholder.com/600x400?text=Bus+2', 'https://via.placeholder.com/600x400?text=Bus+3'] }" class="relative">
                <!-- Images -->
                <template x-for="(image, index) in images" :key="index">
                    <div x-show="current === index" class="w-full h-auto">
                        <img :src="image" alt="Bus Image" class="w-full h-auto object-cover">
                    </div>
                </template>
        
                <!-- Navigation Buttons -->
                <button @click="current = (current > 0) ? current - 1 : images.length - 1"
                    class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full shadow-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    <span class="material-icons">chevron_left</span>
                </button>
                <button @click="current = (current < images.length - 1) ? current + 1 : 0"
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full shadow-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    <span class="material-icons">chevron_right</span>
                </button>
            </div>
        
            <!-- Content -->
            <div class="p-3">
                <h2 class="text-orange-500 text-lg font-bold mb-2">Medium Bus 31</h2>
                <p class="text-gray-600 text-xs mb-3">
                    Medium Bus 31 adalah pilihan ideal untuk perjalanan grup kecil hingga menengah. Dilengkapi dengan
                    fasilitas modern seperti AC, kursi reclining, dan hiburan lengkap, bus ini siap memberikan
                    pengalaman perjalanan terbaik.
                </p>
                <div class="grid grid-cols-2 gap-y-3">
                    <!-- Fasilitas Kiri -->
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-500 rounded-full">
                            <span class="material-icons text-sm">ac_unit</span>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs">Air Conditioner</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-500 rounded-full">
                            <span class="material-icons text-sm">airline_seat_recline_normal</span>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs">Reclining Seats</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-500 rounded-full">
                            <span class="material-icons text-sm">tv</span>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs">TV/LCD</p>
                        </div>
                    </div>
                    <!-- Fasilitas Kanan -->
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-500 rounded-full">
                            <span class="material-icons text-sm">music_note</span>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs">Audio & Karaoke</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-500 rounded-full">
                            <span class="material-icons text-sm">work</span>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs">Bagasi</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-500 rounded-full">
                            <span class="material-icons text-sm">wc</span>
                        </div>
                        <div>
                            <p class="text-gray-600 text-xs">Toilet</p>
                        </div>
                    </div>
                </div>
        
                <!-- WhatsApp Button -->
                <div class="mt-6 flex justify-end">
                    <a href="https://wa.me/1234567890" target="_blank" class="inline-flex items-center space-x-2">
                        <button
                            class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-5 rounded-full inline-flex items-center focus:outline-none focus:ring-2 focus:ring-green-400">
                            <svg id="fi_15707820" enable-background="new 0 0 1000 1000" viewBox="0 0 1000 1000"
                                xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                                <g>
                                    <path
                                        d="m500 1000c-276.1 0-500-223.9-500-500 0-276.1 223.9-500 500-500 276.1 0 500 223.9 500 500 0 276.1-223.9 500-500 500z"
                                        fill="#25d366"></path>
                                    <g>
                                        <g id="WA_Logo">
                                            <g>
                                                <path clip-rule="evenodd"
                                                    d="m733.9 267.2c-62-62.1-144.6-96.3-232.5-96.4-181.1 0-328.6 147.4-328.6 328.6 0 57.9 15.1 114.5 43.9 164.3l-46.6 170.3 174.2-45.7c48 26.2 102 40 157 40h.1c181.1 0 328.5-147.4 328.6-328.6.1-87.8-34-170.4-96.1-232.5zm-232.4 505.6h-.1c-49 0-97.1-13.2-139-38.1l-10-5.9-103.4 27.1 27.6-100.8-6.5-10.3c-27.3-43.5-41.8-93.7-41.8-145.4.1-150.6 122.6-273.1 273.3-273.1 73 0 141.5 28.5 193.1 80.1s80 120.3 79.9 193.2c0 150.7-122.6 273.2-273.1 273.2zm149.8-204.6c-8.2-4.1-48.6-24-56.1-26.7s-13-4.1-18.5 4.1-21.2 26.7-26 32.2-9.6 6.2-17.8 2.1-34.7-12.8-66-40.8c-24.4-21.8-40.9-48.7-45.7-56.9s-.5-12.7 3.6-16.8c3.7-3.7 8.2-9.6 12.3-14.4s5.5-8.2 8.2-13.7 1.4-10.3-.7-14.4-18.5-44.5-25.3-61c-6.7-16-13.4-13.8-18.5-14.1-4.8-.2-10.3-.3-15.7-.3-5.5 0-14.4 2.1-21.9 10.3s-28.7 28.1-28.7 68.5 29.4 79.5 33.5 84.9c4.1 5.5 57.9 88.4 140.3 124 19.6 8.5 34.9 13.5 46.8 17.3 19.7 6.3 37.6 5.4 51.7 3.3 15.8-2.4 48.6-19.9 55.4-39 6.8-19.2 6.8-35.6 4.8-39s-7.5-5.4-15.7-9.6z"
                                                    fill="#fff" fill-rule="evenodd"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <span>Pesan Bus</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>        
 </div>
