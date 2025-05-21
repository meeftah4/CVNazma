<div>
    <h1 class="text-2xl font-bold mb-6">Buat CV Anda</h1>
    <div class="flex flex-col md:flex-row gap-4">
        <!-- Form Section -->
        <div class="w-full md:w-1/2">
            <form id="cvForm" method="POST" action="#">
                @csrf

                @include('forms.step1')
                @include('forms.step2')

            </form>
        </div>

        <!-- Live Preview Section -->
        <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-2">Preview CV Anda</h2>
            <div class="p-4 bg-gray-50 border border-gray-300 rounded-lg">
                @include('components.view-cv')
            </div>
        </div>
    </div>
</div>

<script>
    // Tambahkan di resources/js/forms/base.js atau di bawah halaman
    window.goToStep = function(step) {
        document.querySelectorAll('.step').forEach(el => el.classList.add('hidden'));
        const target = document.getElementById('step-' + step);
        if (target) target.classList.remove('hidden');
    };

    // Tampilkan step 1 saat pertama kali load
    document.addEventListener('DOMContentLoaded', function () {
        goToStep(1);
    });
</script>