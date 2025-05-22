<div>
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
        <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-lg flex flex-col h-full">
            <!-- Konten preview scrollable -->
            <div class="flex-1 overflow-y-auto" style="max-height: 670px;">
                @include('components.view-cv')
            </div>
        </div>
    </div>
</div>



<script>
    function showFormStep(step) {
        document.querySelectorAll('.step').forEach(el => el.classList.add('hidden'));
        const targetStep = document.getElementById('step-' + step);
        if (targetStep) targetStep.classList.remove('hidden');
    }

    function updateContactPreview() {
        const email = document.getElementById('emailInput')?.value || 'nama@email.com';
        const phone = document.getElementById('phoneInput')?.value || '0812-3456-7890';
        const linkedin = document.getElementById('linkedinInput')?.value || 'LinkedIn Profile URL';
        const portfolio = document.getElementById('portfolioInput')?.value || 'Portfolio/Website URL';
        document.getElementById('previewContact').textContent = `${email} | ${phone} | ${linkedin} | ${portfolio}`;
    }

    function showTemplateCV() {
        setActiveStep(3); // Panggil stepper global, otomatis switch ke template
    }

    document.addEventListener('DOMContentLoaded', function () {
        showFormStep(1);

        // Live preview update for contact
        ['emailInput', 'phoneInput', 'linkedinInput', 'portfolioInput'].forEach(function(id) {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('input', updateContactPreview);
            }
        });

        updateContactPreview();

        document.getElementById('nameInput')?.addEventListener('input', function(e) {
            document.getElementById('previewName').textContent = e.target.value || 'Nama Lengkap';
        });

        document.getElementById('addressInput')?.addEventListener('input', function(e) {
            document.getElementById('previewAddress').textContent = e.target.value || 'Jakarta, Indonesia';
        });
    });
</script>