<div id="pendidikanList" class="mb-4">
    <!-- Baris data akan ditampilkan di sini -->
</div>

<div id="pendidikanForm" class="bg-gray-100 p-4 rounded-md">
    <div class="mb-4">
        <label class="block text-gray-700">Sekolah</label>
        <input type="text" id="educationInstitution" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-gray-700">Gelar</label>
            <input type="text" id="educationDegree" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>
        <div>
            <label class="block text-gray-700">Kota</label>
            <input type="text" id="educationCity" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>
    </div>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-gray-700">Tanggal Mulai</label>
            <input type="date" id="educationStartDate" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>
        <div>
            <label class="block text-gray-700">Tanggal Selesai</label>
            <input type="date" id="educationEndDate" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
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
        <textarea id="educationDescription" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></textarea>
    </div>
    <div class="flex justify-end mt-4 space-x-2">
        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md flex items-center" onclick="resetForm('pendidikan')">
            Hapus
        </button>
        <button type="button" class="bg-orange-500 text-white px-4 py-2 rounded-md flex items-center" onclick="saveDataPendidikan()">
            Simpan
        </button>
    </div>
</div>