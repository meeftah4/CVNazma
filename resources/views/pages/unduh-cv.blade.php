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
        <h1
            style="color:#01287E; font-size:2.25rem; font-weight:bold; letter-spacing:-0.5px; line-height:1.1; font-family:'Kantumruy',sans-serif;"
            class="mb-2 text-center">
            Cv Ats anda sudah siap!
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
            <span class="font-semibold text-[#01287E] text-lg">
                Rp 20.000
            </span>
        </div>
    </div>

    <!-- Download Button -->
    <button id="btnBerikutnya" class="mt-6 bg-[#FFBC5D] hover:bg-[#e6a84f] text-[#01287E] font-bold
        px-8 py-2 rounded-lg shadow transition-colors duration-200">
        Berikutnya
    </button>

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
                @if(Auth::guest())
                    Swal.fire({
                        icon: 'info',
                        iconHtml: `
                            <svg width="64" height="64" viewBox="0 0 64 64" fill="none">
                                <!-- Lingkaran kuning besar -->
                                <circle cx="32" cy="32" r="32" fill="#FFBC5D"/>
                                <!-- Lingkaran biru kecil di dalam -->
                                <circle cx="32" cy="32" r="16" fill="none" stroke="#01287E" stroke-width="3"/>
                                <!-- Tanda seru biru -->
                                <text x="32" y="44" text-anchor="middle" font-size="28" font-weight="bold" fill="#01287E" font-family="Arial, sans-serif">!</text>
                            </svg>
                        `,
                        title: 'Masuk Diperlukan',
                        text: 'Silakan masuk terlebih dahulu untuk melanjutkan proses unduh CV.',
                        confirmButtonColor: '#FFBC5D',
                        confirmButtonText: 'Masuk',
                        customClass: {
                            confirmButton: 'swal2-login-btn'
                        }
                    }).then(() => {
                        // window.location.href = "{{ route('login') }}?redirect={{ urlencode(request()->fullUrl()) }}";
                        // Ganti dengan buka modal login
                        if (window.closeSwalAndOpenLoginModal) {
                            window.closeSwalAndOpenLoginModal();
                        }
                    });
                    return;
                @endif

                // 1. Ambil data session terbaru dari backend (data yang dipakai iframe)
                let sessionData = await fetch('/cv/get-session').then(res => res.json());

                // 2. Kirim ulang ke backend agar session benar-benar update
                await fetch('/cv/save-session', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                    },
                    body: JSON.stringify(sessionData)
                });

                // 3. Setelah session dipatenkan, tampilkan modal validasi
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

        // Ambil data session terbaru dari backend
        let sessionData = await fetch('/cv/get-session').then(res => res.json());
        let profilArr = sessionData.profil || [];
        let profil = profilArr[0] || {};

        // 1. Upload foto jika ada (base64)
        let photoUrl = profil.cv_picture || profil.photoUrl || profil.photo || '';
        if (photoUrl && photoUrl.startsWith('data:image/')) {
            let uploadRes = await fetch('/cvs-users/upload-photo', {
                method: 'POST',
                headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                body: JSON.stringify({ photo: photoUrl })
            });
            let uploadData = await uploadRes.json();
            if (uploadRes.ok && uploadData.path) {
                profil.cv_picture = uploadData.path;
            } else {
                profil.cv_picture = '';
                Swal.fire({
                    icon: 'error',
                    title: 'Upload Foto Gagal',
                    text: uploadData.message || 'Foto tidak berhasil diupload. Silakan coba lagi.',
                    confirmButtonColor: '#FFBC5D'
                });
            }
        }

        // 2. Hapus base64 dari profil JS
        profil.photo = undefined;
        profil.photoUrl = undefined;

        // 3. Kirim ke server agar session server-side update dengan path gambar
        await fetch('/cv/save-session', {
            method: 'POST',
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            body: JSON.stringify({
                profil: [profil],
                pengalamankerja: sessionData.pengalamankerja || [],
                proyek: sessionData.proyek || [],
                pendidikan: sessionData.pendidikan || [],
                keahlian: sessionData.keahlian || [],
                bahasa: sessionData.bahasa || [],
                sertifikat: sessionData.sertifikat || [],
                hobi: sessionData.hobi || []
            })
        });

        // 4. Simpan ke database (backend ambil path dari session)
        let res = await fetch('/cvs-users/save-from-session', {
            method: 'POST',
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            body: JSON.stringify({ template: "{{ $template }}" })
        });
        let data = await res.json();
        let cvsy_id = data.cvsy_id;

        // 5. Simpan data lain (work, project, dst)
        const endpoints = [
            {url: '/work-experiences/store-from-session'},
            {url: '/projects/store-from-session'},
            {url: '/educations/store-from-session'},
            {url: '/skills/store-from-session'},
            {url: '/languages/store-from-session'},
            {url: '/certificates/store-from-session'},
            {url: '/hobbies/store-from-session'},
        ];
        for (let ep of endpoints) {
            await fetch(ep.url, {
                method: 'POST',
                headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                body: JSON.stringify({cvsy_id})
            });
        }

        // 6. Ambil snap token dari backend
        let snapRes = await fetch('/midtrans/get-snap-token', {
            method: 'POST',
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            body: JSON.stringify({cvsy_id})
        });
        let snapData = await snapRes.json();

        // Tutup modal validasi sebelum membuka Snap
        document.getElementById('modalValidasi').classList.add('hidden');

        // 7. Tampilkan modal pembayaran Midtrans Snap
        window.snap.pay(snapData.snap_token, {
            onSuccess: function(result){
                // Setelah sukses, polling status transaksi ke backend
                checkTransactionStatus(snapData.order_id);
            },
            onPending: function(result){
                window.location.href = '/';
            },
            onError: function(result){
                Swal.fire('Gagal', 'Pembayaran gagal. Silakan coba lagi.', 'error');
            },
            onClose: function(){}
        });

        // Fungsi polling status transaksi
        async function checkTransactionStatus(order_id) {
            let maxTries = 10;
            let tries = 0;
            let settled = false;
            while (tries < maxTries && !settled) {
                let res = await fetch('/midtrans/check-status', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    body: JSON.stringify({order_id})
                });
                let data = await res.json();
                if (data.status === 'settlement' || data.status === 'capture') {
                    settled = true;
                    // Tambahkan template ke URL
                    window.location.href = `/cvats/cv-complete?template={{ $template }}&cvsy_id=${cvsy_id}`;
                    return;
                }
                await new Promise(r => setTimeout(r, 2000)); // tunggu 2 detik
                tries++;
            }
            // Jika belum settlement setelah polling, redirect ke home
            window.location.href = '/';
        }
    };

    window.closeSwalAndOpenLoginModal = function() {
        // Tutup SweetAlert2
        Swal.close();

        // Tampilkan modal login (atau register)
        if (document.getElementById('login-modal')) {
            document.getElementById('login-modal').classList.remove('hidden');
        }
        // Jika ingin bisa register juga, bisa tambahkan tombol di modal login
    };

    document.addEventListener('DOMContentLoaded', function() {
        // LOGIN MODAL
        const loginForm = document.querySelector('.login-modal-form');
        if (loginForm) {
            loginForm.onsubmit = async function(e) {
                e.preventDefault();
                const formData = new FormData(loginForm);
                const res = await fetch('/masuk', {
                    method: 'POST',
                    headers: {'X-Requested-With': 'XMLHttpRequest'},
                    body: formData
                });
                if (res.ok) {
                    document.getElementById('login-modal').classList.add('hidden');
                    // (Opsional) reload navbar/user info via AJAX jika ingin update tampilan
                    // User tetap di halaman ini, data tetap ada
                } else {
                    Swal.fire('Gagal', 'Login gagal. Cek email/password.', 'error');
                }
            };
        }

        // REGISTER MODAL
        const registerForm = document.querySelector('.register-modal-form');
        if (registerForm) {
            registerForm.onsubmit = async function(e) {
                e.preventDefault();
                const formData = new FormData(registerForm);
                const res = await fetch('/daftar', {
                    method: 'POST',
                    headers: {'X-Requested-With': 'XMLHttpRequest'},
                    body: formData
                });
                if (res.ok) {
                    document.getElementById('register-modal').classList.add('hidden');
                    // (Opsional) reload navbar/user info via AJAX jika ingin update tampilan
                    // User tetap di halaman ini, data tetap ada
                } else {
                    Swal.fire('Gagal', 'Registrasi gagal. Cek data Anda.', 'error');
                }
            };
        }
    });
    </script>

    <!-- Midtrans Snap.js -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-server-tNOItnN7xmutsv1uuPr4zC7e"></script>

    <style>
        @media screen {
            .a4-preview {
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
        }
        /* SweetAlert2: warna utama dan aksen */
        .swal2-popup {
            border: 1px solid #FFBC5D !important;
            border-radius: 18px !important;
        }
        .swal2-icon.swal2-info {
            border-color: #01287E !important;   /* Lingkaran kuning */
            background: #fff !important;
        }
        .swal2-icon.swal2-info .swal2-icon-content {
            color: #01287E !important;          /* Huruf "i" biru tua */
        }
        .swal2-icon.swal2-warning,
        .swal2-icon.swal2-success,
        .swal2-icon.swal2-error,
        .swal2-icon.swal2-question {
            border-color: #FFBC5D !important;
            color: #FFBC5D !important;
            background: #fff !important;
        }
        .swal2-title {
            color: #01287E !important;
            font-weight: 800 !important;
        }
        .swal2-html-container, .swal2-content {
            color: #6b7280 !important; 
        }
        .swal2-login-btn {
            background-color: #FFBC5D !important;
            color: #01287E !important;
            font-weight: bold;
            border-radius: 8px;
            border: none;
        }
        .swal2-login-btn:focus, .swal2-login-btn:hover {
            background-color: #e6a84f !important;
            color: #01287E !important;
        }

        /* Atur warna tombol OK SweetAlert2 (default confirm button) */
        .swal2-confirm {
            background-color: #FFBC5D !important;
            color: #01287E !important;
            font-weight: bold;
            border-radius: 8px;
            border: none;
        }
        .swal2-confirm:focus, .swal2-confirm:hover {
            background-color: #e6a84f !important;
            color: #01287E !important;
        }

        /* Modal Validasi: border dan shadow */
        #modalValidasi > div {
            border: 2.5px solid #FFBC5D !important;
            box-shadow: 0 8px 32px 0 rgba(1,40,126,0.10) !important;
        }
        #modalValidasi h2 {
            color: #01287E !important;
            font-weight: 800 !important;
        }
        #modalValidasi .bg-[#FFBC5D] {
            background: #FFBC5D !important;
        }
        #modalValidasi .text-[#01287E] {
            color: #01287E !important;
        }
        #modalValidasi .text-[#2196f3] {
            color: #2196f3 !important;
        }
        #modalValidasi button#btnLanjutkan {
            background: #FFBC5D !important;
            color: #01287E !important;
            font-weight: bold;
            border: none;
        }
        #modalValidasi button#btnLanjutkan:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        #modalValidasi button#btnKembali {
            color: #01287E !important;
            border: 1.5px solid #e0e7ef !important;
            background: #f4f6fa !important;
            font-weight: bold;
        }
        #modalValidasi label span {
            color: #01287E !important;
        }
        #modalValidasi label input:checked + span {
            color: #FFBC5D !important;
        }
    </style>
@endsection