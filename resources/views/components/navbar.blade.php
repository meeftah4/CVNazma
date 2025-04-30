{{-- filepath: d:\Magang\CVNazma\resources\views\components\navbar.blade.php --}}
<nav class="p-6 text-lg bg-white shadow-md">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/Logo Nazma.png') }}" alt="Logo" class="h-8">
            </a>

            <!-- Navigation Links -->
            <ul class="hidden md:flex md:justify-center md:space-x-8 items-center flex-grow">
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
            </ul>
            <div class="hidden md:flex md:space-x-4 items-center">
                <button id="open-login-modal" class="font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                    Masuk
                </button>
                <button id="open-register-modal" class="font-kantumruy text-[20px] font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                    Daftar
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Login Modal -->
<div id="login-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden rounded-[20px]">
    <div class="bg-white shadow-lg w-[95%] md:w-[800px] md:h-[600px] relative flex rounded-[10px]">
        <!-- Left Side (Illustration) -->
        <div class="hidden md:block w-1/2 bg-white p-8 rounded-l-[10px] pt-14 pb-14 pl-14">
            <div class="flex items-center justify-center h-full">
                <img src="{{ asset('images/Masuk.jpg') }}" alt="Illustration" class="object-cover" style="max-height: 300px;">
            </div>
        </div>

        <!-- Right Side (Form) -->
        <div class="w-full md:w-1/2 p-8 bg-[#F4F8FF] rounded-r-[10px] pt-14 pb-14 pr-14">
            <div class="flex justify-center items-center mb-6 border border-[#EEECEC] bg-[#EEECEC] p-4 mx-auto"
                style="width: 300px; height: 60px; border-radius: var(--rounded, 25px);">
                <button id="switch-to-register-modal" class="text-lg font-bold text-blue-900 bg-[#EEECEC] hover:bg-[#FFBC5D] transition duration-300 p-3 rounded-[20px]" style="width: 150px; height: 50px;">
                    Daftar
                </button>
                <button class="text-lg font-bold text-blue-900 bg-[#FFBC5D] hover:bg-[#f9dcb2] transition duration-300 p-3 rounded-[20px]" style="width: 150px; height: 50px;">
                    Masuk
                </button>
            </div>
            <form class="mt-16" action="/masuk" method="POST">
                @csrf
                <div class="mb-6 relative">
                    <input type="email" id="email" name="email" class="w-full bg-[#EEECEC] rounded-lg p-3 border-0" placeholder="Email" required>
                </div>
                <div class="mb-6 relative">
                    <input type="password" id="password" name="password" class="w-full bg-[#EEECEC] rounded-lg p-3 border-0" placeholder="Password" required>
                </div>
                <button type="submit" class="mt-16 bg-[#FFBC5D] text-[#01287E] font-bold text-[20px] p-[10px_50px] rounded-[20px] hover:bg-[#FFA947] transition duration-300 mt-6 mx-auto block">
                    Masuk
                </button>
            </form>
            <p class="text-center mt-6 text-gray-500">Atau masuk dengan</p>
            <button class="w-full bg-gray-100 text-gray-700 py-3 rounded-lg hover:bg-gray-200 transition duration-300 mt-4 flex items-center justify-center">
                <img src="{{ asset('images/google_logo.png') }}" alt="Google" class="w-6 h-6 mr-3">
                Masuk dengan Google
            </button>
        </div>
        <button id="close-login-modal" class="absolute top-4 right-4 text-[#01287E] hover:bg-red-500 hover:text-white hover:border-white text-2xl w-6 h-6 flex items-center justify-center rounded-full border border-[#01287E] transition duration-300">
            &times;
        </button>
    </div>
</div>

<!-- Register Modal -->
<div id="register-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden rounded-[20px]">
    <div class="bg-white shadow-lg w-[95%] md:w-[800px] md:h-[600px] relative flex rounded-[10px]">
        <!-- Left Side (Illustration) -->
        <div class="hidden md:block w-1/2 bg-white p-8 rounded-l-[10px] pt-14 pb-14 pl-14">
            <div class="flex items-center justify-center h-full">
                <img src="{{ asset('images/Daftar.jpg') }}" alt="Illustration" class="object-cover" style="max-height: 300px;">
            </div>
        </div>

        <!-- Right Side (Form) -->
        <div class="w-full md:w-1/2 p-8 bg-[#F4F8FF] rounded-r-[10px] pt-14 pb-14 pr-14">
            <div class="flex justify-center items-center mb-6 border border-[#EEECEC] bg-[#EEECEC] p-4 mx-auto"
                style="width: 300px; height: 60px; border-radius: var(--rounded, 25px);">
                <button class="text-lg font-bold text-blue-900 bg-[#FFBC5D] hover:bg-[#f9dcb2] transition duration-300 p-3 rounded-[20px]" style="width: 150px; height: 50px;">
                    Daftar
                </button>
                <button id="switch-to-login-modal" class="text-lg font-bold text-blue-900 bg-[#EEECEC] hover:bg-[#FFBC5D] transition duration-300 p-3 rounded-[20px]" style="width: 150px; height: 50px;">
                    Masuk
                </button>
            </div>
            <form class="mt-8" action="/daftar" method="POST">
                @csrf
                <div class="mb-6 relative">
                    <input type="text" id="name" name="name" class="w-full bg-[#EEECEC] rounded-lg p-3 border-0" placeholder="Nama" required>
                </div>
                <div class="mb-6 relative">
                    <input type="email" id="email" name="email" class="w-full bg-[#EEECEC] rounded-lg p-3 border-0" placeholder="Email" required>
                </div>
                <div class="mb-6 relative">
                    <input type="password" id="password" name="password" class="w-full bg-[#EEECEC] rounded-lg p-3 border-0" placeholder="Password" required>
                </div>
                <button type="submit" class="bg-[#FFBC5D] text-[#01287E] font-bold text-[20px] p-[10px_50px] rounded-[20px] hover:bg-[#FFA947] transition duration-300 mt-6 mx-auto block">
                    Daftar
                </button>
            </form>
            <p class="text-center mt-6 text-gray-500">Atau daftar dengan</p>
            <button class="w-full bg-gray-100 text-gray-700 py-3 rounded-lg hover:bg-gray-200 transition duration-300 mt-4 flex items-center justify-center">
                <img src="{{ asset('images/google_logo.png') }}" alt="Google" class="w-6 h-6 mr-3">
                Daftar dengan Google
            </button>
        </div>
        <button id="close-register-modal" class="absolute top-4 right-4 text-[#01287E] hover:bg-red-500 hover:text-white hover:border-white text-2xl w-6 h-6 flex items-center justify-center rounded-full border border-[#01287E] transition duration-300">
            &times;
        </button>
    </div>
</div>


<script>
    const loginModal = document.getElementById('login-modal');
    const registerModal = document.getElementById('register-modal');
    const openLoginModal = document.getElementById('open-login-modal');
    const openRegisterModal = document.getElementById('open-register-modal');
    const closeLoginModal = document.getElementById('close-login-modal');
    const closeRegisterModal = document.getElementById('close-register-modal');
    const switchToRegisterModal = document.getElementById('switch-to-register-modal');
    const switchToLoginModal = document.getElementById('switch-to-login-modal');

    openLoginModal.addEventListener('click', () => {
        loginModal.classList.remove('hidden');
    });

    openRegisterModal.addEventListener('click', () => {
        registerModal.classList.remove('hidden');
    });

    closeLoginModal.addEventListener('click', () => {
        loginModal.classList.add('hidden');
    });

    closeRegisterModal.addEventListener('click', () => {
        registerModal.classList.add('hidden');
    });

    switchToRegisterModal.addEventListener('click', () => {
        loginModal.classList.add('hidden');
        registerModal.classList.remove('hidden');
    });

    switchToLoginModal.addEventListener('click', () => {
        registerModal.classList.add('hidden');
        loginModal.classList.remove('hidden');
    });
</script>