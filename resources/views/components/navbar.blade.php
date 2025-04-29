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
<div id="login-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-[90%] md:w-[800px] relative flex">
        <!-- Left Side (Illustration) -->
        <div class="hidden md:block w-1/2 bg-gray-100 p-6">
            <img src="{{ asset('images/login-illustration.png') }}" alt="Illustration" class="w-full h-full object-cover">
        </div>

        <!-- Right Side (Form) -->
        <div class="w-full md:w-1/2 p-6 bg-[#F4F8FF]">
            <div class="flex justify-center items-center mb-4 border border-[#EEECEC] bg-[#EEECEC] p-2 mx-auto"
                style="width: 180px; height: 50px; border-radius: var(--rounded, 20px);">
                <button id="switch-to-register-modal" class="text-lg font-bold text-blue-900 bg-[#EEECEC] hover:bg-[#FFBC5D] transition duration-300 p-3 rounded-[20px]" style="width: 150px; height: 50px;">
                    Daftar
                </button>
                <button class="text-lg font-bold text-blue-900 bg-[#EEECEC] hover:bg-[#FFBC5D] transition duration-300 p-3 rounded-[20px]" style="width: 150px; height: 50px;">
                    Masuk
                </button>
            </div>
            <form action="/masuk" method="POST">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>
            <button type="submit" class="bg-[#FFBC5D] text-[#01287E] font-bold text-[20px] p-[6px_40px] rounded-[15px] hover:bg-[#FFA947] transition duration-300 mt-4 mx-auto block">
                Masuk
            </button>
            </form>
            <p class="text-center mt-4 text-gray-500">Atau masuk dengan</p>
            <button class="w-full bg-gray-100 text-gray-700 py-2 rounded-lg hover:bg-gray-200 transition duration-300 mt-2 flex items-center justify-center">
            <img src="{{ asset('images/google-icon.png') }}" alt="Google" class="w-5 h-5 mr-2">
            Masuk dengan Google
            </button>
        </div>
        <button id="close-login-modal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            &times;
        </button>
    </div>
</div>

<!-- Register Modal -->
<div id="register-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-[90%] md:w-[800px] relative flex">
        <!-- Left Side (Illustration) -->
        <div class="hidden md:block w-1/2 bg-gray-100 p-6">
            <img src="{{ asset('images/register-illustration.png') }}" alt="Illustration" class="w-full h-full object-cover">
        </div>

        <!-- Right Side (Form) -->
        <div class="w-full md:w-1/2 p-6 bg-[#F4F8FF]">
            <div class="flex justify-between mb-4">
                <button class="text-lg font-bold text-orange-500">
                    Daftar
                </button>
                <button id="switch-to-login-modal" class="text-lg font-bold text-blue-900 hover:text-orange-500 transition duration-300">
                    Masuk
                </button>
            </div>
            <form action="/daftar" method="POST">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
                </div>
                <button type="submit" class="bg-[#FFBC5D] text-[#01287E] font-bold text-[20px] p-[6px_40px] rounded-[15px] hover:bg-[#FFA947] transition duration-300 mt-4 mx-auto block">
                    Daftar
                </button>
            </form>
            <p class="text-center mt-4 text-gray-500">Atau daftar dengan</p>
            <button class="w-full bg-gray-100 text-gray-700 py-2 rounded-lg hover:bg-gray-200 transition duration-300 mt-2 flex items-center justify-center">
                <img src="{{ asset('images/google-icon.png') }}" alt="Google" class="w-5 h-5 mr-2">
                Daftar dengan Google
            </button>
        </div>
        <button id="close-register-modal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
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