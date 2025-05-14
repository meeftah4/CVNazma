document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.faq-question').forEach(button => {
        button.addEventListener('click', () => {
            const faqItem = button.parentElement;
            const answer = faqItem.querySelector('.faq-answer');
            const icon = button.querySelector('.faq-icon');

            if (faqItem.classList.contains('active')) {
                // Tutup dropdown
                answer.style.height = '0px';
                faqItem.classList.remove('active');
                icon.textContent = '+';
            } else {
                // Buka dropdown
                answer.style.height = `${answer.scrollHeight}px`;
                faqItem.classList.add('active');
                icon.textContent = '-';
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const alertContainer = document.getElementById("alert-container");

    if (alertContainer) {
        // Hilangkan alert setelah 5 detik
        setTimeout(() => {
            alertContainer.style.display = "none";
        }, 2000);
    }
});