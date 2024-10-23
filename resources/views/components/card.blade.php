<div class="max-w-sm w-full sm:w-80 h-4/5 rounded m-5 overflow-hidden shadow-lg">
  <!-- Image part -->
  <div class="relative h-full">
    <img class="w-full h-full object-cover" src="{{ $image }}" alt="{{ $title }}">
    <!-- Overlay with title and subtitle -->
    <div class="absolute bottom-0 left-0  rounded-r-lg bg-white bg-opacity-60 p-2 h-auto">
      <h2 class="ml-5 mr-5 text-gray-900 font-bold text-lg sm:text-xl">{{ $title }}</h2>
      <p class="ml-5 mr-5 text-gray-700 text-md sm:text-lg">{{ $location }}</p>
    </div>        
  </div>
</div>
