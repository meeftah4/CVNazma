// resources/js/forms/step2/keahlian.js
import './base';

// Inisialisasi data keahlian
if (!window.tempData) {
    window.tempData = {};
}
if (!window.tempData.keahlian) {
    window.tempData.keahlian = [];
}

// Definisikan handler di luar fungsi agar bisa di-remove
function livePreviewInputHandler() {
    const form = document.getElementById('keahlianForm');
    const inputs = form.querySelectorAll('input');
    const previewContainer = document.getElementById('previewSkill');

    previewContainer.innerHTML = '';

    // Ambil data yang sedang diketik
    const currentInput = {};
    inputs.forEach(input => {
        currentInput[input.id] = input.value || '';
    });

    // Gabungkan data yang sudah disimpan + data yang sedang diketik (jika ada input)
    let dataList = window.tempData.keahlian ? [...window.tempData.keahlian] : [];
    const isFormFilled = currentInput.skillName && currentInput.skillName.trim() !== '';
    const editIndex = form.getAttribute('data-edit-index');

    // Jika sedang edit dan ada input, update dataList pada index edit
    if (isFormFilled) {
        if (editIndex !== null && editIndex !== undefined) {
            dataList[parseInt(editIndex)] = currentInput;
        } else {
            // Jika sedang tambah baru, tambahkan ke list (tapi hanya untuk preview, bukan simpan)
            dataList = [...dataList, currentInput];
        }
    }

    // Jika tidak ada data sama sekali dan input kosong, tampilkan placeholder
    if ((!dataList || dataList.length === 0) && !isFormFilled) {
        const placeholderSkills = [
            'Prototyping Tools',
            'User Research',
            'Interaction Design',
            'Visual Design',
            'Accessibility',
            'Responsive Design'
        ];
        placeholderSkills.forEach(skill => {
            const skillElement = document.createElement('p');
            skillElement.innerHTML = `${skill}`;
            previewContainer.appendChild(skillElement);
        });
        return;
    }

    // Render semua data ke preview (termasuk data yang sedang diketik)
    dataList.forEach((item, index) => {
        const skillElement = document.createElement('p');
        skillElement.id = `previewSkill-${index}`;
        skillElement.innerHTML = `${item.skillName || ''}`;
        previewContainer.appendChild(skillElement);
    });
}

window.enableLivePreviewKeahlian = function () {
    const form = document.getElementById('keahlianForm');
    if (!form) return;
    const inputs = form.querySelectorAll('input');
    // Handler yang akan dipasang ke setiap input
    const handler = livePreviewInputHandler;

    // Pasang event listener ke setiap input, simpan di property agar bisa di-remove
    inputs.forEach(input => {
        if (input._livePreviewHandler) {
            input.removeEventListener('input', input._livePreviewHandler);
        }
        input._livePreviewHandler = handler;
        input.addEventListener('input', handler);
    });

    // Jalankan sekali agar preview muncul walau belum ada input
    handler();
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

    // Jangan panggil updateLivePreviewKeahlian di sini!
    // Cukup enable live preview agar handler input aktif dan preview selalu update
    enableLivePreviewKeahlian();
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

// Reset form
window.resetForm = function (id) {
    const form = document.getElementById(`${id}Form`);
    if (form) {
        const inputs = form.querySelectorAll('input');
        inputs.forEach(input => {
            input.value = '';
        });
        form.removeAttribute('data-edit-index');
        if (id === 'keahlian') {
            enableLivePreviewKeahlian();
        }
    }
};

// Panggil fungsi saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    renderKeahlian();
    enableLivePreviewKeahlian();
});
