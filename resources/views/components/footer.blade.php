{{-- filepath: resources/views/partials/footer.blade.php --}}
<footer class="bg-[#01287E] text-white">
    <img class="absolute left-0 h-[250px] hidden md:block" src="{{ asset('images/logo kotak.png') }}" alt="Logo">
    <div class="container mx-auto px-4 w-full py-8">
        <div class="flex flex-col md:flex-row justify-between items-center relative">
            <!-- Logo and Description -->
            <div class="w-full text-center md:text-left md:ml-40">
                <div class="flex flex-col md:flex-row justify-between items-start mb-4">
                    <!-- Logo and Description -->
                    <div class="flex-1">
                        <img src="{{ asset('images/Nazma.png') }}" alt="Logo" class="mx-auto md:mx-0 mb-2">
                        <p class="mt-2 text-sm px-4 md:px-0">
                            Bersama NaZMaLogy Berinovasi Mewujudkan Mimpi, Ubah Impian Menjadi Kenyataan Dengan Platform Pembelajaran Interaktif Dan Inovatif.
                        </p>
                    </div>

                    <!-- Kontak Kami -->
                    <div class="flex-1 mt-4 md:mt-0 md:text-right">
                        <p class="text-lg font-bold mr-14 mt-5">Kontak Kami</p>
                        <div class="flex justify-center md:justify-end space-x-4 mt-5">
                            <a href="#" class="text-white hover:text-gray-300">
                                <img src="{{ asset('images/mail.png') }}" alt="Email Icon" class="h-6 w-6">
                            </a>
                            <a href="#" class="text-white hover:text-gray-300">
                                <img src="{{ asset('images/instagram.png') }}" alt="Email Icon" class="h-6 w-6">
                            </a>
                            <a href="#" class="text-white hover:text-gray-300">
                                <img src="{{ asset('images/facebook.png') }}" alt="Email Icon" class="h-6 w-6">
                            </a>
                            <a href="#" class="text-white hover:text-gray-300">
                                <img src="{{ asset('images/linkedin.png') }}" alt="Email Icon" class="h-6 w-6">
                            </a>
                            <a href="#" class="text-white hover:text-gray-300">
                                <img src="{{ asset('images/tiktok.png') }}" alt="Email Icon" class="h-6 w-6">
                            </a>
                            <a href="#" class="text-white hover:text-gray-300">
                                <img src="{{ asset('images/youtube.png') }}" alt="Email Icon" class="h-6 w-6">
                            </a>
                        </div>
                    </div>
                </div>

                <hr class="border-white my-4 mt-10">

                <!-- Footer Bottom -->
                <div class="flex flex-col md:flex-row justify-between items-center text-sm space-y-4 md:space-y-0">
                    <!-- Copyright -->
                    <p class="text-center md:text-left px-4 md:px-0">
                        &copy; Copyright {{ date('Y') }}. - Develop By <span class="font-bold">NaZMa Office</span>.
                    </p>

                    <!-- Links -->
                    <div class="flex flex-wrap justify-center md:justify-start space-x-4">
                        <a href="#" class="hover:underline">Tentang Kami</a>
                        <a href="#" class="hover:underline">Term and Condition</a>
                        <a href="#" class="hover:underline">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
