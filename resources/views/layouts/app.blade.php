{{-- filepath: resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Laravel')</title>
        @stack('styles')
        @vite(['resources/css/navbar.css', 'resources/js/navbar.js'])
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
        @vite(['resources/css/app.css','resources/js/app.js'])
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{ asset('images/marsa.jpg') }}">
    </head>
    <body>

        {{-- Header --}}

        {{-- Navbar --}}
        @include('components.navbar')
        @include('components.login-modal')
        @include('components.register-modal')

        {{-- Scripts --}}
        @stack('scripts')

        {{-- Main Content --}}
        <main class="min-h-screen">
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('components.footer')
    </body>
</html>