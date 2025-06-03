// resources/js/forms/step2/hobi.js
import './base';

// Inisialisasi data hobi
if (!window.tempData) {
    window.tempData = {};
}
if (!window.tempData.hobi) {
    window.tempData.hobi = [];
}

// Fungsi untuk mengaktifkan live preview hobi
window.enableLivePreviewHobi = function () {
    const form = document.getElementById('hobiForm');
    const inputs = form.querySelectorAll('input');
    const previewContainer = document.getElementById('previewHobby');

    inputs.forEach(input => {
        input.addEventListener('input', () => {
            // Ambil semua hobi yang sudah tersimpan
            const hobiList = window.tempData.hobi.map(data => data.hobbyName).filter(Boolean);

            // Ambil input yang sedang diketik
            let inputValue = '';
            inputs.forEach(input => {
                if (input.id === 'hobbyName') {
                    inputValue = input.value.trim();
                }
            });

            // Gabungkan data tersimpan dan input (jika sedang tambah baru)
            const form = document.getElementById('hobiForm');
            const editIndex = form.getAttribute('data-edit-index');
            let previewList = [...hobiList];
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
                previewContainer.innerHTML = `<p><strong>Hobi:</strong> ${previewList.join(', ')}</p>`;
            } else {
                previewContainer.innerHTML = `<p><strong>Hobi:</strong> Tenis Lapangan</p>`;
            }
        });
    });
};

// Fungsi untuk menyimpan data hobi
window.saveDataHobi = function () {
    const form = document.getElementById('hobiForm');
    const inputs = form.querySelectorAll('input');
    const data = {};

    // Ambil data dari form
    inputs.forEach(input => {
        data[input.id] = input.value || '';
    });

    const editIndex = form.getAttribute('data-edit-index');
    if (editIndex !== null) {
        window.tempData.hobi[parseInt(editIndex)] = data;
        form.removeAttribute('data-edit-index');
    } else {
        window.tempData.hobi.push(data);
    }
    // Setelah window.tempData diubah:
    window.updateSessionCV();

    console.log('Data hobi disimpan:', data);

    // Reset form terlebih dahulu
    resetForm('hobi');

    // Baru render ulang daftar data & update preview
    renderHobi();
};

// Fungsi untuk merender daftar hobi
window.renderHobi = function () {
    const listElement = document.getElementById('hobiList');
    listElement.innerHTML = ''; // Kosongkan elemen sebelum menambahkan data baru

    window.tempData.hobi.forEach((data, index) => {
        const row = document.createElement('div');
        row.className = 'flex justify-between items-center bg-white p-2 rounded-md shadow mb-2';

        row.innerHTML = `
            <div>
                <p>${data.hobbyName || ''}</p>
            </div>
            <div class="flex space-x-2">
                <button class="text-red-500" onclick="deleteHobi(${index})">X</button>
                <button class="text-blue-500" onclick="editHobi(${index})">✎</button>
            </div>
        `;

        listElement.appendChild(row);
    });

    // Update live preview
    updateLivePreviewHobi();
};

// Fungsi untuk mengedit data hobi
window.editHobi = function (index) {
    const data = window.tempData.hobi[index];
    const form = document.getElementById('hobiForm');
    const inputs = form.querySelectorAll('input');

    // Isi form dengan data yang ada
    inputs.forEach(input => {
        input.value = data[input.id] || '';
    });

    form.setAttribute('data-edit-index', index);

    // Tambahkan event listener untuk menyimpan perubahan
    const saveButton = document.querySelector('button[onclick="saveDataHobi()"]');
    saveButton.onclick = function () {
        window.saveDataHobi();
        saveButton.onclick = saveDataHobi;
    };
};

// Fungsi untuk menghapus data hobi
window.deleteHobi = function (index) {
    // Hapus data dari tempData
    window.tempData.hobi.splice(index, 1);

    // Render ulang daftar data
    renderHobi();
};

// Fungsi untuk memperbarui live preview
window.updateLivePreviewHobi = function () {
    const previewContainer = document.getElementById('previewHobby');
    const hobiList = window.tempData.hobi.map(data => data.hobbyName).filter(Boolean);

    previewContainer.innerHTML = '';
    if (hobiList.length > 0) {
        previewContainer.innerHTML = `<p><strong>Hobi:</strong> ${hobiList.join(', ')}</p>`;
    } else {
        previewContainer.innerHTML = `<p><strong>Hobi:</strong> Tenis Lapangan</p>`;
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
    renderHobi(); // Render data saat halaman dimuat
    enableLivePreviewHobi(); // Enable live preview saat halaman dimuat
});
