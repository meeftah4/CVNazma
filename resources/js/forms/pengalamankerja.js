import './base';

// Inisialisasi tempData jika belum ada
window.tempData = window.tempData || {};
window.tempData.pengalamankerja = window.tempData.pengalamankerja || [];

// Fungsi untuk mengaktifkan live preview secara real-time
window.enableLivePreviewPengalamanKerja = function () {
    const form = document.getElementById('pengalamankerjaForm');
    if (!form) return;

    const inputs = form.querySelectorAll('input, textarea');

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
        let dataList = window.tempData.pengalamankerja ? [...window.tempData.pengalamankerja] : [];
        // Jika form tidak kosong (ada input), tambahkan ke preview
        const isFormFilled = Object.values(currentInput).some(val => val && val !== false);
        if (isFormFilled) {
            dataList.push(currentInput);
        }

        // Render ke preview CV
        updateLivePreviewPengalamanKerja(dataList);
    };

    // Pasang event listener untuk setiap input
    inputs.forEach(input => {
        input.removeEventListener('input', input._livePreviewHandler);
        input._livePreviewHandler = updatePreview;
        input.addEventListener('input', input._livePreviewHandler);
    });
};

// Fungsi untuk memperbarui live preview pengalaman kerja di CV
function updateLivePreviewPengalamanKerja(dataList = null) {
    const previewContainer = document.getElementById('previewPengalamanKerja');
    // Hapus seluruh isi container
    previewContainer.innerHTML = '';

    // Gunakan dataList jika ada (dari live preview), jika tidak pakai data tersimpan
    const pengalamanList = dataList || window.tempData.pengalamankerja || [];

    // --- TAMBAHKAN INI: Tampilkan section jika ada data, sembunyikan jika kosong ---
    const sectionEl = document.getElementById('sectionPengalamanKerja');
    if (sectionEl) {
        if (pengalamanList.length > 0) {
            sectionEl.style.display = '';
        } else {
            sectionEl.style.display = 'none';
        }
    }

    if (pengalamanList.length === 0) {
        // Biarkan kosong, section akan di-hide otomatis
        return;
    }

    pengalamanList.forEach((data, index) => {
        const row = document.createElement('div');
        row.className = 'mb-4';
        row.innerHTML = `
            <div class="flex justify-between items-center">
                <p><strong>${data.companyName || ''}</strong>${data.jobCity ? ` - ${data.jobCity}` : ''}</p>
                ${(data.jobStartDate || data.jobIsPresent) ? `<p class="text-gray-500">${formatDate(data.jobStartDate)} - ${data.jobIsPresent ? 'Present' : formatDate(data.jobEndDate)}</p>` : ''}
            </div>
            ${data.jobPosition ? `<p>${data.jobPosition}</p>` : ''}
            ${data.jobDescription ? `
                <ul class="list-disc pl-5 text-gray-600">
                    ${data.jobDescription.split('\n').map(desc => `<li>${desc}</li>`).join('')}
                </ul>
            ` : ''}
        `;
        previewContainer.appendChild(row);
    });
}

// Fungsi untuk menyimpan data pengalaman kerja
window.saveDataPengalamanKerja = function () {
    const form = document.getElementById('pengalamankerjaForm');
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
    window.tempData.pengalamankerja.push(data);

    // Setelah window.tempData diubah:
    window.updateSessionCV();

    // Render ulang daftar data
    renderPengalamanKerja();

    // Perbarui live preview di CV
    updateLivePreviewPengalamanKerja();

    // Reset form setelah menyimpan
    resetForm('pengalamankerja');
};

// Fungsi untuk merender daftar pengalaman kerja
window.renderPengalamanKerja = function () {
    const listElement = document.getElementById('pengalamankerjaList');
    listElement.innerHTML = ''; // Kosongkan elemen sebelum menambahkan data baru

    if (!window.tempData.pengalamankerja || window.tempData.pengalamankerja.length === 0) {
        listElement.innerHTML = ``;
        return;
    }

    window.tempData.pengalamankerja.forEach((data, index) => {
        const row = document.createElement('div');
        row.className = 'flex justify-between items-center bg-white p-2 rounded-md shadow mb-2';

        row.innerHTML = `
            <div class="pl-4 flex-1">
                <p><strong>${data.companyName || ''}</strong>${data.jobCity ? ` - ${data.jobCity}` : ''}</p>
                ${data.jobStartDate || data.jobIsPresent ? `<p class="text-gray-500">${formatDate(data.jobStartDate)} - ${data.jobIsPresent ? 'Present' : formatDate(data.jobEndDate)}</p>` : ''}
                ${data.jobPosition ? `<p>${data.jobPosition}</p>` : ''}
                ${data.jobDescription ? `
                    <ul class="list-disc pl-5 text-gray-600">
                        ${data.jobDescription.split('\n').map(desc => `<li>${desc}</li>`).join('')}
                    </ul>
                ` : ''}
            </div>
            <div class="flex items-start space-x-2 h-full pr-4">
                <button class="text-red-500 font-bold" onclick="deletePengalamanKerja(${index})">X</button>
                <button class="text-[#01287E]" onclick="editPengalamanKerja(${index})">✎</button>
            </div>
        `;

        listElement.appendChild(row);
    });
};

// Fungsi untuk mengedit data pengalaman kerja
window.editPengalamanKerja = function (index) {
    const data = window.tempData.pengalamankerja[index];
    const form = document.getElementById('pengalamankerjaForm');
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
    window.tempData.pengalamankerja.splice(index, 1);

    // Render ulang daftar data
    renderPengalamanKerja();

    // Perbarui live preview setelah load ulang form
    enableLivePreviewPengalamanKerja();
};

// Fungsi untuk menghapus data pengalaman kerja
window.deletePengalamanKerja = function (index) {
    // Hapus data dari tempData
    window.tempData.pengalamankerja.splice(index, 1);

    // Render ulang daftar data
    renderPengalamanKerja();

    // Perbarui live preview di CV
    updateLivePreviewPengalamanKerja();
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
    // Update preview agar baris input kosong tidak muncul
    updateLivePreviewPengalamanKerja();
}

// Fungsi untuk memformat tanggal
function formatDate(dateString) {
    if (!dateString) return '';
    const options = { year: 'numeric', month: 'long' };
    return new Date(dateString).toLocaleDateString('id-ID', options);
}

// Panggil fungsi saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    renderPengalamanKerja();
    enableLivePreviewPengalamanKerja();
});