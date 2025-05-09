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
    </head>
    <body class="bg-gray-100">
        <div class="flex">
            <!-- Sidebar -->
            @include('dashboard.components.side')
    
            <!-- Main Content -->
            <main class="flex-1 p-6">
                @yield('dahboard-content')
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@flowbite/components/dist/flowbite.min.js"></script>
    </body>
</html>