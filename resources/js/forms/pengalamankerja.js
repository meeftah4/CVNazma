// resources/js/forms/step2/pengalamankerja.js
import './base';

window.enableLivePreviewPengalamanKerja = function () {
    const form = document.getElementById('pengalamankerjaForm');
    const inputs = form.querySelectorAll('input, textarea');
    const previewContainer = document.getElementById('previewPengalamankerja');

    // Tambahkan event listener untuk setiap input
    inputs.forEach(input => {
        input.addEventListener('input', () => {
            const data = {};
            inputs.forEach(input => {
                if (input.type === 'checkbox') {
                    data[input.id] = input.checked;
                } else {
                    data[input.id] = input.value || '';
                }
            });

            // Hapus placeholder jika ada data pertama yang dimasukkan
            if (window.tempData.pengalamankerja.length === 0 && previewContainer.children.length > 0) {
                previewContainer.innerHTML = '';
            }

            // Tentukan indeks data baru
            const newIndex = window.tempData.pengalamankerja.length;

            // Cari atau buat elemen preview untuk data baru
            let previewRow = document.getElementById(`previewPengalamankerja-${newIndex}`);
            if (!previewRow) {
                previewRow = document.createElement('div');
                previewRow.id = `previewPengalamankerja-${newIndex}`;
                previewRow.className = 'mb-4';
                previewContainer.appendChild(previewRow);
            }

            // Perbarui konten elemen preview
            previewRow.innerHTML = `
                <div class="flex justify-between items-center">
                    <p><strong>${data.companyName || ''}</strong>${data.jobCity ? ` - ${data.jobCity}` : ''}</p>
                    ${data.startDate || data.isPresent ? `<p class="text-gray-500">${formatDate(data.startDate)} - ${data.isPresent ? 'Present' : formatDate(data.endDate)}</p>` : ''}
                </div>
                ${data.jobPosition ? `<p>${data.jobPosition}</p>` : ''}
                ${data.jobDescription ? `
                    <ul class="list-disc pl-5 text-gray-600">
                        ${data.jobDescription.split('\n').map(desc => `<li>${desc}</li>`).join('')}
                    </ul>
                ` : ''}
            `;
        });
    });
};

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

    // Render ulang daftar data
    renderPengalamanKerja();

    // Reset form setelah menyimpan
    resetForm('pengalamankerja');
};

window.renderPengalamanKerja = function () {
    const listElement = document.getElementById('pengalamankerjaList');
    listElement.innerHTML = ''; // Kosongkan elemen sebelum menambahkan data baru

    window.tempData.pengalamankerja.forEach((data, index) => {
        const row = document.createElement('div');
        row.className = 'flex justify-between items-center bg-white p-2 rounded-md shadow mb-2';

        row.innerHTML = `
            <div>
                <p><strong>${data.companyName || ''}</strong>${data.jobCity ? ` - ${data.jobCity}` : ''}</p>
                ${data.startDate || data.isPresent ? `<p class="text-gray-500">${formatDate(data.startDate)} - ${data.isPresent ? 'Present' : formatDate(data.endDate)}</p>` : ''}
                ${data.jobPosition ? `<p>${data.jobPosition}</p>` : ''}
                ${data.jobDescription ? `
                    <ul class="list-disc pl-5 text-gray-600">
                        ${data.jobDescription.split('\n').map(desc => `<li>${desc}</li>`).join('')}
                    </ul>
                ` : ''}
            </div>
            <div class="flex space-x-2">
                <button class="text-red-500" onclick="deletePengalamanKerja(${index})">X</button>
                <button class="text-blue-500" onclick="editPengalamanKerja(${index})">✎</button>
            </div>
        `;

        listElement.appendChild(row);
    });

    // Update live preview
    updateLivePreviewPengalamanKerja();
};

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
};

window.deletePengalamanKerja = function (index) {
    // Hapus data dari tempData
    window.tempData.pengalamankerja.splice(index, 1);

    // Render ulang daftar data
    renderPengalamanKerja();
};

window.updateLivePreviewPengalamanKerja = function () {
    const previewContainer = document.getElementById('previewPengalamankerja');
    previewContainer.innerHTML = ''; 

    if (window.tempData.pengalamankerja.length === 0) {
        // Tampilkan placeholder jika tidak ada data
        previewContainer.innerHTML = `
            <div class="mb-4">
                <div class="flex justify-between items-center">
                    <p><strong id="companyName">Instrument Tech</strong> - <span id="jobCity">Sleman</span></p>
                    <p class="text-gray-500" id="jobDuration">Jan 2024 - Jan 2025</p>
                </div>
                <p id="jobPosition">Marcelle Program</p>
                <ul id="jobDescription" class="list-disc pl-5 text-gray-600">
                    <li>Led development of an advanced automation system, achieving a 15% increase in operational efficiency.</li>
                    <li>Streamlined manufacturing processes, reducing production costs by 10%.</li>
                    <li>Implemented preventive maintenance strategies, resulting in a 20% decrease in equipment downtime.</li>
                </ul>
            </div>
        `;
        return;
    }

    // Iterasi melalui data pengalaman kerja
    window.tempData.pengalamankerja.forEach((data, index) => {
        let previewRow = document.getElementById(`previewPengalamankerja-${index}`);
        if (!previewRow) {
            previewRow = document.createElement('div');
            previewRow.id = `previewPengalamankerja-${index}`;
            previewRow.className = 'mb-4';
            previewContainer.appendChild(previewRow);
        }

        // Perbarui konten elemen preview
        previewRow.innerHTML = `
            <div class="flex justify-between items-center">
                <p><strong>${data.companyName || ''}</strong>${data.jobCity ? ` - ${data.jobCity}` : ''}</p>
                ${data.startDate || data.isPresent ? `<p class="text-gray-500">${formatDate(data.startDate)} - ${data.isPresent ? 'Present' : formatDate(data.endDate)}</p>` : ''}
            </div>
            ${data.jobPosition ? `<p>${data.jobPosition}</p>` : ''}
            ${data.jobDescription ? `
                <ul class="list-disc pl-5 text-gray-600">
                    ${data.jobDescription.split('\n').map(desc => `<li>${desc}</li>`).join('')}
                </ul>
            ` : ''}
        `;
    });
};

document.addEventListener('DOMContentLoaded', function () {
    renderPengalamanKerja(); // Render data saat halaman dimuat
    enableLivePreviewPengalamanKerja(); // Enable live preview saat halaman dimuat
});