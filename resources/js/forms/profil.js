window.saveData = function (id) {
    const descriptionInput = document.getElementById('descriptionInput').value;

    // Cek apakah data sudah ada
    if (window.tempData[id].length > 0) {
        // Update hanya field description, field lain tetap ada
        window.tempData[id][0].description = descriptionInput;
    } else {
        // Simpan data baru, field lain kosong
        window.tempData[id].push({ description: descriptionInput });
    }

    // Update tampilan data di atas form
    renderDataRow(id);

    // Update live preview
    updateLivePreview(id);

    // Setelah window.tempData diubah:
    window.updateSessionCV();

    // Sembunyikan form setelah menyimpan
    const form = document.getElementById(`${id}Form`);
    if (form) {
        form.classList.add('hidden');
    }
};

window.editData = function (id) {
    // Tampilkan form untuk edit
    const form = document.getElementById(`${id}Form`);
    if (form) {
        form.classList.remove('hidden');
    }

    // Isi form dengan data yang ada
    loadData(id);
};

window.updateLivePreview = function (id) {
    const descriptionInput = document.getElementById('descriptionInput');
    const previewElement = document.getElementById(`preview${capitalizeFirstLetter(id)}`);

    if (descriptionInput && previewElement) {
        const value = descriptionInput.value.trim();
        if (value) {
            previewElement.innerHTML = `<p class="text-gray-600">${value}</p>`;
        } else {
            previewElement.innerHTML = ''; // Tidak tampilkan apapun jika kosong
        }
    }
};

// Tambahkan event listener untuk live preview
window.attachLivePreview = function (id) {
    const descriptionInput = document.getElementById('descriptionInput');
    if (descriptionInput) {
        descriptionInput.addEventListener('input', function () {
            updateLivePreview(id);
        });
    }
};

window.renderDataRow = function (id) {
    const listElement = document.getElementById(`${id}List`);
    listElement.innerHTML = ''; // Kosongkan elemen sebelum menambahkan data baru

    if (window.tempData[id].length > 0) {
        const data = window.tempData[id][0];
        const row = document.createElement('div');
        row.className = 'flex justify-between items-center bg-white p-2 rounded-md shadow mb-2';

        row.innerHTML = `
            <p class="text-gray-700">${data.description}</p>
            <div class="flex space-x-2">
                <button class="text-red-500" onclick="deleteData('${id}')">X</button>
                <button class="text-blue-500" onclick="editData('${id}')">✎</button>
            </div>
        `;

        listElement.appendChild(row);
    }
};

window.deleteData = function (id) {
    window.tempData[id] = [];
    renderDataRow(id);

    // Tampilkan contoh/default pada preview profil
    const previewElement = document.getElementById(`preview${capitalizeFirstLetter(id)}`);
    if (previewElement) {
        previewElement.innerHTML = `<p class="text-gray-600 mt-4 break-words">
            Lulusan [Nama Jurusan] dari [Nama Universitas] dengan ketertarikan tinggi pada bidang [bidang yang dilamar, 
            misal: UI/UX Design, Data Analysis, Digital Marketing]. Memiliki pengalaman organisasi dan proyek yang mengasah 
            kemampuan [contoh: desain visual, riset pengguna, dan analisis data]. Terbiasa menggunakan [sebutkan tools] dan siap 
            berkontribusi secara profesional dalam tim.
        </p>`;
    }

    // Kosongkan input form
    const form = document.getElementById(`${id}Form`);
    if (form) {
        const input = form.querySelector('#descriptionInput');
        if (input) input.value = '';
        form.classList.remove('hidden');
    }
};