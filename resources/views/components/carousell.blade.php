<div class="relative max-w-2xl mx-auto">
    <button type="button"
        class="absolute top-1/2 -left-8 transform -translate-y-1/2 z-40 w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition"
        id="prev-slide">
        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>

    <!-- Carousel Container -->
    <div id="custom-carousel" class="relative rounded-lg overflow-hidden shadow-lg">
        <div class="relative h-80 md:h-96">
            @foreach ($slides as $index => $slide)
                <div class="carousel-item {{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out relative" data-carousel-item>
                    <!-- Background Image -->
                    <img src="{{ $slide['image'] }}" class="object-cover w-full h-full" alt="{{ $slide['title'] }}">
                    
                    <!-- Overlay with text content -->
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center px-8">
                        <h2 class="text-white text-4xl font-bold mb-4">{{ $slide['title'] }}</h2>
                        
                        <ul class="text-white text-lg mb-4 space-y-1">
                            @foreach ($slide['features'] as $feature)
                                <li>{{ $loop->iteration }}. {{ $feature }}</li>
                            @endforeach
                        </ul>
                        
                        <!-- Price and Button Section -->
                        <div class="flex items-center space-x-4">
                            <span class="bg-white bg-opacity-70 text-red-600 font-semibold px-4 py-2 rounded-lg">{{ $slide['price'] }}</span>
                            <a href="{{ $slide['button_link'] }}" target="_blank" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded-lg flex items-center justify-center">
                                {{ $slide['button_text'] }} &nbsp;
                                <img src = "https://upload.wikimedia.org/wikipedia/commons/5/5e/WhatsApp_icon.png" alt = "WA" class="w-7 h-7 mr-2">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Right Arrow Button -->
    <button type="button"
        class="absolute top-1/2 -right-8 transform -translate-y-1/2 z-40 w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition"
        id="next-slide">
        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>

    <!-- Slider indicators below the carousel -->
    <div class="flex justify-center mt-4 space-x-2">
        @foreach ($slides as $index => $slide)
            <button type="button" data-slide-to="{{ $index }}" class="carousel-indicator w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition"></button>
        @endforeach
        &nbsp;
    </div>


    <!-- JavaScript for Carousel -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const items = document.querySelectorAll('[data-carousel-item]');
            const indicators = document.querySelectorAll('.carousel-indicator');
            let currentIndex = 0;

            function showSlide(index) {
                items.forEach((item, i) => {
                    item.classList.toggle('block', i === index);
                    item.classList.toggle('hidden', i !== index);
                });
                indicators.forEach((indicator, i) => {
                    indicator.classList.toggle('bg-gray-400', i === index);
                    indicator.classList.toggle('bg-gray-300', i !== index);
                });
                currentIndex = index;
            }

            document.getElementById('next-slide').addEventListener('click', () => {
                const nextIndex = (currentIndex + 1) % items.length;
                showSlide(nextIndex);
            });

            document.getElementById('prev-slide').addEventListener('click', () => {
                const prevIndex = (currentIndex - 1 + items.length) % items.length;
                showSlide(prevIndex);
            });

            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    showSlide(index);
                });
            });

            // Automatically switch slides every 3 seconds
            setInterval(() => {
                const nextIndex = (currentIndex + 1) % items.length;
                showSlide(nextIndex);
            }, 3000);
        });
    </script>
</div>
