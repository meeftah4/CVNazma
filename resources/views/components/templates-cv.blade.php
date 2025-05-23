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
        hobi: window.tempData?.hobi || []
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
