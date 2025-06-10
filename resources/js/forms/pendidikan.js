import './base';

// Inisialisasi tempData jika belum ada
window.tempData = window.tempData || {};
window.tempData.pendidikan = window.tempData.pendidikan || [];

// Fungsi untuk mengaktifkan live preview secara real-time
window.enableLivePreviewPendidikan = function () {
    const form = document.getElementById('pendidikanForm');
    if (!form) return;

    const inputs = form.querySelectorAll('input, textarea');
    const previewContainer = document.getElementById('previewEducation');
    const sectionEl = document.getElementById('sectionPendidikan');

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
        let dataList = window.tempData.pendidikan ? [...window.tempData.pendidikan] : [];
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
            const row = document.createElement('div');
            row.className = 'mb-4';
            row.innerHTML = `
                <div class="flex justify-between items-center">
                    <p><strong>${data.educationInstitution || ''}</strong>${data.educationCity ? ` - ${data.educationCity}` : ''}</p>
                    ${(data.educationStartDate || data.isPresent) ? `<p class="text-gray-500">${formatDate(data.educationStartDate)} - ${data.isPresent ? 'Present' : formatDate(data.educationEndDate)}</p>` : ''}
                </div>
                ${data.educationDegree ? `<p class="italic text-gray-600">${data.educationDegree}</p>` : ''}
                ${data.educationDescription ? `
                    <ul class="list-disc pl-5 text-gray-600">
                        ${data.educationDescription.split('\n').map(desc => `<li>${desc}</li>`).join('')}
                    </ul>
                ` : ''}
            `;
            previewContainer.appendChild(row);
        });
    };

    // Pasang event listener untuk setiap input
    inputs.forEach(input => {
        input.removeEventListener('input', input._livePreviewHandler);
        input._livePreviewHandler = updatePreview;
        input.addEventListener('input', input._livePreviewHandler);
    });
};

// Fungsi untuk memperbarui live preview pendidikan di CV setelah data disimpan
function updateLivePreviewEducation(dataList = null) {
    const previewContainer = document.getElementById('previewEducation');
    const sectionEl = document.getElementById('sectionPendidikan');
    previewContainer.innerHTML = '';

    const pendidikanList = dataList || window.tempData.pendidikan || [];

    if (sectionEl) {
        if (pendidikanList.length > 0) {
            sectionEl.style.display = '';
        } else {
            sectionEl.style.display = 'none';
        }
    }

    if (pendidikanList.length === 0) {
        // Biarkan kosong, section akan di-hide otomatis
        return;
    }

    pendidikanList.forEach((data, index) => {
        const row = document.createElement('div');
        row.className = 'mb-4';
        row.innerHTML = `
            <div class="flex justify-between items-center">
                <p><strong>${data.educationInstitution || ''}</strong>${data.educationCity ? ` - ${data.educationCity}` : ''}</p>
                ${(data.educationStartDate || data.isPresent) ? `<p class="text-gray-500">${formatDate(data.educationStartDate)} - ${data.isPresent ? 'Present' : formatDate(data.educationEndDate)}</p>` : ''}
            </div>
            ${data.educationDegree ? `<p class="italic text-gray-600">${data.educationDegree}</p>` : ''}
            ${data.educationDescription ? `
                <ul class="list-disc pl-5 text-gray-600">
                    ${data.educationDescription.split('\n').map(desc => `<li>${desc}</li>`).join('')}
                </ul>
            ` : ''}
        `;
        previewContainer.appendChild(row);
    });
}

// Fungsi untuk menyimpan data pendidikan
window.saveDataPendidikan = function () {
    const form = document.getElementById('pendidikanForm');
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

    // Tambahkan data ke tempData
    window.tempData.pendidikan.push(data);
    // Setelah window.tempData diubah:
    window.updateSessionCV();

    // Render ulang daftar data
    renderPendidikan();

    // Perbarui live preview di CV
    updateLivePreviewEducation();

    // Reset form setelah menyimpan
    resetForm('pendidikan');
};

// Fungsi untuk merender daftar pendidikan
window.renderPendidikan = function () {
    const listElement = document.getElementById('pendidikanList');
    listElement.innerHTML = ''; // Kosongkan elemen sebelum menambahkan data baru

    if (!window.tempData.pendidikan || window.tempData.pendidikan.length === 0) {
        listElement.innerHTML = ``;
        return;
    }

    window.tempData.pendidikan.forEach((data, index) => {
        const row = document.createElement('div');
        row.className = 'flex justify-between items-center bg-white p-2 rounded-md shadow mb-2';

        row.innerHTML = `
            <div class="pl-4 flex-1">
                <p><strong>${data.educationInstitution || ''}</strong>${data.educationCity ? ` - ${data.educationCity}` : ''}</p>
                ${data.educationStartDate || data.isPresent ? `<p class="text-gray-500">${formatDate(data.educationStartDate)} - ${data.isPresent ? 'Present' : formatDate(data.educationEndDate)}</p>` : ''}
                ${data.educationDegree ? `<p class="italic text-gray-600">${data.educationDegree}</p>` : ''}
                ${data.educationDescription ? `
                    <ul class="list-disc pl-5 text-gray-600">
                        ${data.educationDescription.split('\n').map(desc => `<li>${desc}</li>`).join('')}
                    </ul>
                ` : ''}
            </div>
            <div class="flex items-start space-x-2 h-full pr-4">
                <button class="text-red-500" onclick="deletePendidikan(${index})">X</button>
                <button class="text-blue-500" onclick="editPendidikan(${index})">✎</button>
            </div>
        `;

        listElement.appendChild(row);
    });
};

// Fungsi untuk mengedit data pendidikan
window.editPendidikan = function (index) {
    const data = window.tempData.pendidikan[index];
    const form = document.getElementById('pendidikanForm');
    const inputs = form.querySelectorAll('input, textarea');

    // Isi form dengan data yang ada
    inputs.forEach(input => {
        if (input.type === 'checkbox') {
            input.checked = data[input.id];
        } else {
            input.value = data[input.id] || '';
        }
    });

    // Hapus data lama
    window.tempData.pendidikan.splice(index, 1);

    // Render ulang daftar data
    renderPendidikan();

    // Perbarui live preview setelah load ulang form
    enableLivePreviewPendidikan();
};

// Fungsi untuk menghapus data pendidikan
window.deletePendidikan = function (index) {
    // Hapus data dari tempData
    window.tempData.pendidikan.splice(index, 1);

    // Render ulang daftar data
    renderPendidikan();

    // Perbarui live preview di CV
    updateLivePreviewEducation();
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
    const options = { year: 'numeric', month: 'long' };
    return new Date(dateString).toLocaleDateString('id-ID', options);
}

// Panggil fungsi saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    renderPendidikan();
    enableLivePreviewPendidikan();
});