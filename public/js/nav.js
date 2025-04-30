const loginModal = document.getElementById('login-modal');
const registerModal = document.getElementById('register-modal');

// Targetkan semua tombol "Buka Modal Login"
const openLoginModalButtons = document.querySelectorAll('#open-login-modal');

// Targetkan semua tombol "Buka Modal Daftar"
const openRegisterModalButtons = document.querySelectorAll('#open-register-modal');

const closeLoginModal = document.getElementById('close-login-modal');
const closeRegisterModal = document.getElementById('close-register-modal');
const switchToRegisterModal = document.getElementById('switch-to-register-modal');
const switchToLoginModal = document.getElementById('switch-to-login-modal');

openLoginModalButtons.forEach(button => {
    if (button) {
        button.addEventListener('click', () => {
            if (loginModal) {
                loginModal.classList.remove('hidden');
            }
            if (registerModal) {
                registerModal.classList.add('hidden');
            }
        });
    }
});

openRegisterModalButtons.forEach(button => {
    if (button) {
        button.addEventListener('click', () => {
            if (registerModal) {
                registerModal.classList.remove('hidden');
            }
            if (loginModal) {
                loginModal.classList.add('hidden');
            }
        });
    }
});

if (closeLoginModal) {
    closeLoginModal.addEventListener('click', () => {
        if (loginModal) {
            loginModal.classList.add('hidden');
        }
    });
}

if (closeRegisterModal) {
    closeRegisterModal.addEventListener('click', () => {
        if (registerModal) {
            registerModal.classList.add('hidden');
        }
    });
}

if (switchToRegisterModal) {
    switchToRegisterModal.addEventListener('click', () => {
        if (loginModal) {
            loginModal.classList.add('hidden');
        }
        if (registerModal) {
            registerModal.classList.remove('hidden');
        }
    });
}

if (switchToLoginModal) {
    switchToLoginModal.addEventListener('click', () => {
        if (registerModal) {
            registerModal.classList.add('hidden');
        }
        if (loginModal) {
            loginModal.classList.remove('hidden');
        }
    });
}

const hamburgerButton = document.querySelector('.hamburger-button');
const navLinks = document.getElementById('navLinks');

if (hamburgerButton && navLinks) {
    hamburgerButton.addEventListener('click', () => {
        navLinks.classList.toggle('open');
        hamburgerButton.classList.toggle('open');
    });
}

// Close modal when clicking outside
window.addEventListener('click', (event) => {
    if (loginModal && event.target === loginModal) {
        loginModal.classList.add('hidden');
    }
    if (registerModal && event.target === registerModal) {
        registerModal.classList.add('hidden');
    }
});