{{-- filepath: d:\Magang\CVNazma\resources\views\partials\pengalaman-kerja.blade.php --}}
<div id="proyekList" class="mb-4">
    <!-- Baris data akan ditampilkan di sini -->
</div>

<div id="proyekForm" class="bg-white p-4 rounded-b-md rounded-t-none border-t-0">
    <div class="mb-4">
        <label class="block text-gray-700">Proyek</label>
        <input type="text" id="projectName" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>
    <div class="mb-4">
            <label class="block text-gray-700">Posisi</label>
            <input type="text" id="projectPosition" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-gray-700">Tanggal Mulai</label>
            <input type="date" id="projectStartDate" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>
        <div>
            <label class="block text-gray-700">Tanggal Selesai</label>
            <input type="date" id="projectEndDate" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>
    </div>
    <div class="mb-4">
        <label class="inline-flex items-center">
            <input type="checkbox" id="isPresent" class="form-checkbox h-5 w-5 text-orange-500" onclick="toggleEndDate()">
            <span class="ml-2 text-gray-700">Saat ini saya belajar di sini</span>
        </label>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Deskripsi</label>
        <textarea id="projectDescription" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></textarea>
    </div>
    <div class="flex justify-end mt-4 space-x-2">
    <button type="button"  onclick="saveDataProyek()" class="px-4 py-2 rounded-md font-semibold flex items-center" style="background-color: #FFBC5D; color: #01287E; gap: 0.25rem;">
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