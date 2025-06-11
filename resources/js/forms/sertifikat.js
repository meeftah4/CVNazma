// resources/js/forms/step2/sertifikat.js
import './base';

// Inisialisasi data sertifikat
if (!window.tempData) {
    window.tempData = {};
}
if (!window.tempData.sertifikat) {
    window.tempData.sertifikat = [];
}

// Fungsi untuk mengaktifkan live preview sertifikat
window.enableLivePreviewSertifikat = function () {
    const form = document.getElementById('sertifikatForm');
    if (!form) return;
    const inputs = form.querySelectorAll('input');
    const previewContainer = document.getElementById('previewCertificate');

    function updatePreview() {
        // Tampilkan kembali section preview jika sebelumnya di-hide
        if (previewContainer) previewContainer.style.display = '';

        // Ambil semua sertifikat yang sudah tersimpan
        let sertifikatList = window.tempData.sertifikat.map(data => data.certificateName).filter(Boolean);

        // Ambil input yang sedang diketik
        let inputValue = '';
        inputs.forEach(input => {
            if (input.id === 'certificateName') {
                inputValue = input.value.trim();
            }
        });

        // Gabungkan data tersimpan dan input (jika sedang tambah baru)
        const editIndex = form.getAttribute('data-edit-index');
        let previewList = [...sertifikatList];
        if ((editIndex === null || editIndex === undefined) && inputValue) {
            previewList.push(inputValue);
        }
        // Jika sedang edit, ganti data pada index yang diedit dengan input
        if (editIndex !== null && inputValue) {
            previewList[parseInt(editIndex)] = inputValue;
        }

        // Tampilkan preview
        previewContainer.innerHTML = '';
        if (previewList.length > 0) {
            previewContainer.innerHTML = `<p><strong>Sertifikat:</strong> ${previewList.join(', ')}</p>`;
        } else {
            previewContainer.innerHTML = `<p><strong>Sertifikat:</strong> Professional Design Engineer (PDE) License, Project Management Tech (PMT), Structural Process Design (SPD)</p>`;
        }
    }

    // Pasang event listener ke setiap input
    inputs.forEach(input => {
        input.addEventListener('input', updatePreview);
    });

    // Jalankan sekali agar preview muncul walau belum ada input
    updatePreview();
};

// Fungsi untuk menyimpan data sertifikat
window.saveDataSertifikat = function () {
    const form = document.getElementById('sertifikatForm');
    const inputs = form.querySelectorAll('input');
    const data = {};

    // Ambil data dari form
    inputs.forEach(input => {
        data[input.id] = input.value || '';
    });

    const editIndex = form.getAttribute('data-edit-index');
    if (editIndex !== null) {
        window.tempData.sertifikat[parseInt(editIndex)] = data;
        form.removeAttribute('data-edit-index');
    } else {
        window.tempData.sertifikat.push(data);
    }

    // Setelah window.tempData diubah:
    window.updateSessionCV();

    console.log('Data sertifikat disimpan:', data);

    // Reset form terlebih dahulu
    resetForm('sertifikat');

    // Baru render ulang daftar data & update preview
    renderSertifikat();
};

// Fungsi untuk merender daftar sertifikat
window.renderSertifikat = function () {
    const listElement = document.getElementById('sertifikatList');
    listElement.innerHTML = ''; // Kosongkan elemen sebelum menambahkan data baru

    window.tempData.sertifikat.forEach((data, index) => {
        const row = document.createElement('div');
        row.className = 'flex justify-between items-center bg-white p-2 rounded-md shadow mb-2';

        row.innerHTML = `
            <div class="pl-4 flex-1">
                <p>${data.certificateName || ''}</p>
            </div>
            <div class="flex items-start space-x-2 h-full pr-4">
                <button class="text-red-500 font-bold" onclick="deleteSertifikat(${index})">X</button>
                <button class="text-blue-500" onclick="editSertifikat(${index})">✎</button>
            </div>
        `;

        listElement.appendChild(row);
    });

    // Update live preview
    updateLivePreviewSertifikat();
};

// Fungsi untuk mengedit data sertifikat
window.editSertifikat = function (index) {
    const data = window.tempData.sertifikat[index];
    const form = document.getElementById('sertifikatForm');
    const inputs = form.querySelectorAll('input');

    // Isi form dengan data yang ada
    inputs.forEach(input => {
        input.value = data[input.id] || '';
    });

    form.setAttribute('data-edit-index', index);

    // Tambahkan event listener untuk menyimpan perubahan
    const saveButton = document.querySelector('button[onclick="saveData(\'sertifikat\')"]');
    saveButton.onclick = function () {
        window.saveDataSertifikat();
        saveButton.onclick = function () { window.saveDataSertifikat(); };
    };
};

// Fungsi untuk menghapus data sertifikat
window.deleteSertifikat = function (index) {
    // Hapus data dari tempData
    window.tempData.sertifikat.splice(index, 1);

    // Render ulang daftar data
    renderSertifikat();
};

// Fungsi untuk memperbarui live preview
window.updateLivePreviewSertifikat = function () {
    const previewContainer = document.getElementById('previewCertificate');
    const sertifikatList = window.tempData.sertifikat.map(data => data.certificateName).filter(Boolean);

    previewContainer.innerHTML = '';
    if (sertifikatList.length > 0) {
        previewContainer.innerHTML = `<p><strong>Sertifikat:</strong> ${sertifikatList.join(', ')}</p>`;
    } else {
        previewContainer.innerHTML = `<p><strong>Sertifikat:</strong> Professional Design Engineer (PDE) License, Project Management Tech (PMT), Structural Process Design (SPD)</p>`;
    }
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
    // Jangan update preview di sini!
};

// Panggil fungsi saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    renderSertifikat(); // Render data saat halaman dimuat
    enableLivePreviewSertifikat(); // Enable live preview saat halaman dimuat
});
