{{-- filepath: d:\Magang\CVNazma\resources\views\partials\keahlian.blade.php --}}
<div id="keahlianForm" class="bg-gray-100 p-4 rounded-md">
    <div class="mb-4">
        <label class="block text-gray-700">Keahlian</label>
        <input type="text" id="skillName" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
    </div>
    <div class="flex justify-end mt-4 space-x-2">
        <button type="button" class="bg-orange-500 text-white px-4 py-2 rounded-md" onclick="saveDataKeahlian()">
            Simpan
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    attachLivePreview('keahlian');
});
</script>