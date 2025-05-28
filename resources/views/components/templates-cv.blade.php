<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pilih Template CV Profesional</title>
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
                class="template-card cursor-pointer rounded-xl shadow-md border border-white hover:-translate-y-1 hover:shadow-xl hover:border-indigo-500 transition-all duration-300 bg-white flex flex-col h-full"
                data-template="{{ $tpl['key'] }}"
                title="Pilih {{ $tpl['name'] }}">
                
                <!-- Bagian Preview -->
                <div class="relative bg-slate-50 rounded-t-xl overflow-hidden inline-block w-full">
                    <div class="w-[254px] h-[360px] mx-auto"> <!-- 794*0.32 = 254, 1123*0.32 = 359.36 -->
                        <div class="scale-[0.32] origin-top-left w-[794px] h-[1123px] pointer-events-none">
                            <iframe
                                src="{{ url('indonesia/' . $tpl['key']) }}?preview=1"
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
    <div class="flex justify-center mt-10">
        <button id="btn-berikutnya" class="bg-[#FFBC5D] hover:bg-[#e6a84f] text-[#01287E] font-semibold px-8 py-3 rounded-lg shadow transition disabled:opacity-50" disabled>
            Berikutnya
        </button>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const templateCards = document.querySelectorAll('.template-card');
            
            templateCards.forEach(card => {
                card.addEventListener('click', () => {
                    templateCards.forEach(c => c.classList.remove('border-2', 'shadow-inner', 'ring-4', 'ring-indigo-300'));
                    card.classList.add('border-2', 'border-indigo-500', 'shadow-inner', 'ring-4', 'ring-indigo-300');
                    // TODO: Tambahkan aksi pilihan template
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            const templateCards = document.querySelectorAll('.template-card');
            let selectedTemplate = null;
            const btnBerikutnya = document.getElementById('btn-berikutnya');

            templateCards.forEach(card => {
                card.addEventListener('click', () => {
                    templateCards.forEach(c => c.classList.remove('border-2', 'shadow-inner', 'ring-4', 'ring-indigo-300'));
                    card.classList.add('border-2', 'border-indigo-500', 'shadow-inner', 'ring-4', 'ring-indigo-300');
                    selectedTemplate = card.getAttribute('data-template');
                    btnBerikutnya.disabled = false;
                });
            });

            btnBerikutnya.addEventListener('click', function() {
                if (selectedTemplate) {
                    window.location.href = `/cvats/unduh?template=${encodeURIComponent(selectedTemplate)}`;
                }
            });
        });
    </script>
    <script>
        // Polling session setiap saat untuk cek perubahan data
        let lastSessionHash = null;
        setInterval(() => {
            fetch('/cv/get-session')
                .then(res => res.json())
                .then(data => {
                    // Buat hash sederhana dari data session
                    const hash = JSON.stringify(data);
                    if (lastSessionHash !== null && lastSessionHash !== hash) {
                        // Jika data berubah, reload semua iframe preview
                        document.querySelectorAll('.template-card iframe').forEach(iframe => {
                            iframe.contentWindow.location.reload();
                        });
                    }
                    lastSessionHash = hash;
                });
        }, 2000);
    </script>
</body>
</html>
