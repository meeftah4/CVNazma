{{-- filepath: resources/views/partials/navbar.blade.php --}}
<nav class="p-6 text-lg bg-white shadow-md">
    <ul class="flex justify-center space-x-8 mx-auto items-center">
        <li class="absolute left-40">
            <a href="/">
                <img src="{{ asset('images/Logo Nazma.png') }}" alt="Logo" class="h-8">
            </a>
        </li>
        <li>
            <a href="/" class="font-kantumruy text-[40px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                Home
            </a>
        </li>
        <li>
            <a href="/about" class="font-kantumruy text-[40px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                Cv Ats
            </a>
        </li>
        <li>
            <a href="/contact" class="font-kantumruy text-[40px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                Template Cv
            </a>
        </li>
    </ul>
</nav>