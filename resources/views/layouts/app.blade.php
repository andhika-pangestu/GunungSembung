<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css" rel="stylesheet">
    <title>@yield('title', 'PT Gunung Sembung Putra')</title>
    <link rel="icon" href="{{ asset('images/gsp.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
</head>
<body class="font-helvetica">
    <header>
        <div class="fi-logo flex text-xl font-bold leading-5 tracking-tight text-gray-950 dark:text-white">
            PT Gunung Sembung Putra
        </div>
        @include('partials.header') <!-- Menyertakan header dari partials -->
    </header>

    <!-- Konten Utama -->
    <main>
        @yield('content') <!-- Bagian ini akan diisi konten dari halaman child -->
    </main>

    <!-- Footer -->
    <footer>
        @include('partials.footer') <!-- Menyertakan footer dari partials -->
    </footer>

    <!-- JavaScript -->
    @vite('resources/js/app.js');
    <script src="{{ mix('js/scroll.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.2/cdn.min.js" defer></script>
    
</body>
</html>
