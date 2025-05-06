{{-- filepath: d:\Magang\CVNazma\resources\views\partials\profil.blade.php --}}
<div id="profilForm" class="bg-gray-100 p-4 rounded-md hidden">
    <div class="mb-4">
        <label class="block text-gray-700">Nama Lengkap</label>
        <input type="text" id="fullName" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Alamat</label>
        <textarea id="address" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></textarea>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Nomor Telepon</label>
        <input type="text" id="phoneNumber" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>
    <div class="flex justify-end mt-4 space-x-2">
        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md flex items-center" onclick="resetForm('profil')">
            Hapus
        </button>
        <button type="button" class="bg-orange-500 text-white px-4 py-2 rounded-md flex items-center" onclick="saveData('profil')">
            Simpan
        </button>
    </div>
</div>