import './base';

window.enableLivePreviewPengalamanKerja = function () {
    const form = document.getElementById('pengalamankerjaForm');
    const inputs = form.querySelectorAll('input, textarea');
    const previewContainer = document.getElementById('previewPengalamankerja');

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

            if (window.tempData.pengalamankerja.length === 0 && previewContainer.children.length > 0) {
                previewContainer.innerHTML = '';
            }

            const newIndex = window.tempData.pengalamankerja.length;

            let previewRow = document.getElementById(`previewPengalamankerja-${newIndex}`);
            if (!previewRow) {
                previewRow = document.createElement('div');
                previewRow.id = `previewPengalamankerja-${newIndex}`;
                previewRow.className = 'mb-4';
                previewContainer.appendChild(previewRow);
            }

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

    inputs.forEach(input => {
        if (input.type === 'checkbox') {
            data[input.id] = input.checked;
        } else {
            data[input.id] = input.value || '';
        }
    });

    window.tempData.pengalamankerja.push(data);
    renderPengalamanKerja();
    resetForm('pengalamankerja');
};

window.renderPengalamanKerja = function () {
    const listElement = document.getElementById('pengalamankerjaList');
    listElement.innerHTML = '';

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

    updateLivePreviewPengalamanKerja();
};

window.editPengalamanKerja = function (index) {
    const data = window.tempData.pengalamankerja[index];
    const form = document.getElementById('pengalamankerjaForm');
    const inputs = form.querySelectorAll('input, textarea');

    inputs.forEach(input => {
        if (input.type === 'checkbox') {
            input.checked = data[input.id];
        } else {
            input.value = data[input.id] || '';
        }
    });

    const endDateInput = document.getElementById('endDate');
    if (data.isPresent) {
        endDateInput.disabled = true;
    } else {
        endDateInput.disabled = false;
    }

    window.tempData.pengalamankerja.splice(index, 1);
    renderPengalamanKerja();
};

window.deletePengalamanKerja = function (index) {
    window.tempData.pengalamankerja.splice(index, 1);
    renderPengalamanKerja();
};

window.updateLivePreviewPengalamanKerja = function () {
    const previewContainer = document.getElementById('previewPengalamankerja');
    previewContainer.innerHTML = '';

    if (window.tempData.pengalamankerja.length === 0) {
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

    window.tempData.pengalamankerja.forEach((data, index) => {
        let previewRow = document.getElementById(`previewPengalamankerja-${index}`);
        if (!previewRow) {
            previewRow = document.createElement('div');
            previewRow.id = `previewPengalamankerja-${index}`;
            previewRow.className = 'mb-4';
            previewContainer.appendChild(previewRow);
        }

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

// Fungsi reset form
window.resetForm = function (formId) {
    const form = document.getElementById(formId + 'Form');
    const inputs = form.querySelectorAll('input, textarea');

    inputs.forEach(input => {
        if (input.type === 'checkbox') {
            input.checked = false;
        } else {
            input.value = '';
        }
    });

    // Aktifkan kembali endDate jika sebelumnya disabled
    const endDateInput = document.getElementById('endDate');
    if (endDateInput) {
        endDateInput.disabled = false;
    }
};

// Fungsi toggle untuk checkbox "Saat ini bekerja"
window.toggleEndDate = function () {
    const checkbox = document.getElementById('isPresent');
    const endDateInput = document.getElementById('endDate');
    endDateInput.disabled = checkbox.checked;
};

// Format tanggal (misal: 2024-01-01 → Jan 2024)
window.formatDate = function (dateString) {
    if (!dateString) return '';
    const date = new Date(dateString);
    const options = { year: 'numeric', month: 'long' };
    return date.toLocaleDateString('en-US', options);
};

document.addEventListener('DOMContentLoaded', function () {
    renderPengalamanKerja();
    enableLivePreviewPengalamanKerja();
});
