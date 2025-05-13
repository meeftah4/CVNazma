@extends('layouts.app')

@section('title', 'CV Nazma')

@vite(['resources/css/home.css', 'resources/js/home.js'])

@section('content')
<div class="home-page">
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
        <div class="grid">
            <div class="card">
                <img src="{{ asset('images/langkah1.png') }}" alt="Icon 1">
                <div class="header">
                    <span class="number">1</span>
                    <span class="title">Lengkapi data diri</span>
                </div>
                <p>Isi data diri anda sesuai kebutuhan dan lihat sebelah kanan terdapat live preview yang bisa diubah sesuka hati anda!</p>
            </div>
            <div class="card">
                <img src="{{ asset('images/langkah2.png') }}" alt="Icon 2">
                <div class="header">
                    <span class="number">2</span>
                    <span class="title">Pilih template</span>
                </div>
                <p>Pilih template dan sesuaikan CV ATS anda berdasarkan prefensi untuk membantu Anda mendapatkan wawancara.</p>
            </div>
            <div class="card">
                <img src="{{ asset('images/langkah3.png') }}" alt="Icon 3">
                <div class="header">
                    <span class="number">3</span>
                    <span class="title">Bayar CV ATS</span>
                </div>
                <p>Bayar CV ATS anda sesuai template yang anda pilih. (Ingat template ini tidak semuanya berbayar!)</p>
            </div>
            <div class="card">
                <img src="{{ asset('images/langkah4.png') }}" alt="Icon 4">
                <div class="header">
                    <span class="number">4</span>
                    <span class="title">Unduh CV</span>
                </div>
                <p>Unduh CV ATS anda dalam format file yang diinginkan. Kini Anda siap melamar pekerjaan berikutnya.</p>
            </div>
        </div>
    </div>
</section>

<!-- Rating Section -->
<section class="rating">
    <div class="container mx-auto">
        <h1 class="rating-title">Bagaimana pendapat pengguna</h1>
        <h1>CV ATS</h1>
        <div class="grid">
            <div class="card">
                <h2>Marsa</h2>
                <div class="stars">
                    <img src="{{ asset('images/star.png') }}" alt="Star Icon">
                    <img src="{{ asset('images/star.png') }}" alt="Star Icon">
                    <img src="{{ asset('images/star.png') }}" alt="Star Icon">
                    <img src="{{ asset('images/star.png') }}" alt="Star Icon">
                    <img src="{{ asset('images/star.png') }}" alt="Star Icon">
                </div>
                <p>Jelas, CV ATS adalah kesuksesan besar untuk saya. Dalam 15 menit, saya sudah membuat CV dan mengirimnya dengan program email.</p>
            </div>
            <div class="card">
                <h2>Miftah</h2>
                <div class="stars">
                    <img src="{{ asset('images/star.png') }}" alt="Star Icon">
                    <img src="{{ asset('images/star.png') }}" alt="Star Icon">
                    <img src="{{ asset('images/star.png') }}" alt="Star Icon">
                    <img src="{{ asset('images/star.png') }}" alt="Star Icon">
                    <img src="{{ asset('images/half.png') }}" alt="Half Star Icon">
                </div>
                <p>Jelas, CV ATS adalah kesuksesan besar untuk saya. Dalam 15 menit, saya sudah membuat CV dan mengirimnya dengan program email.</p>
            </div>
            <div class="card">
                <h2>Anas</h2>
                <div class="stars">
                    <img src="{{ asset('images/star.png') }}" alt="Star Icon">
                    <img src="{{ asset('images/star.png') }}" alt="Star Icon">
                    <img src="{{ asset('images/star.png') }}" alt="Star Icon">
                    <img src="{{ asset('images/star.png') }}" alt="Star Icon">
                    <img src="{{ asset('images/star.png') }}" alt="Star Icon">
                </div>
                <p>Jelas, CV ATS adalah kesuksesan besar untuk saya. Dalam 15 menit, saya sudah membuat CV dan mengirimnya dengan program email.</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq">
    <div class="container mx-auto">
        <h1 class="faq-title">
            Pertanyaan yang sering <br> ditanyakan!
        </h1>        
        <div class="faq-item">
            <button class="faq-question">
                Apa itu CV ATS?
                <span class="faq-icon">-</span>
            </button>
            <div class="faq-answer">
                <p>CV ATS adalah singkatan dari Curriculum Vitae Applicant Tracking System-friendly. Artinya, CV ini dibuat agar mudah dibaca dan diproses oleh sistem pelacak pelamar kerja (ATS) yang digunakan oleh banyak perusahaan untuk menyaring dan menyeleksi CV secara otomatis sebelum dibaca oleh HR atau rekruter.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">
                Apa itu CV ATS?
                <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
                <p>Isi jawaban untuk pertanyaan ini.</p>
            </div>
        </div>
        <div class="faq-item">
            <button class="faq-question">
                Apa itu CV ATS?
                <span class="faq-icon">+</span>
            </button>
            <div class="faq-answer">
                <p>Isi jawaban untuk pertanyaan ini.</p>
            </div>
        </div>
    </div>
</section>

@if (session('success'))
    <div id="alert-container" class="fixed top-4 right-4 z-50">
        <div id="alert-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
@endif

@if (session('error'))
    <div id="alert-container" class="fixed top-4 right-4 z-50">
        <div id="alert-message" class="alert alert-danger">
            {{ session('error') }}
        </div>
    </div>
@endif
@endsection