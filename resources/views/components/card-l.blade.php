
<div class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40 max-w-xl min-w-full mx-auto mt-2">
    <img src="{{ $image }}" alt="{{ $title }}" class="absolute inset-0 h-full w-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
    <h3 class="z-10 mt-3 text-3xl font-bold text-white">{{ $title }}</h3>
    <div class="z-10 capitalize gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">{{ $deskripsi }}</div>
</div>
