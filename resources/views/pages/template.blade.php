@extends('layouts.app')

@section('title', 'CV Nazma')

@vite(['resources/css/profile.css'])

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Preview Template CV</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="font-sans bg-slate-50 text-slate-800 min-h-screen">
    <div class="container mx-auto px-6 py-10 max-w-7xl">
        <div class="text-center mb-12 max-w-3xl mx-auto">
            <h1 class="font-bold text-4xl mb-2 bg-gradient-to-r from-indigo-500 to-indigo-800 text-transparent bg-clip-text">
                Preview Template CV
            </h1>
            <p class="text-gray-600 text-lg">
                Lihat berbagai desain CV profesional yang tersedia. Pilihannya akan membuat CV Anda tampil menonjol!
            </p>
        </div>

        @php
            $templateList = [
                ['key' => 'basic', 'img' => 'template-basic.png', 'label' => 'Gratis', 'name' => 'Klasik Minimalis'],
                ['key' => 'template1', 'img' => 'template-1.png', 'label' => 'Pro', 'name' => 'Modern Elegan'],
                ['key' => 'template2', 'img' => 'template-2.png', 'label' => 'Pro', 'name' => 'Kreatif Warna'],
                ['key' => 'template3', 'img' => 'template-3.png', 'label' => 'Pro', 'name' => 'Profesional Bisnis'],
                ['key' => 'template4', 'img' => 'template-4.png', 'label' => 'Pro', 'name' => 'Simetris Bersih'],
                ['key' => 'template5', 'img' => 'template-5.png', 'label' => 'Pro', 'name' => 'Bold Kontras'],
            ];
        @endphp

        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
            @foreach ($templateList as $tpl)
            <div 
                class="template-card rounded-xl shadow-md border border-white bg-white flex flex-col h-full"
                title="Preview {{ $tpl['name'] }}">

                <!-- Bagian Preview -->
                <div class="relative bg-slate-50 rounded-t-xl overflow-hidden inline-block w-full">
                    <div class="w-[254px] h-[360px] mx-auto">
                        <div class="scale-[0.32] origin-top-left w-[794px] h-[1123px] pointer-events-none">
                            <iframe
                                src="{{ url('view/' . $tpl['key']) }}?preview=1"
                                class="w-full h-full border-0"
                                loading="lazy"
                                title="Preview {{ $tpl['name'] }}"
                                sandbox="allow-same-origin allow-scripts"
                            ></iframe>
                        </div>
                    </div>
                </div>

                <!-- Bagian Info -->
                <div class="p-5 border-t border-gray-100 bg-white mt-auto">
                    <div class="font-semibold text-lg text-slate-900 mb-2">
                        {{ $tpl['name'] }}
                    </div>
                    <div class="flex justify-between items-center">
                        @if($tpl['label'] === 'Pro')
                            <span class="bg-blue-600 text-white px-3 py-1 rounded-full uppercase text-xs font-semibold tracking-wide">
                                Pro
                            </span>
                        @elseif($tpl['label'] === 'Gratis')
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full uppercase text-xs font-semibold tracking-wide">
                                Gratis
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
@endsection
