<div class="min-h-screen bg-[#f5f8ff] flex flex-col items-center justify-center py-12 px-4">
    <h2 class="text-2xl font-bold mb-8">Pilih Template CV</h2>

    {{-- Daftar Template --}}
    @php
        $templateList = [
            ['key' => 'basic', 'img' => 'template1.png', 'label' => 'Gratis'],
            ['key' => 'template1', 'img' => 'template2.png', 'label' => 'Pro'],
            ['key' => 'template2', 'img' => 'template3.png', 'label' => 'Pro'],
            ['key' => 'template3', 'img' => 'template4.png', 'label' => 'Pro'],
            ['key' => 'template4', 'img' => 'template5.png', 'label' => 'Pro'],
            ['key' => 'template5', 'img' => 'template6.png', 'label' => 'Pro'],
        ];
    @endphp

    <div class="grid grid-cols-3 gap-6">
        @foreach ($templateList as $tpl)
            <a href="#"
               class="border-2 border-blue-500 p-2 rounded-lg hover:shadow-lg transition relative"
               onclick="showCVTemplate('{{ $tpl['key'] }}'); return false;">
                <img src="{{ asset('images/' . $tpl['img']) }}" alt="Template {{ $tpl['key'] }}">
                @if($tpl['label'] === 'Pro')
                    <div class="absolute inset-0 flex items-center justify-center bg-white/70">
                        <span class="text-xl font-bold text-gray-700">Pro</span>
                    </div>
                @endif
            </a>
        @endforeach
    </div>

    {{-- Preview Area --}}
    <div id="cvTemplatePreviewWrapper" class="flex justify-center w-full mt-10 overflow-auto">
        <iframe id="cvTemplatePreview" class="cv-a4-preview hidden bg-white" frameborder="0"></iframe>
    </div>

    {{-- Tombol Unduh --}}
    <a href="#" id="downloadCVBtn" class="mt-8 bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600 transition">
        Unduh CV
    </a>
</div>

{{-- Style --}}
<style>
.cv-a4-preview {
    width: 210mm;
    height: 297mm;
    max-width: 100%;
    background: white;
    box-shadow: 0 0 10px #bbb;
    border-radius: 8px;
}

@media (max-width: 900px) {
    .cv-a4-preview {
        width: 100%;
        height: auto;
    }
}

@media print {
    body * {
        visibility: hidden;
    }

    #cvTemplatePreview, #cvTemplatePreview * {
        visibility: visible;
    }

    #cvTemplatePreview {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: auto;
    }
}
</style>

{{-- Script --}}
<script>
const templateFiles = {
    basic: '/indonesia/basic',
    template1: '/indonesia/template1',
    template2: '/indonesia/template2',
    template3: '/indonesia/template3',
    template4: '/indonesia/template4',
    template5: '/indonesia/template5'
};

function showCVTemplate(template) {
    const iframe = document.getElementById('cvTemplatePreview');
    iframe.classList.remove('hidden');

    fetch(templateFiles[template])
        .then(res => res.text())
        .then(html => {
            const doc = iframe.contentDocument || iframe.contentWindow.document;
            doc.open();
            doc.write(html);
            doc.close();

            setTimeout(() => {
                const data = window.tempData || {};
                fillTemplateData(doc, data);
            }, 100);
        })
        .catch(err => {
            const doc = iframe.contentDocument || iframe.contentWindow.document;
            doc.body.innerHTML = '<div class="text-red-500 p-4 text-center">Template tidak ditemukan.</div>';
        });
}

function fillTemplateData(doc, data) {
    if (doc.getElementById('previewName')) {
        doc.getElementById('previewName').innerText = data.profil?.[0]?.name || 'Nama Lengkap';
    }
    if (doc.getElementById('previewContact')) {
        doc.getElementById('previewContact').innerText = 
            [data.profil?.[0]?.email, data.profil?.[0]?.phone, data.profil?.[0]?.linkedin, data.profil?.[0]?.portfolio]
            .filter(Boolean).join(' | ');
    }
    if (doc.getElementById('previewAddress')) {
        doc.getElementById('previewAddress').innerText = data.profil?.[0]?.address || '';
    }
    if (doc.getElementById('previewProfil')) {
        doc.getElementById('previewProfil').innerText = data.profil?.[0]?.description || '';
    }

    if (doc.getElementById('previewPengalamanKerja')) {
        doc.getElementById('previewPengalamanKerja').innerHTML =
            (data.pengalamankerja || []).map(item => `
                <div class="item">
                    <div class="item-title"><strong>${item.companyName || item.company || ''}</strong> – ${item.jobPosition || item.position || ''}</div>
                    <div class="item-sub">${item.jobStartDate || item.startDate || ''} – ${item.jobEndDate || item.endDate || ''} ${item.jobCity || item.location ? '| ' + (item.jobCity || item.location) : ''}</div>
                    <div class="item-desc">${(item.jobDescription || item.description || '').split('\n').map(line => `<div>${line}</div>`).join('')}</div>
                </div>
            `).join('');
    }

    if (doc.getElementById('previewProject')) {
        doc.getElementById('previewProject').innerHTML =
            (data.proyek || []).map(item => `
                <div class="item">
                    <div class="item-title">${item.projectName || ''} – ${item.projectPosition || item.role || ''}</div>
                    <div class="item-sub">${item.projectStartDate || item.startDate || ''} – ${item.projectEndDate || item.endDate || ''}</div>
                    <div class="item-desc">${(item.projectDescription || item.description || '').split('\n').map(line => `<div>${line}</div>`).join('')}</div>
                </div>
            `).join('');
    }

    if (doc.getElementById('previewEducation')) {
        doc.getElementById('previewEducation').innerHTML =
            (data.pendidikan || []).map(item => `
                <div class="item">
                    <div class="item-title">${item.educationInstitution || ''}${item.educationCity ? ' - ' + item.educationCity : ''}</div>
                    <div class="item-sub">${item.educationStartDate ? item.educationStartDate : ''}${item.educationEndDate ? ' - ' + item.educationEndDate : ''}</div>
                    ${item.educationDegree ? `<div class="item-degree">${item.educationDegree}</div>` : ''}
                    ${item.educationDescription ? `<div class="item-desc">${item.educationDescription.split('\n').map(line => `<div>${line}</div>`).join('')}</div>` : ''}
                </div>
            `).join('');
    }

    if (doc.getElementById('previewSkill')) {
        doc.getElementById('previewSkill').innerHTML =
            '<ul>' + (data.keahlian || []).map(item => `<li>${item.skillName || ''}</li>`).join('') + '</ul>';
    }

    if (doc.getElementById('previewBahasa')) {
        doc.getElementById('previewBahasa').innerHTML =
            '<ul>' + (data.bahasa || []).map(item => `<li>${item.languageName || ''}</li>`).join('') + '</ul>';
    }

    if (doc.getElementById('previewCertificate')) {
        doc.getElementById('previewCertificate').innerHTML =
            '<ul>' + (data.sertifikat || []).map(item => `<li>${item.certificateName || ''}</li>`).join('') + '</ul>';
    }

    if (doc.getElementById('previewHobby')) {
        doc.getElementById('previewHobby').innerHTML =
            '<ul>' + (data.hobi || []).map(item => `<li>${item.hobbyName || ''}</li>`).join('') + '</ul>';
    }

    if (doc.getElementById('cvPhotoPreview')) {
        if (data.profil?.[0]?.photoUrl) {
            doc.getElementById('cvPhotoPreview').src = data.profil[0].photoUrl;
            doc.getElementById('cvPhotoPreview').classList.remove('hidden');
        } else {
            doc.getElementById('cvPhotoPreview').classList.add('hidden');
        }
    }
}

// Tombol Unduh CV
document.getElementById('downloadCVBtn').onclick = function(e) {
    e.preventDefault();
    const iframe = document.getElementById('cvTemplatePreview');
    iframe.contentWindow.focus();
    iframe.contentWindow.print();
};
</script>
