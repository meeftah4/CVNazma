@extends('layouts.app')

@section('title', 'CV Nazma')

@section('content')
<div class="bg-blue-50 min-h-screen py-10">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-6">Buat CV Anda</h1>

        <div class="flex flex-col md:flex-row gap-4">
            <!-- Form Section -->
            <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-lg">
                <form id="cvForm" method="POST" action="#">
                    @csrf

                    @include('forms.step1')
                    @include('forms.step2')

                </form>
            </div>

            <!-- Live Preview Section -->
            <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold mb-2">Preview CV Anda</h2>
                <div class="p-4 bg-gray-50 border border-gray-300 rounded-lg">
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

    document.addEventListener('DOMContentLoaded', function () {
        goToStep(1);
    });

    document.getElementById('cvForm').addEventListener('input', function () {
        // Step 1: Name, Email, Phone, Address, LinkedIn, Portfolio
        const name = document.getElementById('nameInput')?.value || 'Nama Lengkap';
        const email = document.getElementById('emailInput')?.value || 'nama@email.com';
        const phone = document.getElementById('phoneInput')?.value || '0812-3456-7890';
        const address = document.getElementById('addressInput')?.value || 'Jakarta, Indonesia';
        const linkedin = document.getElementById('linkedinInput')?.value || 'LinkedIn Profile URL';
        const portfolio = document.getElementById('portfolioInput')?.value || 'Portfolio/Website URL';

        document.getElementById('previewName').innerText = name;
        document.getElementById('previewContact').innerText = `${email} | ${phone} | ${linkedin} | ${portfolio}`;
        document.getElementById('previewAddress').innerText = address;

        // Step 2: Profil
        const profileDescription = document.getElementById('descriptionInput')?.value || 'Deskripsi tidak tersedia';

        document.getElementById('previewProfile').innerHTML = `
            <p>${profileDescription}</p>
        `;

        // Step 2: Pengalaman Kerja
        const companyName = document.getElementById('companyName')?.value || 'Nama Perusahaan tidak tersedia';
        const jobPosition = document.getElementById('jobPosition')?.value || 'Posisi tidak tersedia';
        const jobCity = document.getElementById('jobCity')?.value || 'Kota tidak tersedia';
        const startDate = document.getElementById('startDate')?.value || 'Tanggal Mulai tidak tersedia';
        const endDate = document.getElementById('endDate')?.value || 'Tanggal Selesai tidak tersedia';
        const jobDescription = document.getElementById('jobDescription')?.value || 'Deskripsi tidak tersedia';

        document.getElementById('previewPengalamankerja').innerHTML = `
            <p><strong>${companyName}</strong> - ${jobPosition}</p>
            <p>${jobCity}</p>
            <p>${startDate} - ${endDate}</p>
            <p>${jobDescription}</p>
        `;

        // Step 2: Proyek
        const projectName = document.getElementById('projectName')?.value || 'Nama Proyek tidak tersedia';
        const projectPosition = document.getElementById('projectPosition')?.value || 'Posisi tidak tersedia';
        const projectStartDate = document.getElementById('projectStartDate')?.value || 'Tanggal Mulai tidak tersedia';
        const projectEndDate = document.getElementById('projectEndDate')?.value || 'Tanggal Selesai tidak tersedia';
        const projectDescription = document.getElementById('projectDescription')?.value || 'Deskripsi tidak tersedia';

        document.getElementById('previewProject').innerHTML = `
            <p><strong>${projectName}</strong> - ${projectPosition}</p>
            <p>${projectStartDate} - ${projectEndDate}</p>
            <p>${projectDescription}</p>
        `;

        // Step 2: Keahlian
        const skillName = document.getElementById('skillName')?.value || 'Keahlian tidak tersedia';
        const skillLevel = document.getElementById('skillLevel')?.value || 'Tingkat Keahlian tidak tersedia';

        document.getElementById('previewSkill').innerHTML = `
            <p>${skillName} - ${skillLevel}</p>
        `;

        // Step 2: Pendidikan
        const educationInstitution = document.getElementById('educationInstitution')?.value || 'Sekolah tidak tersedia';
        const educationDegree = document.getElementById('educationDegree')?.value || 'Gelar tidak tersedia';
        const educationCity = document.getElementById('educationCity')?.value || 'Kota tidak tersedia';
        const educationStartDate = document.getElementById('educationStartDate')?.value || 'Tanggal Mulai tidak tersedia';
        const educationEndDate = document.getElementById('educationEndDate')?.value || 'Tanggal Selesai tidak tersedia';
        const educationDescription = document.getElementById('educationDescription')?.value || 'Deskripsi tidak tersedia';

        document.getElementById('previewEducation').innerHTML = `
            <p><strong>${educationInstitution}</strong> - ${educationDegree}</p>
            <p>${educationCity}</p>
            <p>${educationStartDate} - ${educationEndDate}</p>
            <p>${educationDescription}</p>
        `;

        // Step 2: Bahasa
        const languageName = document.getElementById('languageName')?.value || 'Bahasa tidak tersedia';
        const languageLevel = document.getElementById('languageLevel')?.value || 'Tingkat Kemampuan tidak tersedia';

        document.getElementById('previewLanguage').innerHTML = `
            <p>${languageName} - ${languageLevel}</p>
        `;

        // Step 2: Sertifikat
        const certificateName = document.getElementById('certificateName')?.value || 'Nama Sertifikat tidak tersedia';
        const certificateIssuer = document.getElementById('certificateIssuer')?.value || 'Penerbit tidak tersedia';
        const certificateDate = document.getElementById('certificateDate')?.value || 'Tanggal tidak tersedia';

        document.getElementById('previewCertificate').innerHTML = `
            <p><strong>${certificateName}</strong></p>
            <p>${certificateIssuer}</p>
            <p>${certificateDate}</p>
        `;

        // Step 2: Hobi
        const hobbyName = document.getElementById('hobbyName')?.value || 'Hobi tidak tersedia';

        document.getElementById('previewHobby').innerHTML = `
            <p>${hobbyName}</p>
        `;

    });

    
</script>
@endsection
