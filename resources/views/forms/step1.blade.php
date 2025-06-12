@vite(['resources/css/step1.css'])

<div id="step-1" class="step">
    <h2>
        Masukkan detail pribadi
    </h2>

    <div class="mb-4">
        <label>Nama lengkap</label>
        <input type="text" id="nameInput" name="name" required>
        <span id="nameError" class="text-red-500 text-sm hidden">Nama lengkap wajib di isi!</span>
    </div>

    <div class="mb-4 flex gap-4">
        <div class="w-1/2">
            <label>Alamat Email</label>
            <input type="email" id="emailInput" name="email" required>
            <span id="emailError" class="text-red-500 text-sm hidden">Alamat Email wajib di isi!</span>
        </div>
        <div class="w-1/2">
            <label>Nomor Handphone</label>
            <input type="text" id="phoneInput" name="phone">
        </div>
    </div>

    <div class="mb-4">
        <label>Alamat</label>
        <textarea id="addressInput" name="address" rows="3" required></textarea>
        <span id="addressError" class="text-red-500 text-sm hidden">Alamat wajib di isi!</span>
    </div>

    <div class="mb-6 flex gap-4">
        <div class="w-1/2">
            <label>Linkedin Profile URL</label>
            <input type="url" id="linkedinInput" name="linkedin">
        </div>
        <div class="w-1/2">
            <label>Portfolio/Website URL</label>
            <input type="url" id="portfolioInput" name="portfolio">
        </div>
    </div>

    <div class="flex justify-center">
        <button type="button" onclick="saveStep1AndGoToStep2()">
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