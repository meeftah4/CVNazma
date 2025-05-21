@extends('layouts.app')

@section('title', 'CV Nazma')

@section('content')
<div style="background-color: #F4F8FF; min-height: 100vh;" class="pt-4 pb-10">
    <div class="container mx-auto px-4">
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
</div>

<!-- Script Section -->
<script>
    function goToStep(step) {
        document.querySelectorAll('.step').forEach(el => el.classList.add('hidden'));
        const targetStep = document.getElementById('step-' + step);
        if (targetStep) targetStep.classList.remove('hidden');
    }

    document.addEventListener('DOMContentLoaded', function () {
        goToStep(1);
    });
</script>
@endsection
