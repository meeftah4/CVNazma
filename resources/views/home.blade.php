@extends('layouts.app')

@section('title', 'CV Nazma')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

<body class="home-page">
    @section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container mx-auto flex flex-col md:flex-row items-center">
            <!-- Text Content -->
            <div class="md:w-1/2 text-center md:text-left">
                <h1>Buat CV ATS secara profesional dengan mudah!</h1>
                <p>Lengkapi data diri, pilih template dan unduh CV ATS dalam hitungan menit</p>
                <button class="cta-button">Buat Sekarang!</button>
            </div>

            <!-- Image -->
            <div class="md:w-1/2 mt-8 md:mt-0">
                <img src="{{ asset('images/Home.jpg') }}" alt="Hero Image" class="hero-image">
            </div>
        </div>
    </section>

    <!-- Bagaimana Caranya Section -->
    <section class="bagaimana-caranya">
    <div class="container mx-auto">
        <h1>Bagaimana caranya?</h1>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-6 px-6">
            <div class="card">
                <img src="{{ asset('images/langkah1.png') }}" alt="Icon 1">
                <p class="font-semibold">Lengkapi data diri</p>
                <p>Isi data diri sesuai dengan kebutuhan untuk CV ATS Anda.</p>
            </div>
            <div class="card">
                <img src="{{ asset('images/langkah2.png') }}" alt="Icon 2">
                <p class="font-semibold">Pilih template</p>
                <p>Pilih template CV yang sesuai dengan keinginan Anda.</p>
            </div>
            <div class="card">
                <img src="{{ asset('images/langkah3.png') }}" alt="Icon 3">
                <p class="font-semibold">Review CV Anda</p>
                <p>Periksa kembali CV Anda sebelum mengunduhnya.</p>
            </div>
            <div class="card">
                <img src="{{ asset('images/langkah4.png') }}" alt="Icon 4">
                <p class="font-semibold">Unduh CV</p>
                <p>Unduh CV ATS Anda dalam format yang sesuai.</p>
            </div>
        </div>
    </div>
</section>
    @endsection
</body>