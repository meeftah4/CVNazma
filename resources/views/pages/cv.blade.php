<!-- filepath: d:\Magang\CVNazma\resources\views\pages\buatcv.blade.php -->
@extends('layouts.app')

@section('title', 'CV Nazma')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pribadi</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-blue-50">

    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold mb-6">Detail Pribadi</h1>
        
        <div class="flex">
            <!-- Form Section -->
            <div class="w-1/2 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl mb-4">Masukkan Detail Pribadi</h2>
                <form id="cvForm">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama Lengkap</label>
                        <input type="text" id="nameInput" name="name" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Alamat Email</label>
                        <input type="email" id="emailInput" name="email" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Nomor Handphone</label>
                        <input type="text" id="phoneInput" name="phone" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Alamat</label>
                        <textarea id="addressInput" name="address" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">LinkedIn Profile URL</label>
                        <input type="url" id="linkedinInput" name="linkedin" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Portfolio/Website URL</label>
                        <input type="url" id="portfolioInput" name="portfolio" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>
                    <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-md">Langkah Selanjutnya</button>
                </form>
            </div>

            <!-- Live Preview Section -->
            <div class="w-1/2 bg-white p-6 ml-4 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold mb-2">Preview CV Anda</h2>
                <div class="p-4 bg-gray-50 border border-gray-300 rounded-lg">
                    @include('templates.cv1')
                </div>
            </div>
        </div>
    </div>

    <script>
        // Event listener untuk live preview
        document.getElementById('cvForm').addEventListener('input', function () {
            // Ambil nilai dari input form
            const name = document.getElementById('nameInput').value || 'Nama Lengkap';
            const email = document.getElementById('emailInput').value || 'nama@email.com';
            const phone = document.getElementById('phoneInput').value || '0812-3456-7890';
            const address = document.getElementById('addressInput').value || 'Jakarta, Indonesia';
            const linkedin = document.getElementById('linkedinInput').value || 'LinkedIn Profile URL';
            const portfolio = document.getElementById('portfolioInput').value || 'Portfolio/Website URL';

            // Update elemen di template
            document.getElementById('previewName').innerText = name;
            document.getElementById('previewContact').innerText = `${email} | ${phone} | ${linkedin} | ${portfolio}`;
            document.getElementById('previewAddress').innerText = `${address}`;
            document.getElementById('previewZipcode').innerText = zipcode;
            document.getElementById('previewLinkedin').innerText = linkedin;
            document.getElementById('previewPortfolio').innerText = portfolio;
        });
    </script>

</body>
</html>
@endsection