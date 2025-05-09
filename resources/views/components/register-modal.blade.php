<div id="register-modal" class="register-modal-container hidden">
    <div class="register-modal-content">
        <div class="register-modal-left">
            <div class="register-modal-illustration-wrapper">
                <img src="{{ asset('images/Daftar.jpg') }}" alt="Illustration" class="register-modal-illustration">
            </div>
        </div>

        <div class="register-modal-right">
            <div class="register-modal-button-group">
                <button class="register-modal-active-button">
                    Daftar
                </button>
                <button id="switch-to-login-modal" class="register-modal-switch-button">
                    Masuk
                </button>
            </div>
            <form class="register-modal-form" action="/daftar" method="POST">
                @csrf
                <div class="register-modal-input-group">
                    <input type="text" id="name" name="name" class="register-modal-input" placeholder="Nama" required>
                </div>
                <div class="register-modal-input-group">
                    <input type="email" id="email" name="email" class="register-modal-input" placeholder="Email" required>
                </div>
                <div class="register-modal-input-group">
                    <input type="password" id="password" name="password" class="register-modal-input" placeholder="Password" minlength="8" required>
                </div>
                <button type="submit" class="register-modal-submit-button">
                    Daftar
                </button>
            </form>
            <p class="register-modal-social-text">Atau daftar dengan</p>
            <button class="register-modal-google-button" onclick="window.location.href='{{ route('google.login') }}'">
                <img src="{{ asset('images/google_logo.png') }}" alt="Google" class="register-modal-google-icon">
                Daftar dengan Google
            </button>
        </div>
        <button id="close-register-modal" class="register-modal-close-button">
            &times;
        </button>
    </div>
</div>