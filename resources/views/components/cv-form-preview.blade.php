<div>
<div class="flex flex-col md:flex-row gap-4">
        <!-- Form Section -->
        <div class="w-full md:w-1/2">
            <form id="cvForm" method="POST" action="#">
                @csrf

                @include('forms.step1')
                @include('forms.step2')
            </form>
        </div>

        <!-- Live Preview Section -->
        <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-lg flex flex-col h-full">
            <!-- Konten preview scrollable -->
            <div class="flex-1 overflow-y-auto" style="max-height: 670px;">
                @include('components.view-cv')
            </div>
        </div>
    </div>
</div>



<script>
    function showFormStep(step) {
        document.querySelectorAll('.step').forEach(el => el.classList.add('hidden'));
        const targetStep = document.getElementById('step-' + step);
        if (targetStep) targetStep.classList.remove('hidden');
    }

    function updateContactPreview() {
        const email = document.getElementById('emailInput')?.value || '';
        const phone = document.getElementById('phoneInput')?.value || '';
        const linkedin = document.getElementById('linkedinInput')?.value || '';
        const portfolio = document.getElementById('portfolioInput')?.value || '';

        // Hanya tampilkan field yang diisi
        const contactArr = [];
        if (email) contactArr.push(email);
        if (phone) contactArr.push(phone);
        if (linkedin) contactArr.push(linkedin);
        if (portfolio) contactArr.push(portfolio);

        document.getElementById('previewContact').textContent = contactArr.join(' | ');
    }

    function showTemplateCV() {
        setActiveStep(3); // Panggil stepper global, otomatis switch ke template
    }

    document.addEventListener('DOMContentLoaded', function () {
        showFormStep(1);

        // Live preview update for contact
        ['emailInput', 'phoneInput', 'linkedinInput', 'portfolioInput'].forEach(function(id) {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('input', updateContactPreview);
            }
        });

        updateContactPreview();

        document.getElementById('nameInput')?.addEventListener('input', function(e) {
            document.getElementById('previewName').textContent = e.target.value || 'Nama Lengkap';
        });

        document.getElementById('addressInput')?.addEventListener('input', function(e) {
            document.getElementById('previewAddress').textContent = e.target.value || 'Jakarta, Indonesia';
        });

        // Ambil data session dari backend dan isi form
        fetch('/cv/get-session')
            .then(res => res.json())
            .then(data => {
                window.tempData = data || {};
                // Isi Step 1
                document.getElementById('nameInput').value = data.profil?.[0]?.name || '';
                document.getElementById('emailInput').value = data.profil?.[0]?.email || '';
                document.getElementById('phoneInput').value = data.profil?.[0]?.phone || '';
                document.getElementById('addressInput').value = data.profil?.[0]?.address || '';
                document.getElementById('linkedinInput').value = data.profil?.[0]?.linkedin || '';
                document.getElementById('portfolioInput').value = data.profil?.[0]?.portfolio || '';
                // Isi Step 2 (jika ada input lain, lakukan hal serupa)
                // Isi foto
                if (data.foto) {
                    document.getElementById('photoPreview').src = data.foto;
                    document.getElementById('photoPreview').classList.remove('hidden');
                    document.getElementById('photoIcon').classList.add('hidden');
                    document.getElementById('cvPhotoPreview').src = data.foto;
                    document.getElementById('cvPhotoPreview').classList.remove('hidden');
                    document.getElementById('removePhotoBtn').classList.remove('hidden');
                }
                // Update preview
                updateContactPreview();
                document.getElementById('previewName').textContent = data.profil?.[0]?.name || 'Nama Lengkap';
                document.getElementById('previewAddress').textContent = data.profil?.[0]?.address || 'Jakarta, Indonesia';

                // Tambahan: Render ulang semua data step 2 dari session
                if (window.renderPengalamanKerja) window.renderPengalamanKerja();
                if (window.renderProyek) window.renderProyek();
                if (window.renderKeahlian) window.renderKeahlian();
                if (window.renderPendidikan) window.renderPendidikan();
                if (window.renderBahasa) window.renderBahasa();
                if (window.renderSertifikat) window.renderSertifikat();
                if (window.renderHobi) window.renderHobi();
                if (window.renderDataRow) window.renderDataRow('profil');
            });
    });
    
    // Helper untuk update window.tempData.profil dari input step 1
    function updateProfilTempData() {
        window.tempData = window.tempData || {};
        window.tempData.profil = window.tempData.profil || [{}];
        window.tempData.profil[0] = {
            name: document.getElementById('nameInput')?.value || '',
            email: document.getElementById('emailInput')?.value || '',
            phone: document.getElementById('phoneInput')?.value || '',
            address: document.getElementById('addressInput')?.value || '',
            linkedin: document.getElementById('linkedinInput')?.value || '',
            portfolio: document.getElementById('portfolioInput')?.value || '',
            description: window.tempData.profil?.[0]?.description || '',
            photoUrl: window.tempData.profil?.[0]?.photoUrl || ''
        };
    }

    // Update photoUrl di tempData.profil[0] saat upload foto
    function updatePhotoTempData(url) {
        window.tempData = window.tempData || {};
        window.tempData.profil = window.tempData.profil || [{}];
        window.tempData.profil[0].photoUrl = url;
    }

    function updateProfilTempDataAndSession() {
        updateProfilTempData();
        window.updateSessionCV();
    }

    // Pasang event listener ke semua input step 1
    ['nameInput','emailInput','phoneInput','addressInput','linkedinInput','portfolioInput'].forEach(function(id){
        const el = document.getElementById(id);
        if (el) el.addEventListener('input', updateProfilTempDataAndSession);
    });

    // Saat upload foto, update juga ke tempData dan session
    const photoInput = document.getElementById('photoInput');
    if (photoInput) {
        photoInput.addEventListener('change', function(e){
            const file = e.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    updatePhotoTempData(ev.target.result);
                    window.updateSessionCV();
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Jika ada live edit profil (deskripsi) di step2, update juga tempData.profil[0].description
    if (window.attachLivePreview) {
        window.attachLivePreview('profil');
        // Patch saveData untuk update tempData.profil[0].description
        const origSaveData = window.saveData;
        window.saveData = function(id) {
            origSaveData(id);
            // Sinkronkan description ke tempData.profil[0]
            if (id === 'profil') {
                window.tempData.profil = window.tempData.profil || [{}];
                window.tempData.profil[0].description = document.getElementById('descriptionInput')?.value || '';
                window.updateSessionCV();
            }
        };
    }

    // Inisialisasi pertama kali
    updateProfilTempData();
    window.updateSessionCV();
</script>

<script>
window.updateSessionCV = function() {
    // Kumpulkan semua data dari window.tempData (pastikan sudah diisi dari semua input)
    const data = window.tempData || {};
    fetch('/cv/save-session', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
        },
        body: JSON.stringify(data)
    });
};
</script>