@extends('layouts.app')

@section('title', 'CV Nazma')

@section('content')
<div style="background-color: #F4F8FF; min-height: 0;" class="pt-4 pb-4">
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

        <div style="background-color: #F4F8FF; min-height: 0;" class="pt-4 pb-4">
            <div class="container mx-auto px-4" id="main-content">
                <div id="form-section">
                    @include('components.cv-form-preview')
                </div>
                <div id="template-section" class="hidden">
                    @include('components.templates-cv')
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script Section -->
<script>
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

        // Tampilkan/hide section sesuai step
        if (step === 3) {
            document.getElementById('form-section').classList.add('hidden');
            document.getElementById('template-section').classList.remove('hidden');
        } else {
            document.getElementById('form-section').classList.remove('hidden');
            document.getElementById('template-section').classList.add('hidden');
        }
    }

    // Fungsi untuk validasi step 1
    function validateStep1() {
        const name = document.getElementById('nameInput')?.value.trim();
        const email = document.getElementById('emailInput')?.value.trim();
        const address = document.getElementById('addressInput')?.value.trim();

        // Tampilkan/hilangkan pesan error
        document.getElementById('nameError').classList.toggle('hidden', !!name);
        document.getElementById('emailError').classList.toggle('hidden', !!email);
        document.getElementById('addressError').classList.toggle('hidden', !!address);

        return !!(name && email && address);
    }

    // Stepper click handler
    function goToStep(step) {
        // Jika mau ke step 2/3, validasi dulu step 1
        if ((step === 2 || step === 3)) {
            // Pastikan form step-1 sedang aktif
            const step1 = document.getElementById('step-1');
            if (step1 && !step1.classList.contains('hidden')) {
                if (!validateStep1()) {
                    // Fokus ke step 1 jika validasi gagal
                    setActiveStep(1);
                    return;
                }
            }
        }

        // Simpan data step yang sedang aktif sebelum pindah step
        const currentStep = document.querySelector('.step:not(.hidden)');
        if (currentStep) {
            if (currentStep.id === 'step-1') {
                if (typeof window.saveStep1ToSession === 'function') {
                    window.saveStep1ToSession();
                }
            } else if (currentStep.id === 'step-2') {
                if (typeof window.saveStep2ToSession === 'function') {
                    window.saveStep2ToSession();
                } else if (typeof window.updateSessionCV === 'function') {
                    window.updateSessionCV();
                }
            }
        }
        setActiveStep(step);
        // Panggil showFormStep di form hanya untuk step 1/2
        if (step === 1 || step === 2) {
            if (typeof window.showFormStep === 'function') {
                window.showFormStep(step);
            }
        }
    }

    // Untuk tombol "Langkah Selanjutnya" di step 2
    function showTemplateCV() {
        setActiveStep(3);
    }

    // Inisialisasi ke step 1 saat load
    document.addEventListener('DOMContentLoaded', function () {
        setActiveStep(1);
        if (typeof window.showFormStep === 'function') {
            window.showFormStep(1);
        }
    });
</script>
@endsection