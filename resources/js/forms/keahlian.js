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
    const previewContainer = document.getElementById('previewSkill');

    // Tambahkan event listener untuk setiap input
    inputs.forEach(input => {
        input.addEventListener('input', () => {
            previewContainer.innerHTML = '';

            const data = {};
            inputs.forEach(input => {
                data[input.id] = input.value || '';
            });

            const form = document.getElementById('keahlianForm');
            const editIndex = form.getAttribute('data-edit-index');

            // Jika input kosong dan belum ada data, tampilkan placeholder
            if ((!data.skillName || data.skillName.trim() === '') && window.tempData.keahlian.length === 0) {
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

            // Tampilkan semua keahlian yang sudah tersimpan, jika sedang edit, ganti index yang diedit dengan input
            window.tempData.keahlian.forEach((item, index) => {
                const skillElement = document.createElement('p');
                skillElement.id = `previewSkill-${index}`;
                if (editIndex !== null && parseInt(editIndex) === index && data.skillName && data.skillName.trim() !== '') {
                    skillElement.innerHTML = `${data.skillName}`;
                } else {
                    skillElement.innerHTML = `${item.skillName || ''}`;
                }
                previewContainer.appendChild(skillElement);
            });

            // Jika sedang tambah baru (bukan edit) dan input tidak kosong, tampilkan di bawahnya
            if ((editIndex === null || editIndex === undefined) && data.skillName && data.skillName.trim() !== '') {
                const skillElement = document.createElement('p');
                skillElement.innerHTML = `${data.skillName}`;
                previewContainer.appendChild(skillElement);
            }
        });
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
window.updateLivePreviewKeahlian = function () {
    const previewContainer = document.getElementById('previewSkill');
    previewContainer.innerHTML = ''; // Kosongkan elemen sebelum menambahkan data baru

    if (window.tempData.keahlian.length === 0) {
        // Tampilkan contoh keahlian sebagai placeholder
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

    // Jika sudah ada data, tampilkan data keahlian saja (tanpa placeholder)
    window.tempData.keahlian.forEach((data, index) => {
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

// Panggil fungsi saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    renderKeahlian(); // Render data saat halaman dimuat
    enableLivePreviewKeahlian(); // Enable live preview saat halaman dimuat
});
