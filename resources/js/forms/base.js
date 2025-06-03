// resources/js/forms/step2/base.js
window.tempData = window.tempData || {
    profil: [],
    pengalamankerja: [],
    proyek: [],
    keahlian: [],
    pendidikan: [],
    bahasa: [],
    sertifikat: [],
    hobi: []
};

// Pemetaan fungsi render untuk setiap dropdown
window.renderFunctions = {
    profil: window.renderProfil,
    pengalamankerja: window.renderPengalamanKerja,
    proyek: window.renderProyek,
    keahlian: window.renderKeahlian,
    pendidikan: window.renderPendidikan,
    bahasa: window.renderBahasa,
    sertifikat: window.renderSertifikat,
    hobi: window.renderHobi
};

window.toggleDropdown = function(id) {
    const dropdown = document.getElementById(id + 'Dropdown');
    const button = document.querySelector(`[onclick="toggleDropdown('${id}')"] span:last-child`);
    dropdown.classList.toggle('hidden');
    button.textContent = dropdown.classList.contains('hidden') ? "+" : "-";

    // Render data row saat dropdown dibuka
    if (!dropdown.classList.contains('hidden') && window.renderFunctions[id]) {
        window.renderFunctions[id]();
    }

    // Tampilkan form hanya jika tidak ada data
    const form = document.getElementById(`${id}Form`);
    if (form && window.tempData[id].length === 0) {
        form.classList.remove('hidden');
    }
};

window.resetForm = function(id) {
    const inputs = document.querySelectorAll(`#${id}Form input, #${id}Form textarea`);
    inputs.forEach(input => input.value = '');
    const isPresentCheckbox = document.getElementById('isPresent');
    if (isPresentCheckbox) {
        isPresentCheckbox.checked = false;
        toggleEndDate();
    }
};

window.formatDate = function(date) {
    if (!date) return '';
    const options = { year: 'numeric', month: 'short' };
    return new Date(date).toLocaleDateString('en-US', options);
};

window.capitalizeFirstLetter = function(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
};