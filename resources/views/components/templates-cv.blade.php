<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Template CV</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Tambahkan link CSS dan JS yang diperlukan --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-roboto bg-[#f5f8ff]">

<div class="min-h-screen flex flex-col items-center justify-center py-12 px-4">
    <h2 class="text-2xl font-bold mb-8">Pilih Template CV</h2>

    {{-- Daftar Template --}}
    @php
        $templateList = [
            ['key' => 'basic', 'img' => 'template-basic.png', 'label' => 'Gratis', 'name' => 'Template Basic'],
            ['key' => 'template1', 'img' => 'template-1.png', 'label' => 'Pro', 'name' => 'Template 1'],
            ['key' => 'template2', 'img' => 'template-2.png', 'label' => 'Pro', 'name' => 'Template 2'],
            ['key' => 'template3', 'img' => 'template-3.png', 'label' => 'Pro', 'name' => 'Template 3'],
            ['key' => 'template4', 'img' => 'template-4.png', 'label' => 'Pro', 'name' => 'Template 4'],
            ['key' => 'template5', 'img' => 'template-5.png', 'label' => 'Pro', 'name' => 'Template 5'],
        ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 w-full max-w-4xl">
        @foreach ($templateList as $tpl)
            <a href="#"
               class="group relative border-2 border-transparent hover:border-orange-500 bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-200 overflow-hidden flex flex-col items-center p-4"
               onclick="showCVTemplate('{{ $tpl['key'] }}'); return false;">
                <div class="w-full aspect-[3/4] flex items-center justify-center bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg overflow-hidden mb-3 border border-gray-200 group-hover:scale-105 transition-transform duration-200">
                    <img src="{{ asset('images/template/' . $tpl['img']) }}" alt="{{ $tpl['name'] }}" class="object-contain w-full h-full" loading="lazy">
                    @if($tpl['label'] === 'Pro')
                        <div class="absolute top-2 right-2 bg-orange-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                            Pro
                        </div>
                    @elseif($tpl['label'] === 'Gratis')
                        <div class="absolute top-2 right-2 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                            Gratis
                        </div>
                    @endif
                </div>
                <span class="mt-2 text-base font-medium text-gray-800 capitalize">{{ $tpl['name'] }}</span>
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
    // Hanya load iframe, data sudah otomatis update via AJAX setiap perubahan form
    const iframe = document.getElementById('cvTemplatePreview');
    iframe.classList.remove('hidden');
    iframe.src = templateFiles[template];
}

// Tombol Unduh CV
document.getElementById('downloadCVBtn').onclick = function(e) {
    e.preventDefault();
    const iframe = document.getElementById('cvTemplatePreview');
    iframe.contentWindow.focus();
    iframe.contentWindow.print();
};

window.updateSessionCV = function() {
    const data = {
        profil: window.tempData?.profil || [],
        pengalamankerja: window.tempData?.pengalamankerja || [],
        proyek: window.tempData?.proyek || [],
        pendidikan: window.tempData?.pendidikan || [],
        keahlian: window.tempData?.keahlian || [],
        bahasa: window.tempData?.bahasa || [],
        sertifikat: window.tempData?.sertifikat || [],
        hobi: window.tempData?.hobi || [],
        foto: window.tempData?.foto || '' // <-- tambahkan ini
    };
    fetch('/cv/save-session', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    }).then(() => {
        // Refresh iframe jika sudah ada src (template sudah dipilih)
        const iframe = document.getElementById('cvTemplatePreview');
        if (iframe && iframe.src && !iframe.classList.contains('hidden')) {
            // Pakai trik force reload tanpa reload halaman utama
            iframe.src = iframe.src.split('?')[0] + '?t=' + Date.now();
        }
    });
};
</script>

</body>
</html>
