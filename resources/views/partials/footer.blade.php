{{-- filepath: resources/views/partials/footer.blade.php --}}
<footer class="bg-[#01287E] text-white py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">

            <img class="mt-24 absolute left-0 h-[250px]" src="{{ asset('images/logo kotak.png') }}" alt="Logo" class="mx-auto md:mx-0 mb-0">
            
            <!-- Logo and Description -->
            <div class="text-center md:text-left mb-4 md:mb-0">
                <img src="{{ asset('images/Nazma.png') }}" alt="Logo" class="mx-auto md:mx-0 mb-2">
                <p class="mt-2 text-sm">
                    Bersama NaZMaLogy Berinovasi Mewujudkan Mimpi, Ubah Impian Menjadi Kenyataan Dengan Platform Pembelajaran Interaktif Dan Inovatif.
                </p>
            </div>

            <!-- Contact Icons -->
            <div class="flex space-x-4 mb-4 md:mb-0">
                <p class="text-lg font-bold text-center">Kontak Kami</p>
                <a href="#" class="text-white hover:text-gray-300">
                    <i class="fas fa-envelope"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-300">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-300">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-300">
                    <i class="fab fa-tiktok"></i>
                </a>
                <a href="#" class="text-white hover:text-gray-300">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
        <br>
        <br>
        <hr class="border-white my-4">

        <div class="flex flex-col md:flex-row justify-between items-center text-sm space-y-4 md:space-y-0">
            <!-- Copyright -->
            <p class="text-center md:text-left mb-4 md:mb-0">
            &copy; Copyright {{ date('Y') }}. - Develop By <span class="font-bold">NaZMa Office</span>.
            </p>

            <!-- Links -->
            <div class="flex space-x-8">
            <a href="#" class="hover:underline">Tentang Kami</a>
            <a href="#" class="hover:underline">Term and Condition</a>
            <a href="#" class="hover:underline">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>