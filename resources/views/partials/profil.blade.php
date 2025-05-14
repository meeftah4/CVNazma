{{-- filepath: d:\Magang\CVNazma\resources\views\partials\profil.blade.php --}}
<div id="profilForm" class="bg-gray-100 p-4 rounded-md">
    <div id="profilList" class="mb-4">
        <!-- Baris data akan ditampilkan di sini -->
    </div>
    <div class="mb-4">
        <label class="block text-gray-700">Deskripsi</label>
        <textarea id="descriptionInput" placeholder="Masukkan deskripsi profil Anda" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></textarea>
    </div>
    <div class="flex justify-end mt-4 space-x-2">
        <button type="button" class="bg-orange-500 text-white px-4 py-2 rounded-md" onclick="saveData('profil')">Simpan</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        attachLivePreview('profil'); // Aktifkan live preview untuk profil
    });
</script>