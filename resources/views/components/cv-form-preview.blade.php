<div class="flex flex-col md:flex-row gap-4">
    <!-- Form Section -->
    <div class="w-full md:w-1/2">
        <form id="cvForm" method="POST" action="#" onsubmit="return false;">
            @csrf

            @include('forms.step1')
            @include('forms.step2')
        </form>
    </div>

    <!-- Live Preview Section -->
    <div class="w-full md:w-1/2 bg-white rounded-lg shadow-lg flex flex-col">
        <div id="previewWrapper" style="overflow-y:auto;">
            <div class="p-6">
                @include('components.view-cv')
            </div>
        </div>
    </div>
</div>

<script>
function syncPreviewHeightWithForm(step) {
    const formDiv = document.querySelector('#cvForm');
    const previewDiv = document.getElementById('previewWrapper');
    if (!formDiv || !previewDiv) return;

    // Reset height dulu agar offsetHeight form akurat
    previewDiv.style.height = 'auto';

    // Samakan tinggi preview dengan form
    previewDiv.style.height = formDiv.offsetHeight + 'px';
    previewDiv.style.overflowY = 'auto';
}

// Panggil saat step berubah
function showFormStep(step) {
    document.querySelectorAll('.step').forEach(el => el.classList.add('hidden'));
    const targetStep = document.getElementById('step-' + step);
    if (targetStep) targetStep.classList.remove('hidden');
    syncPreviewHeightWithForm(step);
}

// Pantau perubahan form agar preview selalu sinkron
const observer = new MutationObserver(() => {
    const step = document.querySelector('.step:not(.hidden)')?.id?.split('-')[1] || 1;
    syncPreviewHeightWithForm(Number(step));
});
observer.observe(document.getElementById('cvForm'), { childList: true, subtree: true, attributes: true });

// Inisialisasi awal
document.addEventListener('DOMContentLoaded', function () {
    syncPreviewHeightWithForm(1);
});

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