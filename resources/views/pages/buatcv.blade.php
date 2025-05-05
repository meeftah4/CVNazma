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
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Alamat Email</label>
                        <input type="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Nomor Handphone</label>
                        <input type="text" name="phone" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Alamat</label>
                        <textarea name="address" class="mt-1 block w-full border border-gray-300 rounded-md p-2"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Kode Pos</label>
                        <input type="text" name="zipcode" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">LinkedIn Profile URL</label>
                        <input type="url" name="linkedin" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Portfolio/Website URL</label>
                        <input type="url" name="portfolio" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    </div>
                    <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-md">Langkah Selanjutnya</button>
                </form>
            </div>

            <!-- Live Preview Section -->
            <div class="w-1/2 bg-white p-6 ml-4 rounded-lg shadow-lg">
                <h2 class="text-xl mb-4">Preview</h2>
                <div id="preview" class="overflow-y-auto">
                    <div class="text-gray-700">
                        <h3 class="font-bold text-xl" id="previewName"></h3>
                        <p id="previewEmail"></p>
                        <p id="previewPhone"></p>
                        <p id="previewAddress"></p>
                        <p id="previewZipcode"></p>
                        <p id="previewLinkedin"></p>
                        <p id="previewPortfolio"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('cvForm').addEventListener('input', function() {
            document.getElementById('previewName').innerText = this.name.value || 'Nama Lengkap';
            document.getElementById('previewEmail').innerText = this.email.value || 'Alamat Email';
            document.getElementById('previewPhone').innerText = this.phone.value || 'Nomor Handphone';
            document.getElementById('previewAddress').innerText = this.address.value || 'Alamat';
            document.getElementById('previewZipcode').innerText = this.zipcode.value || 'Kode Pos';
            document.getElementById('previewLinkedin').innerText = this.linkedin.value || 'LinkedIn Profile URL';
            document.getElementById('previewPortfolio').innerText = this.portfolio.value || 'Portfolio/Website URL';
        });
    </script>

</body>
</html>