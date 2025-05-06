{{-- filepath: d:\Magang\CVNazma\resources\views\partials\pendidikan.blade.php --}}
<div id="pendidikanForm" class="bg-gray-100 p-4 rounded-md hidden">
    <div class="mb-4">
        <label class="block text-gray-700">Institusi</label>
        <input type="text" id="educationInstitution" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Gelar</label>
        <input type="text" id="educationDegree" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
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
    <div class="flex justify-end mt-4 space-x-2">
        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md flex items-center" onclick="resetForm('pendidikan')">
            Hapus
        </button>
        <button type="button" class="bg-orange-500 text-white px-4 py-2 rounded-md flex items-center" onclick="saveData('pendidikan')">
            Simpan
        </button>
    </div>
</div>