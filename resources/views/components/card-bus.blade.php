<div class="max-w-sm w-full sm:w-80 h-4/5 rounded m-5 overflow-hidden shadow-lg">
  <!-- Image part -->
  <div class="relative h-full">
    <img class="w-full h-full object-cover" src="{{ $image }}" alt="{{ $title }}">
    
    <!-- Overlay with title and expandable subtitle -->
    <div class="absolute bottom-0 left-0 rounded-r-lg bg-white bg-opacity-60 p-2 h-auto">
      <h2 class="ml-5 mr-5 text-gray-900 font-bold text-lg sm:text-xl">{{ $title }}</h2>
      <p id="subtitle" class="ml-5 mr-5 mb-5 text-gray-700 text-md sm:text-lg">
        <!-- short -->
        <span id="short-subtitle" class="block">{{ $subtitle }}</span>
        <!-- long -->
        <span id="long-subtitle" class="hidden block">{{ $description }}</span>
      </p>
      
      <button id="toggleButton" 
      class="absolute bottom-0 right-0 mr-5 text-blue-700 font-bold hover:underline block">
        <span>Read More</span>
      </button>
      
    </div>
  </div>
</div>

