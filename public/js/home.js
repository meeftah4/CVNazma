document.querySelectorAll('.faq-question').forEach(button => {
    button.addEventListener('click', () => {
        const faqItem = button.parentElement;
        faqItem.classList.toggle('active');

        // Ubah ikon + dan -
        const icon = button.querySelector('.faq-icon');
        icon.textContent = faqItem.classList.contains('active') ? '-' : '+';
    });
});