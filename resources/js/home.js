document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.faq-question').forEach(button => {
        button.addEventListener('click', () => {
            const faqItem = button.parentElement;
            faqItem.classList.toggle('active');

            // Ubah ikon + dan -
            const icon = button.querySelector('.faq-icon');
            icon.textContent = faqItem.classList.contains('active') ? '-' : '+';
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