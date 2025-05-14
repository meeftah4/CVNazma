{{-- filepath: d:\Magang\CVNazma\resources\views\forms\step2.blade.php --}}
<style>
/* Membatasi tinggi elemen daftar dan membuatnya expand */
#profilList, #pengalamankerjaList, #proyekList, #keahlianList, #pendidikanList, #bahasaList, #sertifikatList, #hobiList {
    max-height: none; /* Tidak ada batas tinggi */
    overflow-y: visible; /* Biarkan konten meluas ke bawah */
}

/* Membungkus teks panjang di elemen daftar */
.break-words {
    word-wrap: break-word;
    overflow-wrap: break-word;
    white-space: normal; /* Pastikan teks tidak dalam satu baris */
    word-break: break-all; /* Memaksa pemecahan kata panjang agar tidak overflow horizontal */
}
</style>

<div id="step-2" class="step hidden">
    <h2 class="text-xl mb-4">Langkah 2: Informasi Tambahan</h2>

    @foreach (['Profil', 'Pengalaman Kerja', 'Proyek', 'Keahlian', 'Pendidikan', 'Bahasa', 'Sertifikat', 'Hobi'] as $field)
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
        proyek: [],
        keahlian: [],
        pendidikan: [],
        bahasa: [],
        sertifikat: [],
        hobi: []
    };

    function toggleDropdown(id) {
        console.log(`toggleDropdown called with id: ${id}`);
        const dropdown = document.getElementById(id + 'Dropdown');
        const button = document.querySelector(`[onclick="toggleDropdown('${id}')"] span:last-child`);

        // Tampilkan atau sembunyikan dropdown
        dropdown.classList.toggle('hidden');

        // Ubah simbol "+" menjadi "-" atau sebaliknya
        if (dropdown.classList.contains('hidden')) {
            button.textContent = "+"; // Jika dropdown disembunyikan
        } else {
            button.textContent = "-"; // Jika dropdown ditampilkan
        }

        // Tampilkan atau sembunyikan form target
        const form = document.getElementById(id + 'Form');
        if (form) {
            form.classList.toggle('hidden');
            console.log(`Form ${id} visibility toggled`);
        } else {
            console.log(`Form ${id} not found`);
        }
    }

    function saveData(id) {
    console.log(`saveData called with id: ${id}`);
    const inputs = document.querySelectorAll(`#${id}Form input, #${id}Form textarea`);
    const data = {};

    // Ambil nilai dari semua input dan textarea
    inputs.forEach(input => {
        data[input.id] = input.value || ''; // Simpan nilai input ke dalam objek data
    });

    console.log(`Data to save:`, data);

    // Pastikan array untuk kategori `id` ada di `tempData`
    if (!tempData[id]) {
        tempData[id] = [];
    }

    // Tambahkan data ke array `tempData`
    tempData[id].push(data);

    console.log(`Data saved for ${id}:`, tempData[id]);

    // Render ulang data yang disimpan ke live preview
    renderData(id);

    // Reset form setelah data disimpan
    resetForm(id);
}

    function renderData(id) {
        const listContainer = document.getElementById(id + 'List');
        const previewContainer = document.getElementById(`preview${capitalizeFirstLetter(id)}`);
        listContainer.innerHTML = '';

        // Pastikan label "Bahasa:" tetap ada hanya untuk bagian bahasa
        if (id === 'bahasa') {
            previewContainer.innerHTML = '<p class="text-gray-500"><strong>Bahasa:</strong> </p>';
        } else {
            previewContainer.innerHTML = '';
        }

        if (!tempData[id] || tempData[id].length === 0) {
            return; // Jika tidak ada data, hanya tampilkan label
        }

        // Render data yang ada di `tempData`
        tempData[id].forEach((item, index) => {
            let entry = '';
            if (id === 'pengalamankerja') {
                entry = `
                   <div class="mb-4">
                    <div class="flex justify-between items-center">
                        <p><strong>${item.jobPosition || 'Posisi tidak tersedia'}</strong></p>
                        <div class="flex space-x-2">
                            <button class="text-red-500" onclick="deleteData('${id}', ${index})">X</button>
                            <button class="text-blue-500" onclick="editData('${id}', ${index})">✎</button>
                        </div>
                    </div>
                    <p class="text-gray-500">${item.startDate ? formatDate(item.startDate) : ''} - ${isPresent ? 'Present' : item.endDate ? formatDate(item.endDate) : ''}</p>
                </div>
            `;
            } if (id === 'pendidikan') {
                entry = `
                   <div class="mb-4">
                    <div class="flex justify-between items-center">
                        <p><strong>${item.educationDegree || 'Gelar tidak tersedia'}</strong></p>
                        <div class="flex space-x-2">
                            <button class="text-red-500" onclick="deleteData('${id}', ${index})">X</button>
                            <button class="text-blue-500" onclick="editData('${id}', ${index})">✎</button>
                        </div>
                    </div>
                    <p class="text-gray-500">${item.educationStartDate ? formatDate(item.educationStartDate) : ''} - ${isPresent ? 'Present' : item.educationEndDate ? formatDate(item.educationEndDate) : ''}</p>
                </div>
            `;

            } else {
                entry = `
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <p class="text-gray-700 font-bold break-words">${item.languageName || item.descriptionInput || ''}</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-red-500" onclick="deleteData('${id}', ${index})">X</button>
                            <button class="text-blue-500" onclick="editData('${id}', ${index})">✎</button>
                        </div>
                    </div>
                `;
            }

            listContainer.innerHTML += entry;
            

            // Tambahkan data ke preview
            if (id === 'bahasa') {
                const languages = tempData[id].map(item => item.languageName || '').join(', ');
                previewContainer.innerHTML = `<p class="text-gray-500 break-words"><strong>Bahasa:</strong> ${languages}</p>`;
            } else if (id !== 'pengalamankerja') {
                previewContainer.innerHTML += `<p class="break-words">${item.descriptionInput || ''}</p>`;
            }
        });

        // Khusus untuk bagian pengalaman kerja, perbarui preview dengan format yang lebih terstruktur
        if (id === 'pengalamankerja') {
            previewContainer.innerHTML = ''; // Kosongkan preview sebelum menambahkan data baru
            tempData[id].forEach(item => {
                const entry = `
                    <div class="mb-4">
                        <div class="flex justify-between items-center">
                            <p><strong>${item.companyName || 'Nama Perusahaan tidak tersedia'}</strong> - ${item.jobCity || 'Kota tidak tersedia'}</p>
                            ${item.startDate || isPresent ? `<p class="text-gray-500">${formatDate(item.startDate)} - ${isPresent ? 'Present' : formatDate(item.endDate)}</p>` : ''}                        </div>
                        <p>${item.jobPosition || 'Posisi tidak tersedia'}</p>
                        <ul class="list-disc pl-5 text-gray-600">
                            ${item.jobDescription
                                ? item.jobDescription
                                      .split('\n')
                                      .map(desc => `<li>${desc}</li>`)
                                      .join('')
                                : '<li>Deskripsi tidak tersedia</li>'}
                        </ul>
                    </div>
                `;
                previewContainer.innerHTML += entry; // Tambahkan data ke preview
            });
        }
    }

    function updateLivePreview(id) {
        const inputs = document.querySelectorAll(`#${id}Form input, #${id}Form textarea`);
        const previewContainer = document.getElementById(`preview${capitalizeFirstLetter(id)}`);

        let hasContent = false;
        let previewContent = id === 'bahasa' ? '<p class="text-gray-500"><strong>Bahasa:</strong></p>' : '';

        inputs.forEach(input => {
            if (input.value.trim()) {
                hasContent = true;
                previewContent += `<p class="break-words">${input.value}</p>`;
            }
        });

        previewContainer.innerHTML = hasContent ? previewContent : '';
    }


    function resetForm(id) {
        const inputs = document.querySelectorAll(`#${id}Form input, #${id}Form textarea`);
        inputs.forEach(input => input.value = '');
        const isPresentCheckbox = document.getElementById('isPresent');
        if (isPresentCheckbox) {
            isPresentCheckbox.checked = false;
            toggleEndDate(); // Pastikan tanggal selesai diaktifkan kembali
        }
    }

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    function deleteData(id, index) {
        // Hapus data dari tempData
        tempData[id].splice(index, 1);

        // Render ulang data untuk memperbarui preview
        renderData(id);
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

    // Tambahkan event listener untuk tombol simpan
    const saveButton = document.querySelector(`#${id}Form button[onclick="saveData('${id}')"]`);
    saveButton.onclick = () => {
        // Simpan data yang diedit
        const updatedData = {};
        inputs.forEach(input => {
            updatedData[input.id] = input.value || '';
        });

        // Tambahkan data yang diperbarui ke tempData
        tempData[id].splice(index, 0, updatedData);

        // Render ulang data
        renderData(id);

        // Reset form setelah data disimpan
        resetForm(id);

        // Kembalikan fungsi tombol simpan ke default
        saveButton.onclick = () => saveData(id);
    };
}

    function enableLivePreviewPengalamanKerja() {
        const inputs = document.querySelectorAll('#pengalamankerjaForm input, #pengalamankerjaForm textarea');
        const previewContainer = document.getElementById('previewPengalamankerja');

        inputs.forEach(input => {
            input.addEventListener('input', () => {
                const data = {};

                // Ambil nilai dari semua input dan textarea
                inputs.forEach(input => {
                    data[input.id] = input.value || '';
                });

                const isPresent = document.getElementById('isPresent').checked;

                // Render data langsung ke live preview
                previewContainer.innerHTML = `
                    <div class="mb-4">
                        <div class="flex justify-between items-center">
                            <p><strong>${data.companyName || ''}</strong>${data.jobCity ? ` - ${data.jobCity}` : ''}</p>
                            ${data.startDate || isPresent ? `<p class="text-gray-500">${formatDate(data.startDate)} - ${isPresent ? 'Present' : formatDate(data.endDate)}</p>` : ''}
                        </div>
                        ${data.jobPosition ? `<p>${data.jobPosition}</p>` : ''}
                        ${data.jobDescription ? `
                            <ul class="list-disc pl-5 text-gray-600">
                                ${data.jobDescription.split('\n').map(desc => `<li>${desc}</li>`).join('')}
                            </ul>
                        ` : ''}
                    </div>
                `;
            });
        });
    }

    function enableLivePreviewPendidikan() {
        const inputs = document.querySelectorAll('#pendidikanForm input, #pendidikanForm textarea');
        const previewContainer = document.getElementById('previewEducation');

        inputs.forEach(input => {
            input.addEventListener('input', () => {
                const data = {};

                // Ambil nilai dari semua input dan textarea
                inputs.forEach(input => {
                    data[input.id] = input.value || '';
                });

                // Render data langsung ke live preview
                previewContainer.innerHTML = `
                    <div class="mb-4">
                        <div class="flex justify-between items-center">
                            <p><strong>${data.educationInstitution || ''}</strong></p>
                            ${data.educationStartDate || isPresent ? `<p class="text-gray-500">${formatDate(data.educationStartDate)} - ${isPresent ? 'Present' : formatDate(data.educationEndDate)}</p>` : ''}
                        </div>
                        ${data.educationDegree ? `<p>${data.educationDegree}</p>` : ''}
                        ${data.educationDegree ? `
                            <ul class="list-disc pl-5 text-gray-600">
                                ${data.educationDescription.split('\n').map(desc => `<li>${desc}</li>`).join('')}
                            </ul>
                        ` : ''}
                    </div>
                `;
            });
        });
    }

    // Fungsi untuk memformat tanggal menjadi "Jan 2024"
function formatDate(date) {
    if (!date) return '';
    const options = { year: 'numeric', month: 'short' };
    return new Date(date).toLocaleDateString('en-US', options);
}

        // Panggil fungsi saat halaman dimuat
    document.addEventListener('DOMContentLoaded', () => {
        enableLivePreviewPengalamanKerja();
        enableLivePreviewPendidikan();
    });

    function toggleEndDate() {
        const isPresentCheckbox = document.getElementById('isPresent');
        const endDateInput = document.getElementById('endDate');

        if (isPresentCheckbox.checked) {
            endDateInput.value = ''; // Kosongkan nilai tanggal selesai
            endDateInput.disabled = true; // Nonaktifkan input
        } else {
            endDateInput.disabled = false; // Aktifkan kembali input
        }
    }
</script>