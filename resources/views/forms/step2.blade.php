{{-- filepath: d:\Magang\CVNazma\resources\views\forms\step2.blade.php --}}
<div id="step-2" class="step hidden space-y-4">

    @foreach ([
        'Profil' => 'profile',
        'Pengalaman Kerja' => 'experience',
        'Keahlian' => 'skills',
        'Bahasa' => 'languages',
        'Hobi' => 'hobbies',
        'Pendidikan' => 'education'
    ] as $label => $id)

    <div class="border rounded-lg overflow-hidden">
        {{-- HEADER DROPDOWN --}}
        <button
            type="button"
            class="w-full flex justify-between items-center px-4 py-3 bg-gray-100 hover:bg-gray-200"
            onclick="toggleDropdown('{{ $id }}')"
        >
            <span class="font-semibold text-blue-900">{{ $label }}</span>
            <span id="icon-{{ $id }}" class="text-blue-900 text-xl font-bold">+</span>
        </button>

        {{-- ISI DROPDOWN --}}
        <div id="content-{{ $id }}" class="hidden bg-white px-4 py-3 space-y-3">
            @if ($id === 'education')
                {{-- Form pendidikan --}}
                <div id="content-education">
                    @include('partials.form-education')
                </div>
            @else
                {{-- Form sederhana untuk bagian lain --}}
                <textarea
                    name="{{ $id }}"
                    rows="4"
                    class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Tulis {{ strtolower($label) }} Anda..."
                ></textarea>
            @endif
        </div>
    </div>
    @endforeach

    {{-- Tambahkan Foto --}}
    <div class="flex flex-col items-center">
        <label for="photoInput" class="cursor-pointer">
            <div class="bg-gray-100 rounded-lg p-6 text-center">
                <img src="{{ asset('images/icon-camera.svg') }}" alt="Icon Kamera" class="w-12 h-12 mx-auto">
                <p class="mt-2 text-sm text-blue-900 font-medium">Tambahkan foto</p>
            </div>
        </label>
        <input type="file" id="photoInput" name="photo" class="hidden">
    </div>

    {{-- Navigasi --}}
    <div class="mt-4 flex justify-between">
        <button type="button" onclick="goToStep(1)" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-2 rounded-lg">
            Kembali
        </button>
        <button type="submit" class="bg-orange-400 hover:bg-orange-500 text-white font-semibold px-6 py-2 rounded-lg">
            Langkah Selanjutnya
        </button>
    </div>
</div>

<script>
    let educationData = [];

    function saveEducation() {
        const school = document.querySelector('input[name="school"]').value;
        const degree = document.querySelector('input[name="degree"]').value;
        const city = document.querySelector('input[name="city"]').value;
        const startDate = document.querySelector('input[name="start_date"]').value;
        const endDate = document.querySelector('input[name="end_date"]').value;
        const description = document.querySelector('textarea[name="description"]').value;

        if (!school || !degree || !city || !startDate || !endDate) {
            alert('Harap lengkapi semua data pendidikan.');
            return;
        }

        const newEducation = { school, degree, city, startDate, endDate, description };
        educationData.push(newEducation);

        updateEducationPreview();
        resetEducationForm();
        toggleDropdown('education');
    }

    function resetEducationForm() {
        document.querySelector('input[name="school"]').value = '';
        document.querySelector('input[name="degree"]').value = '';
        document.querySelector('input[name="city"]').value = '';
        document.querySelector('input[name="start_date"]').value = '';
        document.querySelector('input[name="end_date"]').value = '';
        document.querySelector('textarea[name="description"]').value = '';
    }

    function updateEducationPreview() {
        const previewContainer = document.getElementById('educationPreview');
        previewContainer.innerHTML = '';

        educationData.forEach((edu) => {
            const eduElement = `
                <div class="mb-4 border p-3 rounded bg-gray-50">
                    <h3 class="font-semibold">${edu.school} (${edu.degree})</h3>
                    <p>${edu.city} | ${edu.startDate} - ${edu.endDate}</p>
                    <p>${edu.description}</p>
                </div>
            `;
            previewContainer.innerHTML += eduElement;
        });
    }

    function toggleDropdown(id) {
        const content = document.getElementById('content-' + id);
        const icon = document.getElementById('icon-' + id);

        content.classList.toggle('hidden');
        icon.textContent = content.classList.contains('hidden') ? '+' : '–';

        if (id === 'education' && !content.classList.contains('hidden')) {
            updateEducationDropdown();
        }
    }

    function updateEducationDropdown() {
        const dropdownContainer = document.getElementById('content-education');
        dropdownContainer.innerHTML = '';

        educationData.forEach((edu, index) => {
            const eduElement = `
                <div class="mb-4 border p-3 rounded bg-gray-50">
                    <h3 class="font-semibold">${edu.school} (${edu.degree})</h3>
                    <p>${edu.city} | ${edu.startDate} - ${edu.endDate}</p>
                    <p>${edu.description}</p>
                    <button onclick="removeEducation(${index})" class="text-red-500 text-sm">Hapus</button>
                </div>
            `;
            dropdownContainer.innerHTML += eduElement;
        });

        dropdownContainer.innerHTML += `
            <button type="button" onclick="resetEducationForm()" class="text-sm text-blue-900 font-medium flex items-center gap-1">
                <span class="text-lg">+</span> Tambahkan pendidikan lain
            </button>
        `;
    }

    function removeEducation(index) {
        educationData.splice(index, 1);
        updateEducationDropdown();
        updateEducationPreview();
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateEducationDropdown();
    });
</script>