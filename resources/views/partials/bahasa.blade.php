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
    <button type="button"  onclick="saveDataBahasa()" class="px-4 py-2 rounded-md font-semibold flex items-center" style="background-color: #FFBC5D; color: #01287E; gap: 0.25rem;">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
            <!-- File body -->
            <path d="M4 2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7.5a2 2 0 0 0-.586-1.414l-4.5-4.5A2 2 0 0 0 9.5 2H4z" fill="#01287E"/>
            <!-- Folded corner -->
            <path d="M16 7h-4a1 1 0 0 1-1-1V2" fill="#FFBC5D"/>
            <!-- Outline -->
            <path d="M4 2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7.5a2 2 0 0 0-.586-1.414l-4.5-4.5A2 2 0 0 0 9.5 2H4z" stroke="#01287E" stroke-width="1.2"/>
        </svg>
        Simpan
    </button>
    </div>
</div>