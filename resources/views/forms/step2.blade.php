{{-- filepath: d:\Magang\CVNazma\resources\views\forms\step2.blade.php --}}
<style>
/* Membatasi tinggi elemen daftar dan membuatnya expand */
#profilList, #pengalamankerjaList, #proyekList, #keahlianList, #pendidikanList, #bahasaList, #sertifikatList, #hobiList {
    max-height: none; /* Tidak ada batas tinggi */
    overflow-y: visible; /* Biarkan konten meluas ke bawah */
}

/* Membungkus teks panjang di elemen daftar */
.break-words {
    word-wrap: break-word;
    overflow-wrap: break-word;
    white-space: normal; /* Pastikan teks tidak dalam satu baris */
    word-break: break-all; /* Memaksa pemecahan kata panjang agar tidak overflow horizontal */
}

.cropper-bg {
    background-color: #000 !important;
    background-image: none !important;
}

.upload-area {
    border: 2px dashed #005bbb;
    background-color: #f8fbff;
    border-radius: 12px;
}
</style>

@vite('resources/js/forms/base.js')
@vite('resources/js/forms/profil.js')
@vite('resources/js/forms/pengalamankerja.js')
@vite('resources/js/forms/proyek.js')
@vite('resources/js/forms/keahlian.js')
@vite('resources/js/forms/pendidikan.js')
@vite('resources/js/forms/bahasa.js')
@vite('resources/js/forms/sertifikat.js')
@vite('resources/js/forms/hobi.js')

<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

{{-- resources/views/forms/step2.blade.php --}}
<!-- Default hidden -->
<div id="step-2" class="step hidden" style="background-color: #F4F8FF;">
    @foreach (['Profil', 'Pengalaman Kerja', 'Proyek', 'Keahlian', 'Pendidikan', 'Bahasa', 'Sertifikat', 'Hobi'] as $field)
        <div class="mb-4">
            <div class="bg-white rounded-md shadow p-0">
                <div 
                    class="dropdown-header w-full flex justify-between items-center px-6 border-b font-bold text-blue-900 rounded-t-md text-base"
                    data-dropdown="{{ strtolower(str_replace(' ', '', $field)) }}"
                    style="min-height: 50px; padding-top: 0.75rem; padding-bottom: 0.75rem; cursor: pointer;"
                >
                    <div class="flex items-center gap-2">
                        <span class="text-[18px]">{{ $field }}</span>
                    </div>
                    <button type="button"
                        class="text-blue-900 font-bold text-xl focus:outline-none"
                        style="background: none; border: none; pointer-events: none;" 
                        tabindex="-1"
                    >
                        <span id="{{ strtolower(str_replace(' ', '', $field)) }}Icon">+</span>
                    </button>
                </div>
                <div id="{{ strtolower(str_replace(' ', '', $field)) }}Dropdown" class="hidden relative">
                    @if($field !== 'Profil')
                    <button
                        type="button"
                        class="absolute right-6 top-4 text-red-500 hover:text-red-700 z-10"
                        style="padding:0"
                        onclick="hapusSemuaDataSection('{{ strtolower(str_replace(' ', '', $field)) }}')"
                        title="Hapus Semua {{ $field }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 7h12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3m2 0v12a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V7h12zM10 11v6m4-6v6" />                        </svg>
                    </button>
                    @endif
                    @include('partials.' . strtolower(str_replace(' ', '-', $field)))
                </div>
            </div>
        </div>
    @endforeach

    <div class="mb-4">
        <div class="upload-area flex items-center p-4 px-6 rounded-md bg-[#f8fbff] border-2 border-dashed border-blue-400 text-center w-full mx-auto">
            <!-- Tombol kamera di dalam kotak dashed -->
            <div class="relative flex items-center mr-4">
                <button id="uploadPhotoBtn" type="button" class="flex flex-col items-center justify-center w-24 h-24 bg-gray-100 border rounded-[10px] shadow relative overflow-hidden">
                    <input id="photoInput" type="file" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />
                    <span id="photoPreviewWrapper" class="absolute inset-0 flex items-center justify-center">
                        <svg id="photoIcon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                            <path fill="#01287E" fill-rule="evenodd" d="M9.778 21h4.444c3.121 0 4.682 0 5.803-.735a4.4 4.4 0 0 0 1.226-1.204c.749-1.1.749-2.633.749-5.697s0-4.597-.749-5.697a4.4 4.4 0 0 0-1.226-1.204c-.72-.473-1.622-.642-3.003-.702c-.659 0-1.226-.49-1.355-1.125A2.064 2.064 0 0 0 13.634 3h-3.268c-.988 0-1.839.685-2.033 1.636c-.129.635-.696 1.125-1.355 1.125c-1.38.06-2.282.23-3.003.702A4.4 4.4 0 0 0 2.75 7.667C2 8.767 2 10.299 2 13.364s0 4.596.749 5.697c.324.476.74.885 1.226 1.204C5.096 21 6.657 21 9.778 21M12 9.273c-2.301 0-4.167 1.831-4.167 4.09S9.7 17.456 12 17.456s4.167-1.832 4.167-4.091S14.3 9.273 12 9.273m0 1.636c-1.38 0-2.5 1.099-2.5 2.455c0 1.355 1.12 2.454 2.5 2.454s2.5-1.099 2.5-2.454s-1.12-2.455-2.5-2.455m4.722-.818c0-.452.373-.818.834-.818h1.11c.46 0 .834.366.834.818a.826.826 0 0 1-.833.818h-1.111a.826.826 0 0 1-.834-.818" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <img id="photoPreview" src="" alt="Preview" class="absolute inset-0 w-full h-full object-cover rounded-[10px] hidden" />  
                </button>
                <button id="removePhotoBtn" type="button" class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 p-0 m-0 bg-transparent shadow-none hover:bg-transparent transition-none hidden z-10 items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="#01287E" viewBox="0 0 24 24" stroke="#01287E">
                        <path fill="#01287E" d="M9 3a1 1 0 0 0-1 1v1H4a1 1 0 1 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7h1a1 1 0 1 0 0-2h-4V4a1 1 0 0 0-1-1H9zm0 2h6v1H9V5zm-2 3h10v12H7V8zm2 2a1 1 0 0 1 2 0v8a1 1 0 1 1-2 0v-8zm4 0a1 1 0 0 1 2 0v8a1 1 0 1 1-2 0v-8z"/>
                    </svg>
                </button>
            </div>
            <div>
                <span class="font-semibold text-xl block text-left" style="color:#01287E;">Tarik atau unggah <span class="underline">foto Anda ke sini.</span></span>
                <div class="text-base mt-1 text-left" style="color:#01287E;">
                    Format: .jpg, .jpeg, .png
                </div>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('photoInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            document.getElementById('removePhotoBtn').classList.remove('hidden');
        }
    });

    document.getElementById('removePhotoBtn').addEventListener('click', function() {
        // Reset input file
        const input = document.getElementById('photoInput');
        input.value = '';

        // Sembunyikan preview di card upload
        const preview = document.getElementById('photoPreview');
        preview.src = '';
        preview.classList.add('hidden');
        document.getElementById('photoIcon').classList.remove('hidden');

        // Sembunyikan preview di template CV jika ada
        const cvPreview = document.getElementById('cvPhotoPreview');
        if (cvPreview) {
            cvPreview.src = '';
            cvPreview.classList.add('hidden');
        }

        // Sembunyikan tombol hapus
        this.classList.add('hidden');
    });
    </script>

    <div class="flex justify-center pb-10">
        <button type="button" onclick="showTemplateCV()" 
            style="background:#FFBC5D; color:#01287E;" 
            class="font-bold px-6 py-2 rounded-md shadow transition hover:brightness-95">
            Langkah Selanjutnya
        </button>
    </div>

    <!-- crop foto -->
    <div id="cropperModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-4 rounded shadow max-w-[90vw] max-h-[90vh] flex flex-col items-center">
            <!-- Tambahkan tombol close di modal -->
            <button type="button" onclick="closeCropperModal()" style="position:absolute;top:10px;right:10px;background:none;border:none;font-size:24px;color:#01287E;cursor:pointer;">&times;</button>
            
            <div class="mb-2 font-bold text-center" style="color: #01287E;">Crop your photo</div>
            <img id="imageToCrop" style="max-width:80vw; max-height:60vh; display:block; margin:auto;">
            <div class="flex justify-center mt-4">
                <button id="cropBtn" style="background:#FFBC5D; color:#01287E;" class="px-8 py-2 rounded font-bold">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
let cropper;
document.getElementById('photoInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(ev) {
            document.getElementById('imageToCrop').src = ev.target.result;
            document.getElementById('cropperModal').classList.remove('hidden');
            cropper = new Cropper(document.getElementById('imageToCrop'), {
                aspectRatio: 1,
                viewMode: 1,
                movable: true,
                zoomable: true,
                rotatable: false,
                scalable: false,
            });
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById('cropBtn').onclick = function() {
    const canvas = cropper.getCroppedCanvas({
        width: 200,
        height: 200,
    });
    const dataUrl = canvas.toDataURL();

    // Update preview di card upload
    const preview = document.getElementById('photoPreview');
    preview.src = dataUrl;
    preview.classList.remove('hidden');
    document.getElementById('photoIcon').classList.add('hidden');

    // Update preview di template CV (kanan)
    const cvPreview = document.getElementById('cvPhotoPreview');
    if (cvPreview) {
        cvPreview.src = dataUrl;
        cvPreview.classList.remove('hidden');
    }

    document.getElementById('cropperModal').classList.add('hidden');
    cropper.destroy();

    // --- Tambahan: Kirim foto ke session via AJAX ---
    // Kumpulkan data lain dari window.tempData jika ada
    const data = {
        ...window.tempData,
        foto: dataUrl
    };
    fetch('/cv/save-session', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
        },
        body: JSON.stringify(data)
    }).then(res => res.json()).then(res => {
        // Jika sukses, reload iframe/preview CV
        const cvFrame = document.getElementById('cvPreviewIframe');
        if (cvFrame) {
            cvFrame.contentWindow.location.reload();
        }
    });
};

function closeCropperModal() {
    document.getElementById('cropperModal').classList.add('hidden');
    if (window.cropper) {
        window.cropper.destroy();
        window.cropper = null;
    }
}

// Klik di luar area modal untuk menutup
document.getElementById('cropperModal').addEventListener('mousedown', function(e) {
    if (e.target === this) {
        closeCropperModal();
    }
});

window.tempData = window.tempData || {};
window.tempData.foto = document.getElementById('photoPreview').src || '';

// Gunakan id preview yang sudah ada, jangan diubah!
window.hapusSemuaDataSection = function(section) {
    const map = {
        'pengalamankerja': { key: 'pengalamankerja', preview: 'previewPengalamanKerja', sectionId: 'sectionPengalamanKerja' },
        'proyek': { key: 'proyek', preview: 'previewProject', sectionId: 'sectionProyek' },
        'keahlian': { key: 'keahlian', preview: 'previewSkill', sectionId: 'sectionKeahlian' },
        'pendidikan': { key: 'pendidikan', preview: 'previewEducation', sectionId: 'sectionPendidikan' },
        'bahasa': { key: 'bahasa', preview: 'previewBahasa', sectionId: 'previewBahasa' }, // Tidak ada section, hanya div
        'sertifikat': { key: 'sertifikat', preview: 'previewCertificate', sectionId: 'previewCertificate' },
        'hobi': { key: 'hobi', preview: 'previewHobby', sectionId: 'previewHobby' },
    };
    if (!map[section]) return;

    // Hapus data di tempData
    window.tempData[map[section].key] = [];

    // Sembunyikan seluruh section di preview (jika ada)
    const sectionEl = document.getElementById(map[section].sectionId);
    if (sectionEl) sectionEl.style.display = 'none';

    // Update session jika perlu
    if (window.updateSessionCV) window.updateSessionCV();
};

// Toggle handler untuk seluruh header dropdown
document.querySelectorAll('.dropdown-header').forEach(function(header){
    header.addEventListener('click', function(e){
        // Jika klik tombol hapus, jangan toggle
        if (e.target.closest('button[title^="Hapus Semua"]')) return;

        // Toggle dropdown
        const section = this.getAttribute('data-dropdown');
        const dropdown = document.getElementById(section + 'Dropdown');
        const icon = document.getElementById(section + 'Icon');
        if (dropdown.classList.contains('hidden')) {
            dropdown.classList.remove('hidden');
            if (icon) icon.textContent = '-';
        } else {
            dropdown.classList.add('hidden');
            if (icon) icon.textContent = '+';
        }
    });
});

window.tampilkanSection = function(sectionId) {
    const el = document.getElementById(sectionId);
    if (el) el.style.display = '';
};

function showTemplateCV() {
    // Simpan data step 2 ke session sebelum ke step 3
    if (typeof window.updateSessionCV === 'function') {
        window.updateSessionCV();
    }
    setActiveStep(3);
}

</script>