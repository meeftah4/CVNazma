<div id="login-modal" class="login-modal-container hidden">
    <div class="login-modal-content">
        <div class="login-modal-left">
            <div class="login-modal-illustration-wrapper">
                <img src="{{ asset('images/Masuk.jpg') }}" alt="Illustration" class="login-modal-illustration">
            </div>
        </div>

        <div class="login-modal-right">
            <div class="login-modal-button-group">
                <button id="switch-to-register-modal" class="login-modal-switch-button">
                    Daftar
                </button>
                <button class="login-modal-active-button">
                    Masuk
                </button>
            </div>
            <form class="login-modal-form" action="/masuk" method="POST">
                @csrf
                <div class="login-modal-input-group">
                    <input type="email" id="email" name="email" class="login-modal-input" placeholder="Email" required>
                </div>
                <div class="login-modal-input-group">
                    <input type="password" id="password" name="password" class="login-modal-input" placeholder="Password" required>
                </div>
                <button type="submit" class="login-modal-submit-button">
                    Masuk
                </button>
            </form>
            <p class="login-modal-social-text">Atau masuk dengan</p>
            <button class="login-modal-google-button" onclick="window.location.href='{{ route('google.login') }}'">
                <img src="{{ asset('images/google_logo.png') }}" alt="Google" class="register-modal-google-icon">
                Masuk dengan Google
            </button>
        </div>
        <button id="close-login-modal" class="login-modal-close-button">
            &times;
        </button>
    </div>
</div>