{{-- filepath: d:\Magang\CVNazma\resources\views\pages\cv-complete.blade.php --}}
@extends('layouts.app')

@section('title', 'Unduh CV')

@section('content')
@php
    // Ambil nama template dan id dari request
    $template = request('template', 'basic');
    $cvsy_id = request('cvsy_id');
    $templateNames = [
        'basic' => 'Klasik Minimalis',
        'template1' => 'Modern Elegan',
        'template2' => 'Kreatif Warna', 
        'template3' => 'Profesional Bisnis',
        'template4' => 'Simetris Bersih',
        'template5' => 'Bold Kontras',
    ];
    $templateDisplay = $templateNames[$template] ?? $template;
@endphp

<div class="min-h-screen flex flex-col items-center justify-center py-8 px-4 bg-[#f5f8ff]">
    <h1 class="text-2xl font-bold mb-4 text-[#1a237e]">Pembayaran Berhasil!</h1>
    <p class="mb-6 text-gray-700">Silakan preview dan unduh CV Anda di bawah ini.</p>

    <!-- Preview CV -->
    <div class="w-full max-w-[210mm] mb-6">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="w-[210mm] h-[297mm] mx-auto bg-white">
                <iframe 
                    id="cvPreview"
                    src="{{ url('cv-user/' . $template) }}?cvsy_id={{ $cvsy_id }}"
                    class="w-full h-full border-0"
                    loading="lazy"
                    title="Preview {{ $templateDisplay }}"
                    sandbox="allow-same-origin allow-scripts"
                ></iframe>
            </div>
        </div>
    </div>

    <!-- Tombol Unduh PDF -->
    <a href="{{ url('cv-user/' . $template . '/download') }}?cvsy_id={{ $cvsy_id }}" 
       class="bg-[#2196f3] text-white px-6 py-3 rounded-lg font-bold shadow hover:bg-[#1769aa] transition block text-center">
        Unduh CV
    </a>

    <!-- Tombol Kembali ke Home -->
    <a href="{{ url('/') }}" class="mt-4 inline-block bg-gray-200 text-[#1a237e] px-6 py-3 rounded-lg font-bold shadow hover:bg-gray-300 transition">
        Kembali ke Home
    </a>
</div>
@endsection