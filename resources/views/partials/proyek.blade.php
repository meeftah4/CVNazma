<div id="proyekList" class="mb-4">
    <!-- Baris data akan ditampilkan di sini -->
</div>

{{-- filepath: d:\Magang\CVNazma\resources\views\partials\pengalaman-kerja.blade.php --}}
<div id="proyekForm" class="bg-gray-100 p-4 rounded-md hidden">
    <div class="mb-4">
        <label class="block text-gray-700">Proyek</label>
        <input type="text" id="projectName" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>
    <div class="grid grid-cols-2 gap-4 mb-4">
    <div class="mb-4">
            <label class="block text-gray-700">Posisi</label>
            <input type="text" id="projectPosition" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>
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
        <button type="button" class="bg-orange-500 text-white px-4 py-2 rounded-md flex items-center" onclick="saveDataProyek()">
            Simpan
        </button>
    </div>
</div>