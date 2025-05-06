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
                @include('partials.' . strtolower(str_replace(' ', '-', $field)))
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

        // Tampilkan atau sembunyikan form target
        const form = document.getElementById(id + 'Form');
        if (form) {
            form.classList.toggle('hidden');
        }
    }

    function saveData(id) {
        const inputs = document.querySelectorAll(`#${id}Form input, #${id}Form textarea, #${id}Form select`);
        const data = {};
        inputs.forEach(input => {
            data[input.id] = input.value || (input.id === 'skillLevel' ? 'Pemula' : ''); // Tetapkan default 'Pemula' untuk skillLevel
        });

        // Jika id adalah 'profil', ganti data yang ada dan sembunyikan form
        if (id === 'profil') {
            tempData[id] = [data]; // Ganti seluruh array dengan data baru
            document.getElementById(id + 'Form').classList.add('hidden'); // Sembunyikan form
        } else {
            tempData[id].push(data); // Tambahkan data baru untuk kategori lain
        }

        renderData(id);
        resetForm(id);
    }

    function renderData(id) {
        const listContainer = document.getElementById(id + 'List');
        listContainer.innerHTML = '';

        tempData[id].forEach((item, index) => {
            let entry = '';

            if (id === 'pendidikan') {
                // Format data untuk Pendidikan
                entry = `
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <p class="text-gray-700 font-bold">${item.educationDegree || 'Gelar tidak tersedia'}</p>
                            <p class="text-gray-500">${item.educationStartDate || 'Tanggal Mulai tidak tersedia'} - ${item.educationEndDate || 'Tanggal Selesai tidak tersedia'}</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-red-500" onclick="deleteData('${id}', ${index})">X</button>
                            <button class="text-blue-500" onclick="editData('${id}', ${index})">✎</button>
                        </div>
                    </div>
                `;
            } else if (id === 'profil') {
                // Format data untuk Profil
                entry = `
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <p class="text-gray-700 font-bold">${item.descriptionInput || 'Deskripsi tidak tersedia'}</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-red-500" onclick="deleteData('${id}', ${index})">X</button>
                            <button class="text-blue-500" onclick="editData('${id}', ${index})">✎</button>
                        </div>
                    </div>
                `;
            } else if (id === 'pengalamankerja') {
                // Format data untuk Pengalaman Kerja
                entry = `
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <p class="text-gray-700 font-bold">${item.jobPosition || 'Posisi tidak tersedia'}</p>
                            <p class="text-gray-500">${item.startDate || 'Tanggal Mulai tidak tersedia'} - ${item.endDate || 'Tanggal Selesai tidak tersedia'}</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-red-500" onclick="deleteData('${id}', ${index})">X</button>
                            <button class="text-blue-500" onclick="editData('${id}', ${index})">✎</button>
                        </div>
                    </div>
                `;
            } else if (id === 'keahlian') {
                // Format data untuk Keahlian
                entry = `
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <p class="text-gray-700 font-bold">${item.skillName || 'Keahlian tidak tersedia'}</p>
                            <p class="text-gray-500">${item.skillLevel || 'Tingkat Keahlian tidak tersedia'}</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-red-500" onclick="deleteData('${id}', ${index})">X</button>
                            <button class="text-blue-500" onclick="editData('${id}', ${index})">✎</button>
                        </div>
                    </div>
                `;
            } else if (id === 'bahasa') {
                // Format data untuk Bahasa
                entry = `
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <p class="text-gray-700 font-bold">${item.languageName || 'Bahasa tidak tersedia'}</p>
                            <p class="text-gray-500">${item.languageLevel || 'Tingkat Bahasa tidak tersedia'}</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-red-500" onclick="deleteData('${id}', ${index})">X</button>
                            <button class="text-blue-500" onclick="editData('${id}', ${index})">✎</button>
                        </div>
                    </div>
                `;
            } else if (id === 'hobi') {
                // Format data untuk Hobi
                entry = `
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <p class="text-gray-700 font-bold">${item.hobbyName || 'Hobi tidak tersedia'}</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-red-500" onclick="deleteData('${id}', ${index})">X</button>
                            <button class="text-blue-500" onclick="editData('${id}', ${index})">✎</button>
                        </div>
                    </div>
                `;
            } else {
                // Format data untuk kategori lain
                entry = `
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <p class="text-gray-700 font-bold">${item.addressInput || 'Deskripsi tidak tersedia'}</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-red-500" onclick="deleteData('${id}', ${index})">X</button>
                            <button class="text-blue-500" onclick="editData('${id}', ${index})">✎</button>
                        </div>
                    </div>
                `;
            }

            listContainer.innerHTML += entry;
        });
    }

    function resetForm(id) {
        const inputs = document.querySelectorAll(`#${id}Form input, #${id}Form textarea`);
        inputs.forEach(input => input.value = '');
    }

    function deleteData(id, index) {
        // Hapus data dari tempData
        tempData[id].splice(index, 1);

        // Jika id adalah 'profil', tampilkan kembali form
        if (id === 'profil') {
            document.getElementById(id + 'Form').classList.remove('hidden'); // Tampilkan form
        }

        renderData(id); // Render ulang data
    }

    function showForm(id) {
        document.getElementById(id + 'Form').classList.remove('hidden');
    }

    function editData(id, index) {
        // Ambil data yang akan diedit
        const dataToEdit = tempData[id][index];

        // Isi form dengan data yang akan diedit
        const inputs = document.querySelectorAll(`#${id}Form input, #${id}Form textarea`);
        inputs.forEach(input => {
            input.value = dataToEdit[input.id] || '';
        });

        // Hapus data lama dari tempData
        tempData[id].splice(index, 1);

        // Tampilkan form untuk diedit
        document.getElementById(id + 'Form').classList.remove('hidden');

        // Render ulang data
        renderData(id);
    }
</script>