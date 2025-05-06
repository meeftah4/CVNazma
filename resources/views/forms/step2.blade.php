{{-- filepath: d:\Magang\CVNazma\resources\views\forms\step2.blade.php --}}
<div id="step-2" class="step hidden">
    <h2 class="text-xl mb-4">Langkah 2: Informasi Tambahan</h2>

    @foreach (['Profil', 'Pengalaman Kerja', 'Keahlian', 'Bahasa', 'Hobi', 'Pendidikan'] as $field)
        <div class="mb-4">
            <button type="button" class="w-full flex justify-between items-center py-2 px-4 bg-white border rounded-md shadow" onclick="toggleDropdown('{{ strtolower(str_replace(' ', '', $field)) }}')">
                <span>{{ $field }}</span>
                <span class="text-blue-500 font-bold">+</span>
            </button>
            <div id="{{ strtolower(str_replace(' ', '', $field)) }}Dropdown" class="hidden mt-2">
                <div id="{{ strtolower(str_replace(' ', '', $field)) }}List" class="bg-gray-100 p-4 rounded-md">
                    <!-- Data yang disimpan sementara akan ditampilkan di sini -->
                </div>
                @include('forms.partials.' . strtolower(str_replace(' ', '-', $field)))
            </div>
        </div>
    @endforeach

    <div class="mb-4">
        <label class="block text-gray-700">Tambahkan Foto</label>
        <div class="flex items-center">
            <button class="flex flex-col items-center justify-center w-24 h-24 bg-gray-100 border rounded shadow">
                <span class="text-sm text-gray-500">Tambahkan foto</span>
            </button>
        </div>
    </div>

    <button type="button" onclick="goToStep(3)" class="bg-orange-500 text-white px-4 py-2 rounded-md">Langkah Selanjutnya</button>
</div>

<script>
    let tempData = {
        profil: [],
        pengalamankerja: [],
        keahlian: [],
        bahasa: [],
        hobi: [],
        pendidikan: []
    };

    function toggleDropdown(id) {
        const dropdown = document.getElementById(id + 'Dropdown');
        dropdown.classList.toggle('hidden');
    }

    function saveData(id) {
        const inputs = document.querySelectorAll(`#${id}Form input, #${id}Form textarea`);
        const data = {};
        inputs.forEach(input => {
            data[input.id] = input.value;
        });
        tempData[id].push(data);
        renderData(id);
        resetForm(id);
    }

    function renderData(id) {
        const listContainer = document.getElementById(id + 'List');
        listContainer.innerHTML = '';

        tempData[id].forEach((item, index) => {
            const entry = `
                <div class="flex justify-between items-center mb-2">
                    <div>
                        <p class="text-gray-700 font-bold">${item.jobPosition || item.skillsInput || item.languagesInput || item.hobbiesInput || item.educationInstitution}</p>
                        <p class="text-gray-500">${item.startDate || item.educationStartDate} - ${item.endDate || item.educationEndDate}</p>
                    </div>
                    <div class="flex space-x-2">
                        <button class="text-red-500" onclick="deleteData('${id}', ${index})">X</button>
                        <button class="text-blue-500" onclick="editData('${id}', ${index})">✎</button>
                    </div>
                </div>
            `;
            listContainer.innerHTML += entry;
        });
    }

    function resetForm(id) {
        const inputs = document.querySelectorAll(`#${id}Form input, #${id}Form textarea`);
        inputs.forEach(input => input.value = '');
    }

    function deleteData(id, index) {
        tempData[id].splice(index, 1);
        renderData(id);
    }

    function showForm(id) {
        document.getElementById(id + 'Form').classList.remove('hidden');
    }
</script>