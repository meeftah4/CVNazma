{{-- resources/views/partials/form-pendidikan.blade.php --}}
<div class="space-y-3">
    <input name="school" placeholder="Sekolah" class="form-input w-full" />

    <div class="grid grid-cols-2 gap-3">
        <input name="degree" placeholder="Gelar" class="form-input" />
        <input name="city" placeholder="Kota" class="form-input" />
    </div>

    <div class="grid grid-cols-2 gap-3">
        <input name="start_date" placeholder="Tanggal Mulai" type="month" class="form-input" />
        <input name="end_date" placeholder="Tanggal Selesai" type="month" class="form-input" />
    </div>

    <textarea name="description" rows="3" class="form-textarea w-full" placeholder="Deskripsi..."></textarea>

    <div class="flex justify-between items-center">
        <button type="button" class="text-sm text-blue-900 font-medium flex items-center gap-1">
            <span class="text-lg">+</span> Tambahkan pendidikan lain
        </button>

        <div class="flex gap-2">
            <button class="bg-red-100 hover:bg-red-200 text-red-700 px-4 py-2 rounded">Hapus</button>
            <button class="bg-orange-400 hover:bg-orange-500 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </div>
</div>
