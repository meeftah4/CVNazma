{{-- filepath: resources/views/partials/footer.blade.php --}}
<footer class="bg-[#01287E] text-white overflow-hidden">
    <img class="absolute left-0 h-[250px] hidden md:block" src="{{ asset('images/logo kotak.png') }}" alt="Logo Background">

    <div class="container mx-auto px-4 w-11/12 lg:w-10/12 py-8">
        <!-- Konten utama footer -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-start items-center text-center md:text-left relative">
            <!-- Logo dan Deskripsi -->
            <div class="md:w-1/2 w-full mb-8 md:mb-0 md:ml-24">
                <img src="{{ asset('images/Nazma.png') }}" alt="Logo" class="mx-auto md:mx-0 mb-4">
                <p class="text-sm px-4 md:px-0">
                    Bersama NaZMaLogy Berinovasi Mewujudkan Mimpi, Ubah Impian Menjadi Kenyataan Dengan Platform Pembelajaran Interaktif Dan Inovatif.
                </p>
            </div>

            <!-- Kontak Kami dan Sosmed -->
            <div class="md:w-1/2 w-full flex flex-col items-center md:items-end">
                <p class="text-lg font-bold mb-4">Kontak Kami</p>
                <div class="flex justify-center md:justify-end space-x-4">
                    <a href="#" class="text-white hover:text-gray-300">
                        <img src="{{ asset('images/mail.png') }}" alt="Email Icon" class="h-6 w-6">
                    </a>
                    <a href="#" class="text-white hover:text-gray-300">
                        <img src="{{ asset('images/instagram.png') }}" alt="Instagram Icon" class="h-6 w-6">
                    </a>
                    <a href="#" class="text-white hover:text-gray-300">
                        <img src="{{ asset('images/facebook.png') }}" alt="Facebook Icon" class="h-6 w-6">
                    </a>
                    <a href="#" class="text-white hover:text-gray-300">
                        <img src="{{ asset('images/linkedin.png') }}" alt="LinkedIn Icon" class="h-6 w-6">
                    </a>
                    <a href="#" class="text-white hover:text-gray-300">
                        <img src="{{ asset('images/tiktok.png') }}" alt="TikTok Icon" class="h-6 w-6">
                    </a>
                    <a href="#" class="text-white hover:text-gray-300">
                        <img src="{{ asset('images/youtube.png') }}" alt="YouTube Icon" class="h-6 w-6">
                    </a>
                </div>
            </div>
        </div>

        <!-- Garis dan Footer Bottom -->
        <div class="w-full mt-8 md:ml-24">
            <hr class="border-gray-400 mb-6">
            <div class="flex flex-col md:flex-row justify-between items-center text-sm space-y-4 md:space-y-0 mt-6">
            <p class="text-center md:text-left">
            &copy; Copyright {{ date('Y') }} - Develop By <span class="font-bold">NaZMa Office</span>.
            </p>
            <div class="flex flex-wrap justify-center md:justify-start space-x-4">
            <a href="#" class="hover:underline">Tentang Kami</a>
            <a href="#" class="hover:underline">Term and Condition</a>
            <a href="#" class="hover:underline">Privacy Policy</a>
            </div>
            </div>
        </div>
    </div>
</footer>
