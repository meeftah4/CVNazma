{{-- filepath: resources/views/partials/navbar.blade.php --}}
<nav class="p-6 text-lg bg-white shadow-md">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/Logo Nazma.png') }}" alt="Logo" class="h-8">
            </a>

            <!-- Hamburger Menu (Mobile) -->
            <button id="menu-toggle" class="block md:hidden focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <!-- Navigation Links -->
            <ul id="menu" class="hidden md:flex md:space-x-8 items-center">
                <li>
                    <a href="/" class="font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                        Home
                    </a>
                </li>
                <li>
                    <a href="/CvAts" class="font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                        Cv Ats
                    </a>
                </li>
                <li>
                    <a href="/TemplateCv" class="font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                        Template Cv
                    </a>
                </li>
                <li class="flex space-x-4">
                    <a href="/masuk" class="font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                        Masuk
                    </a>
                    <a href="/daftar" class="font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                        Daftar
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Mobile Menu -->
    <ul id="mobile-menu" class="md:hidden hidden flex-col space-y-4 mt-4">
        <li>
            <a href="/" class="font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                Home
            </a>
        </li>
        <li>
            <a href="/about" class="font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                Cv Ats
            </a>
        </li>
        <li>
            <a href="/contact" class="font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                Template Cv
            </a>
        </li>
        <li class="flex flex-col space-y-2">
            <a href="/masuk" class="font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                Masuk
            </a>
            <a href="/daftar" class="font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                Daftar
            </a>
        </li>
    </ul>
</nav>

<script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>