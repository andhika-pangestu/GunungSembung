<!-- resources/views/components/carousell.blade.php -->

<div class="max-w-2xl mx-auto">
    <div id="custom-carousel" class="relative rounded-lg overflow-hidden shadow-lg">
        <!-- Carousel wrapper -->
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
                            <a href="{{ $slide['button_link'] }}" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded-lg">
                                {{ $slide['button_text'] }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Slider indicators -->
        <div class="flex absolute bottom-5 left-1/2 z-30 -translate-x-1/2 space-x-2">
            @foreach ($slides as $index => $slide)
                <button type="button" data-slide-to="{{ $index }}" class="carousel-indicator w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition"></button>
            @endforeach
        </div>

        <!-- Slider controls -->
        <button type="button"
            class="absolute top-1/2 left-3 z-40 w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 transition"
            id="prev-slide">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button type="button"
            class="absolute top-1/2 right-3 z-40 w-10 h-10 bg-gray-200/50 rounded-full hover:bg-gray-300 transition"
            id="next-slide">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>

    <!-- Custom JavaScript for Carousel -->
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

            // Automatically switch slides every 5 seconds (optional)
            setInterval(() => {
                const nextIndex = (currentIndex + 1) % items.length;
                showSlide(nextIndex);
            }, 5000);
        });
    </script>
</div>
