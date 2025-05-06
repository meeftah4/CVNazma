{{-- filepath: d:\Magang\CVNazma\resources\views\forms\partials\pengalaman-kerja.blade.php --}}
<div id="pengalamankerjaForm" class="bg-gray-100 p-4 rounded-md hidden">
    <div class="mb-4">
        <label class="block text-gray-700">Nama Perusahaan</label>
        <input type="text" id="companyName" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-gray-700">Posisi Kerja</label>
            <input type="text" id="jobPosition" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>
        <div>
            <label class="block text-gray-700">Kota</label>
            <input type="text" id="jobCity" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>
    </div>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-gray-700">Tanggal Mulai</label>
            <input type="date" id="startDate" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>
        <div>
            <label class="block text-gray-700">Tanggal Selesai</label>
            <input type="date" id="endDate" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Deskripsi</label>
        <textarea id="jobDescription" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></textarea>
    </div>
    <div class="flex justify-end mt-4 space-x-2">
        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md flex items-center" onclick="resetForm('pengalamankerja')">
            Hapus
        </button>
        <button type="button" class="bg-orange-500 text-white px-4 py-2 rounded-md flex items-center" onclick="saveData('pengalamankerja')">
            Simpan
        </button>
    </div>
</div>