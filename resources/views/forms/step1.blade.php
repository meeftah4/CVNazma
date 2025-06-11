<div id="step-1" class="bg-white p-6 rounded-lg shadow-lg step">
    <h2 class="text-xl font-bold mb-4" style="color:#01287E; border-bottom:1px solid #E5E7EB; padding-bottom:0.5rem;">
        Masukkan detail pribadi
    </h2>

    <div class="mb-4">
        <label class="block font-normal mb-1" style="color:#01287E;">Nama lengkap</label>
        <input type="text" id="nameInput" name="name" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        <span id="nameError" class="text-red-500 text-sm hidden">Nama lengkap wajib di isi!</span>
    </div>

    <div class="mb-4 flex gap-4">
        <div class="w-1/2">
            <label class="block font-normal mb-1" style="color:#01287E;">Alamat Email</label>
            <input type="email" id="emailInput" name="email" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            <span id="emailError" class="text-red-500 text-sm hidden">Alamat Email wajib di isi!</span>
        </div>
        <div class="w-1/2">
            <label class="block font-normal mb-1" style="color:#01287E;">Nomor Handphone</label>
            <input type="text" id="phoneInput" name="phone" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>
    </div>

    <div class="mb-4">
        <label class="block font-normal mb-1" style="color:#01287E;">Alamat</label>
        <textarea id="addressInput" name="address" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required></textarea>
        <span id="addressError" class="text-red-500 text-sm hidden">Alamat wajib di isi!</span>
    </div>

    <div class="mb-6 flex gap-4">
        <div class="w-1/2">
            <label class="block font-normal mb-1" style="color:#01287E;">Linkedin Profile URL</label>
            <input type="url" id="linkedinInput" name="linkedin" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>
        <div class="w-1/2">
            <label class="block font-normal mb-1" style="color:#01287E;">Portfolio/Website URL</label>
            <input type="url" id="portfolioInput" name="portfolio" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>
    </div>

    <div class="flex justify-center">
        <button type="button" onclick="saveStep1AndGoToStep2()" 
            style="background:#FFBC5D; color:#01287E;" 
            class="font-bold px-6 py-2 rounded-md shadow transition hover:brightness-95">
            Langkah Selanjutnya
        </button>
    </div>
</div>

<script>
function saveStep1AndGoToStep2() {
    // Validasi wajib isi
    let valid = true;

    const name = document.getElementById('nameInput')?.value.trim();
    const email = document.getElementById('emailInput')?.value.trim();
    const address = document.getElementById('addressInput')?.value.trim();

    // Tampilkan/hilangkan pesan error
    document.getElementById('nameError').classList.toggle('hidden', !!name);
    document.getElementById('emailError').classList.toggle('hidden', !!email);
    document.getElementById('addressError').classList.toggle('hidden', !!address);

    if (!name || !email || !address) {
        valid = false;
    }

    if (!valid) return;

    // Pastikan window.tempData dan profil ada
    window.tempData = window.tempData || {};
    window.tempData.profil = window.tempData.profil || [{}];
    window.tempData.profil[0] = {
        name,
        email,
        phone: document.getElementById('phoneInput')?.value || '',
        address,
        linkedin: document.getElementById('linkedinInput')?.value || '',
        portfolio: document.getElementById('portfolioInput')?.value || '',
        description: window.tempData.profil?.[0]?.description || '',
        photoUrl: window.tempData.profil?.[0]?.photoUrl || ''
    };
    // Simpan ke session
    if (typeof window.updateSessionCV === 'function') {
        window.updateSessionCV();
    }
    // Lanjut ke step 2
    if (typeof goToStep === 'function') {
        goToStep(2);
    }
}
</script>