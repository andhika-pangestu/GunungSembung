<!-- Include Swiper's CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<!-- Include Swiper's JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<style>
    .swiper-button-next, .swiper-button-prev {
      color: white; /* Change the color of the buttons if needed */
      top: 50%;
      transform: translateY(-50%);
      width: 30px;
      height: 30px;
    }
    .swiper-button-next {
      right: 300px; /* Adjust the distance from the right edge */
    }
    .swiper-button-prev {
      left: 870px; /* Adjust the distance from the left edge */
    }
  </style>

<!-- Section 2 -->
<section class="relative px-2 py-32 bg-cover bg-center bg-no-repeat" style=" background-image: url('{{ asset('hero-img/Bis1.jpg') }}');">
  <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
        <div class="flex flex-wrap items-center sm:-mx-3">
            <div class="w-full md:w-1/2 md:px-3">
                <div
                    class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
                    <h1
                        class="text-4xl font-extrabold tracking-tight text-red-500 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                        <span class="block xl:inline">GSP</span>
                        <span class="block text-neutral-100 L:inline">Membuat Perjalanan Lebih Mudah.                        </span>
                    </h1>
                    <p class="mx-auto text-stone-50 sm:max-w-md lg:text-xl md:max-w-3xl backdrop-blur-sm">Kami Menyewakan Bis Pariwisata AC dan Non AC dengan harga yang terjangkau dan pelayanan yang memuaskan untuk keperluan wisata anda
                    </p>
                    <div class="relative flex flex-col sm:flex-row sm:space-x-4">
                        <a href="#_"
                            class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-red-600 rounded-xl sm:mb-0 hover:bg-red-700 sm:w-auto">
                            Cek List Bis
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                        <a href="#_"
                            class="flex items-center px-6 py-3 text-gray-500 bg-gray-100 rounded-xl hover:bg-gray-200 hover:text-gray-600">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl">
                    <!-- Swiper -->
                    <div class="swiper-container h-80">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('hero-img/BisStuck.jpg') }}" alt="Image 1"  class="w-full h-full object-fill">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('hero-img/Bis2.jpg') }}" alt="Image 2"  class="w-full h-full object-fill">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('hero-img/Bis3.jpg') }}" alt="Image 3"  class="w-full h-full object-fill">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('hero-img/Sign1.jpg') }}" alt="Image 4"  class="w-full h-full object-fill">
                            </div>
                            <!-- Add more slides as needed -->
                        </div>

                        <!-- Add Navigation -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
      var swiper = new Swiper('.swiper-container', {
        loop: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    });
  </script>
