{{-- filepath: resources/views/partials/navbar.blade.php --}}
<nav class="p-6 text-lg bg-white shadow-md">
    <ul class="flex justify-center space-x-8 mx-auto items-center relative">
        <li class="absolute left-40 flex space-x-4">
            <a href="/">
                <img src="{{ asset('images/Logo Nazma.png') }}" alt="Logo" class="h-8">
            </a>
        </li>
        <li class="px-8">
            <a href="/" class="font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
            Home
            </a>
        </li>
        <li class="px-8">
            <a href="/about" class="font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
            Cv Ats
            </a>
        </li>
        <li class="px-8">
            <a href="/contact" class="font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
            Template Cv
            </a>
        </li>
        <li class="absolute right-40 flex space-x-4">
            <a href="/masuk" class="p-6 font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                Masuk
            </a>
            <a href="/daftar" class="p-6 font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                Daftar
            </a>
        </li>
    </ul>
</nav>