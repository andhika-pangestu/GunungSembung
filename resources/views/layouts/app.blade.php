<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css" rel="stylesheet">
    <title>@yield('title', 'Gunung Sembung')</title>
    @vite('resources/css/app.css')
</head>
<body class="font-helvetica">
    <header>
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
</body>
</html>
