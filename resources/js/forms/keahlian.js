// resources/js/forms/step2/keahlian.js
import './base';

// Inisialisasi data keahlian
if (!window.tempData) {
    window.tempData = {};
}
if (!window.tempData.keahlian) {
    window.tempData.keahlian = [];
}

// Fungsi untuk mengaktifkan live preview keahlian
window.enableLivePreviewKeahlian = function () {
    const form = document.getElementById('keahlianForm');
    const inputs = form.querySelectorAll('input');
    const sectionEl = document.getElementById('sectionKeahlian');

    const updatePreview = () => {
        window.tempData._keahlianDihapus = false;
        if (sectionEl) sectionEl.style.display = '';

        // Ambil data yang sedang diketik
        const currentInput = {};
        inputs.forEach(input => {
            currentInput[input.id] = input.value || '';
        });

        // Gabungkan data yang sudah tersimpan + data yang sedang diketik (belum disimpan)
        let dataList = window.tempData.keahlian ? [...window.tempData.keahlian] : [];
        const isFormFilled = Object.values(currentInput).some(val => val && val !== false);

        // Cek apakah sedang edit
        const editIndex = form.getAttribute('data-edit-index');
        if (isFormFilled) {
            if (editIndex !== null) {
                // Jika edit, update di posisi yang diedit
                dataList[parseInt(editIndex)] = currentInput;
            } else {
                // Jika tambah baru, push ke akhir
                dataList.push(currentInput);
            }
        }

        // Render ke preview CV
        window.updateLivePreviewKeahlian(dataList);
    };

    // Pasang event listener untuk setiap input
    inputs.forEach(input => {
        input.removeEventListener('input', input._livePreviewHandler);
        input._livePreviewHandler = updatePreview;
        input.addEventListener('input', input._livePreviewHandler);
    });
};

// Fungsi untuk menyimpan data keahlian
window.saveDataKeahlian = function () {
    const form = document.getElementById('keahlianForm');
    const inputs = form.querySelectorAll('input');
    const data = {};

    // Ambil data dari form
    inputs.forEach(input => {
        data[input.id] = input.value || '';
    });

    const editIndex = form.getAttribute('data-edit-index');
    if (editIndex !== null) {
        window.tempData.keahlian[parseInt(editIndex)] = data;
        form.removeAttribute('data-edit-index');
    } else {
        window.tempData.keahlian.push(data);
    }
    // Setelah window.tempData diubah:
    window.updateSessionCV();

    console.log('Data disimpan:', data);

    // Render ulang daftar data
    renderKeahlian();

    // Reset form setelah menyimpan
    resetForm('keahlian');

    window.tempData._keahlianDihapus = false; // Reset flag
};

// Fungsi untuk merender daftar keahlian
window.renderKeahlian = function () {
    const listElement = document.getElementById('keahlianList');
    listElement.innerHTML = ''; // Kosongkan elemen sebelum menambahkan data baru

    window.tempData.keahlian.forEach((data, index) => {
        const row = document.createElement('div');
        row.className = 'flex justify-between items-center bg-white p-2 rounded-md shadow mb-2';

        row.innerHTML = `
            <div>
                <p>${data.skillName || ''}</p>
            </div>
            <div class="flex space-x-2">
                <button class="text-red-500" onclick="deleteKeahlian(${index})">X</button>
                <button class="text-blue-500" onclick="editKeahlian(${index})">✎</button>
            </div>
        `;

        listElement.appendChild(row);
    });

    // Update live preview
    updateLivePreviewKeahlian();
};

// Fungsi untuk mengedit data keahlian
window.editKeahlian = function (index) {
    const data = window.tempData.keahlian[index];
    const form = document.getElementById('keahlianForm');
    const inputs = form.querySelectorAll('input');

    // Isi form dengan data yang ada
    inputs.forEach(input => {
        input.value = data[input.id] || '';
    });

    form.setAttribute('data-edit-index', index);

    // Tambahkan event listener untuk menyimpan perubahan
    const saveButton = document.querySelector('button[onclick="saveDataKeahlian()"]');
    saveButton.onclick = function () {
        window.saveDataKeahlian();
        saveButton.onclick = saveDataKeahlian;
    };
};

// Fungsi untuk menghapus data keahlian
window.deleteKeahlian = function (index) {
    // Hapus data dari tempData
    window.tempData.keahlian.splice(index, 1);

    // Render ulang daftar data
    renderKeahlian();
};

// Fungsi untuk memperbarui live preview
window.updateLivePreviewKeahlian = function (dataList = null) {
    const previewContainer = document.getElementById('previewSkill');
    // Jika user sudah klik hapus semua, kosongkan preview (hilang total)
    if (window.tempData._keahlianDihapus) {
        previewContainer.innerHTML = '';
        return;
    }

    previewContainer.innerHTML = '';
    const keahlianList = dataList || window.tempData.keahlian || [];

    if (keahlianList.length === 0) {
        // Tampilkan template default jika belum pernah dihapus semua
        previewContainer.innerHTML = `
            <p>Prototyping Tools</p>
            <p>User Research</p>
            <p>Interaction Design</p>
            <p>Visual Design</p>
            <p>Accessibility</p>
            <p>Responsive Design</p>
        `;
        return;
    }

    keahlianList.forEach((data, index) => {
        const skillElement = document.createElement('p');
        skillElement.id = `previewSkill-${index}`;
        skillElement.innerHTML = `${data.skillName || ''}`;
        previewContainer.appendChild(skillElement);
    });
};

// Reset form
window.resetForm = function (id) {
    const form = document.getElementById(`${id}Form`);
    if (form) {
        console.log(`Resetting form: ${id}`);
        const inputs = form.querySelectorAll('input');
        inputs.forEach(input => {
            input.value = ''; // Kosongkan setiap input
        });
        form.removeAttribute('data-edit-index');
    } else {
        console.error(`Form dengan ID ${id}Form tidak ditemukan.`);
    }
};

// Fungsi untuk menghapus semua data di section tertentu
window.hapusSemuaDataSection = function(section) {
    if (section === 'keahlian') {
        window.tempData.keahlian = [];
        window.tempData._keahlianDihapus = true;
        window.updateLivePreviewKeahlian();
        // Sembunyikan seluruh section (judul, garis, dan preview)
        const sectionEl = document.getElementById('sectionKeahlian');
        if (sectionEl) sectionEl.style.display = 'none';
        if (window.updateSessionCV) window.updateSessionCV();
    }
    // ...section lain jika perlu...
};

// Panggil fungsi saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    renderKeahlian(); // Render data saat halaman dimuat
    enableLivePreviewKeahlian(); // Enable live preview saat halaman dimuat
});
