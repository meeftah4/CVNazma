import './base';

// Inisialisasi tempData jika belum ada
window.tempData = window.tempData || {};
window.tempData.proyek = window.tempData.proyek || [];

// Tambahkan variabel global untuk index edit
window.editIndexProyek = null;

// Fungsi untuk mengaktifkan live preview secara real-time
window.enableLivePreviewProyek = function () {
    const form = document.getElementById('proyekForm');
    if (!form) return;

    const inputs = form.querySelectorAll('input, textarea');
    const previewContainer = document.getElementById('previewProject');
    const sectionEl = document.getElementById('sectionProyek');

    const updatePreview = () => {
        // Ambil data yang sedang diketik
        const currentInput = {};
        inputs.forEach(input => {
            if (input.type === 'checkbox') {
                currentInput[input.id] = input.checked;
            } else {
                currentInput[input.id] = input.value || '';
            }
        });

        // Gabungkan data yang sudah disimpan + data yang sedang diketik (belum disimpan)
        let dataList = window.tempData.proyek ? [...window.tempData.proyek] : [];
        const isFormFilled = Object.values(currentInput).some(val => val && val !== false);
        if (isFormFilled) {
            dataList.push(currentInput);
        }

        // --- Tampilkan/hide section sesuai data ---
        if (sectionEl) {
            if (dataList.length > 0) {
                sectionEl.style.display = '';
            } else {
                sectionEl.style.display = 'none';
            }
        }

        // Render ke preview CV
        previewContainer.innerHTML = '';
        dataList.forEach((data, index) => {
            let previewRow = document.createElement('div');
            previewRow.id = `previewProject-${index}`;
            previewRow.className = 'mb-4';
            previewRow.innerHTML = `
                <div class="flex justify-between items-center">
                    <p><strong>${data.projectName || ''}</strong></p>
                    ${data.projectStartDate || data.isPresent ? `<p class="text-gray-500">${formatDate(data.projectStartDate)} - ${data.isPresent ? 'Present' : formatDate(data.projectEndDate)}</p>` : ''}
                </div>
                ${data.projectPosition ? `<p class="italic text-gray-600">${data.projectPosition}</p>` : ''}
                ${data.projectDescription ? `
                    <ul class="list-disc pl-5 text-gray-600">
                        ${data.projectDescription.split('\n').map(desc => `<li>${desc}</li>`).join('')}
                    </ul>
                ` : ''}
            `;
            previewContainer.appendChild(previewRow);
        });
    };

    // Pasang event listener untuk setiap input
    inputs.forEach(input => {
        input.removeEventListener('input', input._livePreviewHandler);
        input._livePreviewHandler = updatePreview;
        input.addEventListener('input', input._livePreviewHandler);
    });
};

// Fungsi untuk memperbarui live preview proyek di CV setelah data disimpan
function updateLivePreviewProyek() {
    const previewContainer = document.getElementById('previewProject');
    const sectionEl = document.getElementById('sectionProyek'); // Pastikan id section di blade: id="sectionProyek"
    previewContainer.innerHTML = '';

    if (!window.tempData.proyek || window.tempData.proyek.length === 0) {
        // Sembunyikan section jika kosong
        if (sectionEl) sectionEl.style.display = 'none';
        return;
    } else {
        // Tampilkan section jika ada data
        if (sectionEl) sectionEl.style.display = '';
    }

    // Tambahkan setiap data proyek ke live preview
    window.tempData.proyek.forEach((data, index) => {
        let previewRow = document.getElementById(`previewProject-${index}`);
        if (!previewRow) {
            previewRow = document.createElement('div');
            previewRow.id = `previewProject-${index}`;
            previewRow.className = 'mb-4';
            previewContainer.appendChild(previewRow);
        }

        previewRow.innerHTML = `
            <div class="flex justify-between items-center">
                <p><strong>${data.projectName || ''}</strong></p>
                ${data.projectStartDate || data.isPresent ? `<p class="text-gray-500">${formatDate(data.projectStartDate)} - ${data.isPresent ? 'Present' : formatDate(data.projectEndDate)}</p>` : ''}
            </div>
            ${data.projectPosition ? `<p class="italic text-gray-600">${data.projectPosition}</p>` : ''}
            ${data.projectDescription ? `
                <ul class="list-disc pl-5 text-gray-600">
                    ${data.projectDescription.split('\n').map(desc => `<li>${desc}</li>`).join('')}
                </ul>
            ` : ''}
        `;
    });
}

// Fungsi untuk menyimpan data proyek
window.saveDataProyek = function () {
    const form = document.getElementById('proyekForm');
    const inputs = form.querySelectorAll('input, textarea');
    const data = {};

    // Ambil data dari form
    inputs.forEach(input => {
        if (input.type === 'checkbox') {
            data[input.id] = input.checked;
        } else {
            data[input.id] = input.value || '';
        }
    });

    if (window.editIndexProyek !== null) {
        // Jika sedang edit, update data pada index
        window.tempData.proyek[window.editIndexProyek] = data;
        window.editIndexProyek = null;
    } else {
        // Jika tambah baru, push data
        window.tempData.proyek.push(data);
    }

    // Setelah window.tempData diubah:
    window.updateSessionCV();

    // Render ulang daftar data
    renderProyek();

    // Perbarui live preview di CV
    updateLivePreviewProyek();

    // Reset form setelah menyimpan
    resetForm('proyek');
};

// Fungsi untuk merender daftar proyek
window.renderProyek = function () {
    const listElement = document.getElementById('proyekList');
    listElement.innerHTML = ''; // Kosongkan elemen sebelum menambahkan data baru

    if (!window.tempData.proyek || window.tempData.proyek.length === 0) {
        listElement.innerHTML = ``;
        return;
    }

    window.tempData.proyek.forEach((data, index) => {
        const row = document.createElement('div');
        row.className = 'flex justify-between items-center bg-white p-2 rounded-md shadow mb-2';

        row.innerHTML = `
            <div>
                <p><strong>${data.projectName || ''}</strong></p>
                ${data.projectStartDate || data.isPresent ? `<p class="text-gray-500">${formatDate(data.projectStartDate)} - ${data.isPresent ? 'Present' : formatDate(data.projectEndDate)}</p>` : ''}
                ${data.projectPosition ? `<p class="italic text-gray-600">${data.projectPosition}</p>` : ''}
                ${data.projectDescription ? `
                    <ul class="list-disc pl-5 text-gray-600">
                        ${data.projectDescription.split('\n').map(desc => `<li>${desc}</li>`).join('')}
                    </ul>
                ` : ''}
            </div>
            <div class="flex space-x-2">
                <button class="text-red-500" onclick="deleteProyek(${index})">X</button>
                <button class="text-blue-500" onclick="editProyek(${index})">✎</button>
            </div>
        `;

        listElement.appendChild(row);
    });
};

// Fungsi untuk mengedit data proyek
window.editProyek = function (index) {
    const data = window.tempData.proyek[index];
    const form = document.getElementById('proyekForm');
    const inputs = form.querySelectorAll('input, textarea');

    // Isi form dengan data yang ada
    inputs.forEach(input => {
        if (input.type === 'checkbox') {
            input.checked = data[input.id];
        } else {
            input.value = data[input.id] || '';
        }
    });

    // Simpan index yang sedang diedit
    window.editIndexProyek = index;

    // Perbarui live preview setelah load ulang form
    enableLivePreviewProyek();
};

// Fungsi untuk menghapus data proyek
window.deleteProyek = function (index) {
    // Hapus data dari tempData
    window.tempData.proyek.splice(index, 1);

    // Render ulang daftar data
    renderProyek();

    // Perbarui live preview di CV
    updateLivePreviewProyek();
};

// Fungsi untuk mereset form
function resetForm(formId) {
    const form = document.getElementById(`${formId}Form`);
    const inputs = form.querySelectorAll('input, textarea');

    inputs.forEach(input => {
        if (input.type === 'checkbox') {
            input.checked = false;
        } else {
            input.value = '';
        }
    });
}

// Fungsi untuk memformat tanggal
function formatDate(dateString) {
    if (!dateString) return '';
    const options = { year: 'numeric', month: 'long'};
    return new Date(dateString).toLocaleDateString('id-ID', options);
}

// Panggil fungsi saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    renderProyek();
    enableLivePreviewProyek();
});