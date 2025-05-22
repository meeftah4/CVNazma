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
        const email = document.getElementById('emailInput')?.value || 'nama@email.com';
        const phone = document.getElementById('phoneInput')?.value || '0812-3456-7890';
        const linkedin = document.getElementById('linkedinInput')?.value || 'LinkedIn Profile URL';
        const portfolio = document.getElementById('portfolioInput')?.value || 'Portfolio/Website URL';
        document.getElementById('previewContact').textContent = `${email} | ${phone} | ${linkedin} | ${portfolio}`;
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
</script>

<script>
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
        description: window.tempData.profil?.[0]?.description || '', // dari step2/profil.js
        photoUrl: window.tempData.profil?.[0]?.photoUrl || ''
    };
}

// Update photoUrl di tempData.profil[0] saat upload foto
function updatePhotoTempData(url) {
    window.tempData = window.tempData || {};
    window.tempData.profil = window.tempData.profil || [{}];
    window.tempData.profil[0].photoUrl = url;
}

// Pasang event listener ke semua input step 1
['nameInput','emailInput','phoneInput','addressInput','linkedinInput','portfolioInput'].forEach(function(id){
    const el = document.getElementById(id);
    if (el) el.addEventListener('input', updateProfilTempData);
});

// Saat upload foto, update juga ke tempData
const photoInput = document.getElementById('photoInput');
if (photoInput) {
    photoInput.addEventListener('change', function(e){
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(ev) {
                updatePhotoTempData(ev.target.result);
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
        }
    };
}

// Inisialisasi pertama kali
updateProfilTempData();
</script>