@extends('layouts.app')

@section('title', 'CV Nazma')

@section('content')
<div style="background-color: #F4F8FF; min-height: 100vh;" class="pt-4 pb-10">
    <div class="container mx-auto px-4">
        <!-- Stepper & Judul -->
        <div class="flex flex-col items-center mb-12">
            <div id="step-title" class="text-4xl font-bold mb-12 mt-8 text-center" style="color:#01287E;">
                Detail Pribadi
            </div>
            <div class="relative flex items-center w-full max-w-2xl mx-auto">
                <!-- Garis abu-abu -->
                <div class="absolute top-1/2 -translate-y-1/2 h-3 bg-gray-200 rounded" style="left:42px; right:42px;"></div>
                <!-- Garis biru dinamis -->
                <div id="stepper-bar" class="absolute left-0 top-1/2 -translate-y-1/2 h-3 bg-[#01287E] rounded transition-all duration-300" style="width:0;"></div>
                <!-- Step 1 (kiri) -->
                <div class="relative z-10 flex flex-col items-center">
                    <div id="stepper-1" onclick="goToStep(1)" class="w-14 h-14 rounded-full flex items-center justify-center transition-all duration-200 cursor-pointer"
                        style="background:#01287E;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 4.5-1.8 4.5-4.5S14.7 3 12 3 7.5 4.8 7.5 7.5 9.3 12 12 12zm0 2.25c-3 0-9 1.5-9 4.5V21h18v-2.25c0-3-6-4.5-9-4.5z"/>
                        </svg>
                    </div>
                </div>
                <!-- Step 2 (tengah, benar-benar center) -->
                <div class="relative z-10 flex flex-col items-center" style="position:absolute; left:50%; transform:translateX(-50%);">
                    <div id="stepper-2" onclick="goToStep(2)" class="w-14 h-14 rounded-full flex items-center justify-center transition-all duration-200 cursor-pointer"
                        style="background:#E5E7EB;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#01287E" viewBox="0 0 24 24">
                            <path d="M17 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zm0 16H7V5h10v14zm-2-8H9v-2h6v2zm0 4H9v-2h6v2z"/>
                        </svg>
                    </div>
                </div>
                <!-- Step 3 (kanan, ujung) -->
                <div class="relative z-10 flex flex-col items-center" style="position:absolute; right:0;">
                    <div id="stepper-3" onclick="goToStep(3)" class="w-14 h-14 rounded-full flex items-center justify-center transition-all duration-200 cursor-pointer"
                        style="background:#E5E7EB;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#01287E" viewBox="0 0 24 24">
                            <path d="M3 17.25V21h3.75l11.06-11.06-3.75-3.75L3 17.25zm17.71-10.04a1.003 1.003 0 0 0 0-1.42l-2.5-2.5a1.003 1.003 0 0 0-1.42 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Stepper & Judul -->

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
</div>

<!-- Script Section -->
<script>
    function goToStep(step) {
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

    // Fungsi untuk mengatur step aktif
    function setActiveStep(step) {
        // Judul per step
        const titles = {
            1: 'Detail Pribadi',
            2: 'Pengalaman',
            3: 'Template'
        };
        document.getElementById('step-title').textContent = titles[step] || 'Detail Pribadi';

        // Stepper bulatan dan icon
        for (let i = 1; i <= 3; i++) {
            const el = document.getElementById('stepper-' + i);
            if (el) {
                if (i < step) {
                    // Step yang sudah dilewati (tetap biru, icon putih)
                    el.style.background = '#01287E';
                    el.querySelector('svg').setAttribute('fill', 'white');
                } else if (i === step) {
                    // Step aktif (biru, icon putih)
                    el.style.background = '#01287E';
                    el.querySelector('svg').setAttribute('fill', 'white');
                } else {
                    // Step berikutnya (abu, icon biru)
                    el.style.background = '#E5E7EB';
                    el.querySelector('svg').setAttribute('fill', '#01287E');
                }
            }
        }

        // Garis biru dinamis
        const bar = document.getElementById('stepper-bar');
        if (bar) {
            if (step === 1) bar.style.width = '0%';
            else if (step === 2) bar.style.width = '50%';
            else if (step === 3) bar.style.width = '100%';
        }
    }

    // Integrasi dengan goToStep
    function goToStep(step) {
        document.querySelectorAll('.step').forEach(el => el.classList.add('hidden'));
        const targetStep = document.getElementById('step-' + step);
        if (targetStep) targetStep.classList.remove('hidden');
        setActiveStep(step);
    }

    document.addEventListener('DOMContentLoaded', function () {
        goToStep(1);
    });


    //lanjutan dari script di atas
    document.addEventListener('DOMContentLoaded', function () {
        goToStep(1);

        // Live preview update for contact (1 baris)
        ['emailInput', 'phoneInput', 'linkedinInput', 'portfolioInput'].forEach(function(id) {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('input', updateContactPreview);
            }
        });

        // Inisialisasi pertama kali
        updateContactPreview();

        // Jika ingin tetap update nama, bisa tambahkan:
        document.getElementById('nameInput')?.addEventListener('input', function(e) {
            document.getElementById('previewName').textContent = e.target.value || 'Nama Lengkap';

        });

        document.getElementById('addressInput')?.addEventListener('input', function(e) {
           document.getElementById('previewAddress').textContent = e.target.value || 'Jakarta, Indonesia';

        });
    });
</script>
@endsection
