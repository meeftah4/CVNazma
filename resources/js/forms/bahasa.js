// resources/js/forms/step2/keahlian.js
import './base';

// Inisialisasi data keahlian
if (!window.tempData) {
    window.tempData = {};
}
if (!window.tempData.bahasa) {
    window.tempData.bahasa = [];
}

// Fungsi untuk mengaktifkan live preview keahlian
window.enableLivePreviewBahasa = function () {
    const form = document.getElementById('bahasaForm');
    const inputs = form.querySelectorAll('input');
    const previewContainer = document.getElementById('previewBahasa');

    const updatePreview = () => {
        // RESET FLAG jika user mulai input lagi
        window.tempData._bahasaDihapus = false;

        // Ambil semua bahasa yang sudah tersimpan
        const bahasaList = window.tempData.bahasa.map(data => data.languageName).filter(Boolean);

        // Ambil input yang sedang diketik
        let inputValue = '';
        inputs.forEach(input => {
            if (input.id === 'languageName') {
                inputValue = input.value.trim();
            }
        });

        // Gabungkan data tersimpan dan input (jika sedang tambah baru)
        const editIndex = form.getAttribute('data-edit-index');
        let previewList = [...bahasaList];
        if ((editIndex === null || editIndex === undefined) && inputValue) {
            previewList.push(inputValue);
        }
        if (editIndex !== null && inputValue) {
            previewList[parseInt(editIndex)] = inputValue;
        }

        // Jika user sudah klik hapus semua, kosongkan preview
        if (window.tempData._bahasaDihapus) {
            previewContainer.innerHTML = '';
            return;
        }

        // Tampilkan preview
        if (previewList.length > 0) {
            previewContainer.innerHTML = `<p><strong>Bahasa:</strong> ${previewList.join(', ')}</p>`;
        } else {
            previewContainer.innerHTML = `<p><strong>Bahasa:</strong> English, French, Mandarin</p>`;
        }
    };

    inputs.forEach(input => {
        input.removeEventListener('input', input._livePreviewHandler);
        input._livePreviewHandler = updatePreview;
        input.addEventListener('input', input._livePreviewHandler);
    });
};

// Fungsi untuk menyimpan data keahlian
window.saveDataBahasa = function () {
    const form = document.getElementById('bahasaForm');
    const inputs = form.querySelectorAll('input');
    const data = {};

    // Ambil data dari form
    inputs.forEach(input => {
        data[input.id] = input.value || '';
    });

    const editIndex = form.getAttribute('data-edit-index');
    if (editIndex !== null) {
        window.tempData.bahasa[parseInt(editIndex)] = data;
        form.removeAttribute('data-edit-index');
    } else {
        window.tempData.bahasa.push(data);
    }
    // Setelah window.tempData diubah:
    window.updateSessionCV();

    console.log('Data disimpan:', data);

    // Reset form terlebih dahulu
    resetForm('bahasa');

    // Baru render ulang daftar data & update preview
    renderBahasa();

    window.tempData._bahasaDihapus = false; // Reset flag saat user input/simpan
};

// Fungsi untuk merender daftar keahlian
window.renderBahasa = function () {
    const listElement = document.getElementById('bahasaList');
    listElement.innerHTML = ''; // Kosongkan elemen sebelum menambahkan data baru

    window.tempData.bahasa.forEach((data, index) => {
        const row = document.createElement('div');
        row.className = 'flex justify-between items-center bg-white p-2 rounded-md shadow mb-2';

        row.innerHTML = `
            <div>
                <p>${data.languageName || ''}</p>
            </div>
            <div class="flex space-x-2">
                <button class="text-red-500" onclick="deleteBahasa(${index})">X</button>
                <button class="text-blue-500" onclick="editBahasa(${index})">✎</button>
            </div>
        `;

        listElement.appendChild(row);
    });

    // Update live preview
    updateLivePreviewBahasa();
};

// Fungsi untuk mengedit data keahlian
window.editBahasa = function (index) {
    const data = window.tempData.bahasa[index];
    const form = document.getElementById('bahasaForm');
    const inputs = form.querySelectorAll('input');

    // Isi form dengan data yang ada
    inputs.forEach(input => {
        input.value = data[input.id] || '';
    });

    form.setAttribute('data-edit-index', index);

    // Tambahkan event listener untuk menyimpan perubahan
    const saveButton = document.querySelector('button[onclick="saveDataBahasa()"]');
    saveButton.onclick = function () {
        window.saveDataBahasa();
        saveButton.onclick = saveDataBahasa;
    };
};

// Fungsi untuk menghapus data keahlian
window.deleteBahasa = function (index) {
    // Hapus data dari tempData
    window.tempData.bahasa.splice(index, 1);

    // Render ulang daftar data
    renderBahasa();
};

// Fungsi untuk memperbarui live preview
window.updateLivePreviewBahasa = function (dataList = null) {
    const previewContainer = document.getElementById('previewBahasa');
    const bahasaList = (dataList || window.tempData.bahasa || []).map(data => data.languageName).filter(Boolean);

    // Jika user sudah klik hapus semua, kosongkan preview (hilang total)
    if (window.tempData._bahasaDihapus) {
        previewContainer.innerHTML = '';
        return;
    }

    if (bahasaList.length > 0) {
        previewContainer.innerHTML = `<p><strong>Bahasa:</strong> ${bahasaList.join(', ')}</p>`;
    } else {
        // Tampilkan contoh default di awal
        previewContainer.innerHTML = `<p><strong>Bahasa:</strong> English, French, Mandarin</p>`;
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

// Hapus semua data section
window.hapusSemuaDataSection = function(section) {
    if (section === 'bahasa') {
        window.tempData.bahasa = [];
        window.tempData._bahasaDihapus = true; // Set flag agar preview hilang total
        window.updateLivePreviewBahasa();
    }
    // ...section lain...
};

// Panggil fungsi saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    renderBahasa(); // Render data saat halaman dimuat
    enableLivePreviewBahasa(); // Enable live preview saat halaman dimuat
});
