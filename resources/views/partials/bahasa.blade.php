{{-- filepath: d:\Magang\CVNazma\resources\views\partials\bahasa.blade.php --}}
<div id="bahasaList" class="mb-4">
    <!-- Baris data akan ditampilkan di sini -->
</div>
<div id="bahasaForm" class="bg-white p-4 rounded-b-md rounded-t-none border-t-0">
    <div class="mb-4">
        <label class="block text-gray-700">Bahasa</label>
        <input type="text" id="languageName" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>
    <div class="flex justify-end mt-4 space-x-2">
        <button type="button" class="bg-orange-500 text-white px-4 py-2 rounded-md flex items-center" onclick="saveDataBahasa()">
            Simpan
        </button>
    </div>
</div>