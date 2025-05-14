{{-- filepath: d:\Magang\CVNazma\resources\views\forms\step2.blade.php --}}
<style>
/* Membatasi tinggi elemen daftar dan membuatnya expand */
#profilList, #pengalamankerjaList, #proyekList, #keahlianList, #pendidikanList, #bahasaList, #sertifikatList, #hobiList {
    max-height: none; /* Tidak ada batas tinggi */
    overflow-y: visible; /* Biarkan konten meluas ke bawah */
}

/* Membungkus teks panjang di elemen daftar */
.break-words {
    word-wrap: break-word;
    overflow-wrap: break-word;
    white-space: normal; /* Pastikan teks tidak dalam satu baris */
    word-break: break-all; /* Memaksa pemecahan kata panjang agar tidak overflow horizontal */
}
</style>

@vite('resources/js/forms/base.js')
@vite('resources/js/forms/profil.js')
@vite('resources/js/forms/pengalamankerja.js')
@vite('resources/js/forms/proyek.js')
@vite('resources/js/forms/keahlian.js')
@vite('resources/js/forms/pendidikan.js')
@vite('resources/js/forms/bahasa.js')
@vite('resources/js/forms/sertifikat.js')
@vite('resources/js/forms/hobi.js')

{{-- resources/views/forms/step2.blade.php --}}
<div id="step-2" class="step hidden">
    <h2 class="text-xl mb-4">Langkah 2: Informasi Tambahan</h2>

    @foreach (['Profil', 'Pengalaman Kerja', 'Proyek', 'Keahlian', 'Pendidikan', 'Bahasa', 'Sertifikat', 'Hobi'] as $field)
        <div class="mb-4">
            <button type="button" class="w-full flex justify-between items-center py-2 px-4 bg-white border rounded-md shadow" onclick="toggleDropdown('{{ strtolower(str_replace(' ', '', $field)) }}')">
                <span>{{ $field }}</span>
                <span class="text-blue-500 font-bold">+</span>
            </button>
            <div id="{{ strtolower(str_replace(' ', '', $field)) }}Dropdown" class="hidden mt-2">
                <div id="{{ strtolower(str_replace(' ', '', $field)) }}List" class="bg-gray-100 p-4 rounded-md">
                    <!-- Data sementara akan ditampilkan di sini -->
                </div>
                @include('partials.' . strtolower(str_replace(' ', '-', $field)))
            </div>
        </div>
    @endforeach

    <div class="mb-4">
        <label class="block text-gray-700">Tambahkan Foto</label>
        <div class="flex items-center">
            <button class="flex flex-col items-center justify-center w-24 h-24 bg-gray-100 border rounded shadow">
                <span class="text-sm text-gray-500">Tambahkan foto</span>
            </button>
        </div>
    </div>

    <button type="button" onclick="goToStep(3)" class="bg-orange-500 text-white px-4 py-2 rounded-md">
        Langkah Selanjutnya
    </button>
</div>