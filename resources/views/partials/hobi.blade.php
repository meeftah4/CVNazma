{{-- filepath: d:\Magang\CVNazma\resources\views\partials\bahasa.blade.php --}}
<div id="bahasaForm" class="bg-gray-100 p-4 rounded-md hidden">
    <div class="mb-4">
        <label class="block text-gray-700">Bahasa</label>
        <input type="text" id="languageName" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Tingkat Kemampuan</label>
        <select id="languageLevel" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            <option value="Dasar">Dasar</option>
            <option value="Menengah">Menengah</option>
            <option value="Lancar">Lancar</option>
        </select>
    </div>
    <div class="flex justify-end mt-4 space-x-2">
        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md flex items-center" onclick="resetForm('bahasa')">
            Hapus
        </button>
        <button type="button" class="bg-orange-500 text-white px-4 py-2 rounded-md flex items-center" onclick="saveData('bahasa')">
            Simpan
        </button>
    </div>
</div>