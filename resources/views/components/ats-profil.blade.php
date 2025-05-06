<!-- filepath: d:\Magang\CVNazma\resources\views\components\ats-profil.blade.php -->
<h1 class="profile-title">CV Ats Saya</h1>
<div class="profile-ats">
    <div class="flex items-start space-x-4">
        <!-- Logo di kiri -->
        <div class="bg-gray-200 rounded-[10px] p-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                <path fill="#01287E" d="M13 9h5.5L13 3.5zM6 2h8l6 6v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4c0-1.11.89-2 2-2m9 16v-2H6v2zm3-4v-2H6v2z"/>
            </svg>
        </div>

        <!-- Konten di kanan -->
        <div class="flex flex-col">

            <!-- Tulisan -->
            <h2 class="text-lg font-semibold text-[#01287E] font-bold text-left">Cv Ats satu</h2>

            <!-- Dibuat pada -->
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/time-wait.png') }}" alt="Logo" class="w-4 h-4 rounded-full">
                <p class="text-sm text-gray-500">Dibuat pada: 31 Mei 2024</p>
            </div>

            <!-- Tombol aksi -->
            <div class="flex items-center space-x-2 mt-4">
                <a href="#" class="flex items-center bg-gray-200 text-[#01287E] font-bold rounded-[5px] hover:bg-white text-[12px] px-2 py-1">                                
                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                        <path fill="currentColor" d="m12 16l-5-5l1.4-1.45l2.6 2.6V4h2v8.15l2.6-2.6L17 11zm-6 4q-.825 0-1.412-.587T4 18v-3h2v3h12v-3h2v3q0 .825-.587 1.413T18 20z"/>
                    </svg>
                    Download
                </a>
                <a href="#" class="flex items-center bg-gray-200 text-[#01287E] font-bold rounded-[5px] hover:bg-white text-[12px] px-2 py-1">
                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                            <path d="M21.544 11.045c.304.426.456.64.456.955c0 .316-.152.529-.456.955C20.178 14.871 16.689 19 12 19c-4.69 0-8.178-4.13-9.544-6.045C2.152 12.529 2 12.315 2 12c0-.316.152-.529.456-.955C3.822 9.129 7.311 5 12 5c4.69 0 8.178 4.13 9.544 6.045"/>
                            <path d="M15 12a3 3 0 1 0-6 0a3 3 0 0 0 6 0"/>
                        </g>
                    </svg>
                    Lihat
                </a>
                <a href="#" class="flex items-center bg-gray-200 text-[#01287E] font-bold rounded-[5px] hover:bg-white text-[12px] px-2 py-1">
                    <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6z"/>
                    </svg>
                    Hapus
                </a>
            </div>
        </div>
    </div>
</div>