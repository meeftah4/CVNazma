@extends('layouts.app')

@section('title', 'CV Nazma')

@section('content')
@php
    $template = request('template', 'basic');
    $templateNames = [
        'basic' => 'Klasik Minimalis',
        'template1' => 'Modern Elegan',
        'template2' => 'Kreatif Warna', 
        'template3' => 'Profesional Bisnis',
        'template4' => 'Simetris Bersih',
        'template5' => 'Bold Kontras',
    ];
@endphp

<div class="min-h-screen bg-[#f5f8ff] py-8 px-4 flex flex-col items-center">
    <!-- Header -->
    <div class="text-center mb-6 max-w-2xl">
        <h1 class="text-2xl md:text-3xl font-bold text-[#1a237e] mb-2">
            CV ATS anda sudah siap!
        </h1>
        <p class="text-gray-500">Lakukan pembayaran untuk mendapatkan CV ATS anda</p>
    </div>

    <!-- Preview Container -->
    <div class="w-full max-w-[210mm] mb-6">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="w-[210mm] h-[297mm] mx-auto bg-white">
                <iframe 
                    src="{{ url('indonesia/' . $template) }}?preview=1"
                    class="w-full h-full border-0"
                    loading="lazy"
                    title="Preview {{ $templateNames[$template] ?? $template }}"
                    sandbox="allow-same-origin allow-scripts"
                ></iframe>
            </div>
        </div>
    </div>

    <!-- Info Section -->
    <div class="w-full max-w-[210mm] space-y-4">
        <div class="bg-white rounded-lg shadow-md p-4 text-center">
            <span class="font-semibold text-lg text-slate-900">
                {{ $templateNames[$template] ?? $template }}
            </span>
        </div>
        <div class="bg-white rounded-lg shadow-md p-4 text-center">
            <span class="font-semibold text-[#2196f3] text-lg">
                Rp 20.000
            </span>
        </div>
    </div>

    <p class="mt-4 text-xs text-gray-400 text-center max-w-[210mm]">
        Bisa kontak <a href="#" class="underline text-[#2196f3]">Pelayanan Azura</a> 
        untuk melengkapi instruksi/foto
    </p>

    <!-- Download Button -->
    <button id="btnBerikutnya" class="mt-6 bg-[#FFBC5D] hover:bg-[#e6a84f] text-[#01287E] font-bold
        px-8 py-2 rounded-lg shadow transition-colors duration-200">
        Berikutnya
    </button>

    {{-- Tambahkan di bagian yang mudah dilihat, misal sebelum tombol berikutnya --}}
    <div class="max-w-[210mm] w-full my-6">
        <details class="bg-gray-100 rounded p-4 text-xs" open>
            <summary class="cursor-pointer font-semibold text-[#01287E]">Lihat Data Session Backend (Server)</summary>
            <pre class="overflow-x-auto mt-2 text-left bg-white p-2 rounded">
{{ json_encode([
    'profil' => session('profil', []),
    'pengalamankerja' => session('pengalamankerja', []),
    'proyek' => session('proyek', []),
    'pendidikan' => session('pendidikan', []),
    'keahlian' => session('keahlian', []),
    'bahasa' => session('bahasa', []),
    'sertifikat' => session('sertifikat', []),
    'hobi' => session('hobi', []),
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}
            </pre>
        </details>
    </div>

    <!-- Modal Alert -->
    <div id="modalValidasi" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl shadow-2xl p-8 md:p-10 max-w-md w-full text-center relative border border-[#FFBC5D]">
            <!-- Tombol X (Tutup) -->
            <button id="btnTutup" class="absolute top-4 right-4 text-gray-400 hover:text-[#FFBC5D] text-2xl font-bold focus:outline-none transition-colors duration-200" aria-label="Tutup">
                &times;
            </button>
            <div class="flex flex-col items-center mb-4">
                <div class="bg-[#FFBC5D] rounded-full p-3 mb-2 shadow">
                    <svg class="w-8 h-8 text-[#01287E]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-extrabold mb-2 text-[#1a237e]">Validasi Data</h2>
            </div>
            <p class="mb-6 text-gray-700 leading-relaxed">
                Data yang Anda masukkan <span class="font-semibold text-[#2196f3]">sudah sesuai</span> dan tidak ada kesalahan.<br>
                Silakan lanjutkan untuk proses pembayaran.
            </p>
            <!-- Checkbox Persetujuan -->
            <div class="flex flex-col items-center mb-6">
                <label for="checkboxPersetujuan" class="flex items-center cursor-pointer group">
                    <input type="checkbox" id="checkboxPersetujuan" class="accent-[#FFBC5D] w-5 h-5 transition-all duration-200 focus:ring-2 focus:ring-[#FFBC5D] group-hover:scale-105" />
                    <span class="ml-3 text-sm text-gray-700 select-none transition-colors duration-200 group-hover:text-[#FFBC5D]">
                        Saya menyetujui data sudah benar dan siap untuk diproses pembayaran.
                    </span>
                </label>
            </div>
            <div class="flex justify-between gap-3">
                <button id="btnKembali" class="bg-gray-100 hover:bg-gray-200 text-[#01287E] font-semibold px-4 py-2 rounded-lg w-1/2 transition-all duration-200 shadow-sm border border-gray-200">
                    Kembali
                </button>
                <button id="btnLanjutkan" class="bg-[#FFBC5D] text-[#01287E] font-bold px-4 py-2 rounded-lg w-1/2 transition-all duration-200 shadow-sm opacity-50 cursor-not-allowed border border-[#FFBC5D]" disabled>
                    Lanjutkan
                </button>
            </div>
        </div>
    </div>

    <script>
    window.profilServer = @json(session('profil', []));
    </script>

    <!-- Pastikan SweetAlert2 sudah di-load -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    var btnBerikutnya = document.getElementById('btnBerikutnya');
    if (btnBerikutnya) {
        btnBerikutnya.onclick = async function() {
            let cek = await fetch('/cv/get-session');
            if (cek.status === 401 || cek.status === 419) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Sesi Habis',
                    text: 'Silakan login terlebih dahulu untuk melanjutkan.',
                    confirmButtonText: 'Login',
                }).then(() => {
                    window.location.href = '/login';
                });
                return;
            }
            document.getElementById('modalValidasi').classList.remove('hidden');
        };
    }
});

document.getElementById('btnKembali').onclick = function() {
    window.location.href = '/cvats';
};

document.getElementById('btnTutup').onclick = function() {
    document.getElementById('modalValidasi').classList.add('hidden');
    const checkbox = document.getElementById('checkboxPersetujuan');
    const btnLanjutkan = document.getElementById('btnLanjutkan');
    checkbox.checked = false;
    btnLanjutkan.disabled = true;
    btnLanjutkan.classList.add('opacity-50', 'cursor-not-allowed');
    btnLanjutkan.classList.remove('hover:bg-[#e6a84f]', 'hover:scale-105', 'ring-2', 'ring-[#FFBC5D]');
};

const checkbox = document.getElementById('checkboxPersetujuan');
const btnLanjutkan = document.getElementById('btnLanjutkan');

checkbox.onchange = function() {
    if (this.checked) {
        btnLanjutkan.disabled = false;
        btnLanjutkan.classList.remove('opacity-50', 'cursor-not-allowed');
        btnLanjutkan.classList.add('hover:bg-[#e6a84f]', 'hover:scale-105', 'ring-2', 'ring-[#FFBC5D]');
    } else {
        btnLanjutkan.disabled = true;
        btnLanjutkan.classList.add('opacity-50', 'cursor-not-allowed');
        btnLanjutkan.classList.remove('hover:bg-[#e6a84f]', 'hover:scale-105', 'ring-2', 'ring-[#FFBC5D]');
    }
};

// Tombol Lanjutkan: simpan data ke database
btnLanjutkan.onclick = async function() {
    if (this.disabled) return;
    this.disabled = true;
    this.textContent = 'Menyimpan...';

    try {
        // Ambil SEMUA data dari session backend
        let sessionData = await fetch('/cv/get-session').then(res => res.json());
        let profilArr = sessionData.profil || [];
        let profil = profilArr[0] || {};
        let photoUrl = sessionData.foto || profil.photoUrl || profil.photo || '';

        // 1. Upload foto jika ada (base64)
        if (photoUrl && photoUrl.startsWith('data:image/')) {
            let uploadRes = await fetch('/cvs-users/upload-photo', {
                method: 'POST',
                headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                body: JSON.stringify({ photo: photoUrl })
            });
            let uploadData = await uploadRes.json();
            if (uploadData.path) {
                profil.cv_picture = uploadData.path;
            } else {
                profil.cv_picture = '';
            }
        }
        profil.photo = undefined;
        profil.photoUrl = undefined;

        // 2. Simpan profil ke database (ambil data dari session di backend)
        let res = await fetch('/cvs-users/save-from-session', {
            method: 'POST',
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            body: JSON.stringify({})
        });
        if (!res.ok) throw new Error('Gagal menyimpan profil');
        let data = await res.json();
        let cvsy_id = data.cvsy_id;

        // 3. Simpan data lain ke database (ambil data dari session di backend)
        const endpoints = [
            '/work-experiences/store-from-session',
            '/projects/store-from-session',
            '/educations/store-from-session',
            '/skills/store-from-session',
            '/languages/store-from-session',
            '/certificates/store-from-session',
            '/hobbies/store-from-session',
        ];
        for (let url of endpoints) {
            let resp = await fetch(url, {
                method: 'POST',
                headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                body: JSON.stringify({ cvsy_id })
            });
            if (!resp.ok) throw new Error('Gagal menyimpan data ke ' + url);
        }

        window.location.href = '/pembayaran';
    } catch (err) {
        this.disabled = false;
        this.textContent = 'Lanjutkan';
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: err.message || 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.',
        });
    }
};
    </script>
</div>

<style>
    @media screen {
        .a4-preview {
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    }
</style>
@endsection