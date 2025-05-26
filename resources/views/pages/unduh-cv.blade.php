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
    <div class="w-full max-w-[210mm] mb-6"> <!-- A4 width -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <!-- A4 Preview Area -->
            <div class="w-[210mm] h-[297mm] mx-auto bg-white"> <!-- A4 dimensions -->
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
        <!-- Template Name -->
        <div class="bg-white rounded-lg shadow-md p-4 text-center">
            <span class="font-semibold text-lg text-slate-900">
                {{ $templateNames[$template] ?? $template }}
            </span>
        </div>

        <!-- Price -->
        <div class="bg-white rounded-lg shadow-md p-4 text-center">
            <span class="font-semibold text-[#2196f3] text-lg">
                Rp 20.000
            </span>
        </div>
    </div>

    <!-- Additional Info -->
    <p class="mt-4 text-xs text-gray-400 text-center max-w-[210mm]">
        Bisa kontak <a href="#" class="underline text-[#2196f3]">Pelayanan Azura</a> 
        untuk melengkapi instruksi/foto
    </p>

    <!-- Download Button -->
    <button class="mt-6 bg-[#FFBC5D] hover:bg-[#e6a84f] text-[#01287E] font-bold
        px-8 py-2 rounded-lg shadow transition-colors duration-200">
        Unduh CV
    </button>
</div>

<style>
    /* Untuk memastikan preview A4 tepat di layar */
    @media screen {
        .a4-preview {
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    }
</style>
@endsection