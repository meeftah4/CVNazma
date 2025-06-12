@extends('layouts.app')

@section('title', 'CV Nazma')

@vite(['resources/css/profile.css', 'resources/css/template.css'])

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
<body>
    <div class="cv-container">
        <div class="text-center mb-12 max-w-3xl mx-auto">
            <h1 class="template-title">
                Template CV
            </h1>
            <p class="template-desc">
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

        <div class="template-grid">
            @foreach ($templateList as $tpl)
            <div 
                class="template-card"
                title="Preview {{ $tpl['name'] }}">

                <!-- Bagian Preview -->
                <div class="template-preview-bg">
                    <div class="template-preview-frame-wrap">
                        <div class="template-preview-frame-inner">
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
                <div class="template-info">
                    <div class="template-info-title">
                        {{ $tpl['name'] }}
                    </div>
                    <div>
                        @if($tpl['label'] === 'Pro')
                            <span class="template-info-label-pro">
                                Pro
                            </span>
                        @elseif($tpl['label'] === 'Gratis')
                            <span class="template-info-label-gratis">
                                Gratis
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="cv-stats">
            <div class="cv-stats-title">
            Lebih dari <span class="font-bold">112.872</span> pengguna sudah membuat CV mereka
            </div>
            <div class="cv-stats-desc">
            Dengan pembuat CV, Anda dapat dengan cepat dan mudah membuat CV yang profesional dan unik dalam 5 menit.
            </div>
            <div class="cv-stats-row">
                <a href="/cvats"
                   class="cv-stats-btn">
                    Buat sekarang
                </a>
                <div class="cv-stats-note">
                    Nikmati akses mudah dan pelajari peluang dan template ATS!
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
