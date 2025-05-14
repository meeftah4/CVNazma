// resources/js/forms/step2/pendidikan.js
import './base';

window.enableLivePreviewPendidikan = function () {
    const inputs = document.querySelectorAll('#pendidikanForm input, #pendidikanForm textarea');
    const previewContainer = document.getElementById('previewEducation');

    inputs.forEach(input => {
        input.addEventListener('input', () => {
            const data = {};
            inputs.forEach(input => {
                data[input.id] = input.value || '';
            });

            const isPresent = document.getElementById('isPresent').checked;

            previewContainer.innerHTML = `
                <div class="mb-4">
                    <div class="flex justify-between items-center">
                        <p><strong>${data.educationInstitution || ''}</strong></p>
                        ${data.educationStartDate || isPresent ? `<p class="text-gray-500">${formatDate(data.educationStartDate)} - ${isPresent ? 'Present' : formatDate(data.educationEndDate)}</p>` : ''}
                    </div>
                    ${data.educationDegree ? `<p>${data.educationDegree}</p>` : ''}
                    ${data.educationDescription ? `
                        <ul class="list-disc pl-5 text-gray-600">
                            ${data.educationDescription.split('\n').map(desc => `<li>${desc}</li>`).join('')}
                        </ul>
                    ` : ''}
                </div>
            `;
        });
    });
};

document.addEventListener('DOMContentLoaded', enableLivePreviewPendidikan);