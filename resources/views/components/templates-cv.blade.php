{{-- resources/views/template-cv.blade.php --}}

<div class="min-h-screen bg-[#f5f8ff] flex flex-col items-center justify-center py-12 px-4">
    <h2 class="text-2xl font-bold mb-8">Pilih Template CV</h2>
    
    <div class="grid grid-cols-3 gap-6">
        {{-- Template Gratis (aktif - hanya ini yang bisa diklik) --}}
        <a href="#" class="border-2 border-blue-500 p-2 rounded-lg hover:shadow-lg transition">
            <img src="{{ asset('images/template1.png') }}" alt="Template Gratis">
        </a>

        {{-- Template Pro (nonaktif - hanya tampilan, belum bisa diakses) --}}
        @for ($i = 2; $i <= 5; $i++)
            <div class="relative p-2 rounded-lg bg-white shadow-md">
                <img src="{{ asset("images/template$i.png") }}" alt="Template Pro {{ $i }}" class="opacity-40">
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="text-xl font-bold text-gray-700">Pro</span>
                </div>
            </div>
        @endfor

        {{-- Template Coming Soon --}}
        <div class="relative p-2 rounded-lg bg-white shadow-md">
            <img src="{{ asset('images/template6.png') }}" alt="Coming Soon" class="opacity-30">
            <div class="absolute inset-0 flex items-center justify-center">
                <span class="text-xl font-bold text-gray-400">Coming Soon</span>
            </div>
        </div>
    </div>

    {{-- Tombol Unduh (belum aktif, hanya dummy button) --}}
    <a href="#" class="mt-8 bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600 transition">
        Unduh CV
    </a>
</div>
