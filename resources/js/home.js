document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.faq-question').forEach(button => {
        const faqItem = button.parentElement;
        const answer = faqItem.querySelector('.faq-answer');
        const icon = button.querySelector('.faq-icon');

        button.addEventListener('click', () => {
            // Tutup semua dropdown lain
            document.querySelectorAll('.faq-item').forEach(item => {
                if (item !== faqItem) {
                    item.classList.remove('active');
                    const ans = item.querySelector('.faq-answer');
                    const otherIcon = item.querySelector('.faq-icon');
                    ans.style.height = ans.scrollHeight + 'px';
                    ans.offsetHeight;
                    ans.style.transition = 'height 0.4s, padding 0.4s';
                    ans.style.height = '0px';
                    ans.style.paddingTop = '0';
                    ans.style.paddingBottom = '0';
                    if (otherIcon) otherIcon.textContent = '+';
                }
            });

            if (faqItem.classList.contains('active')) {
                // Tutup
                answer.style.height = answer.scrollHeight + 'px';
                answer.offsetHeight;
                answer.style.transition = 'height 0.4s, padding 0.4s';
                answer.style.height = '0px';
                answer.style.paddingTop = '0';
                answer.style.paddingBottom = '0';
                faqItem.classList.remove('active');
                if (icon) icon.textContent = '+';
            } else {
                // Buka
                answer.style.transition = 'none';
                answer.style.height = '0px';
                answer.style.paddingTop = '0';
                answer.style.paddingBottom = '0';
                answer.offsetHeight;
                answer.style.transition = 'height 0.4s, padding 0.4s';
                answer.style.height = answer.scrollHeight + 'px';
                answer.style.paddingTop = '1.25rem';
                answer.style.paddingBottom = '2rem';
                faqItem.classList.add('active');
                if (icon) icon.textContent = '-';
            }
        });

        answer.addEventListener('transitionend', function (e) {
            if (e.propertyName === 'height') {
                if (this.parentElement.classList.contains('active')) {
                    this.style.height = 'auto';
                }
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
