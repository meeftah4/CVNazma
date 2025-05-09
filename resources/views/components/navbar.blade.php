{{-- filepath: d:\Magang\CVNazma\resources\views\components\navbar.blade.php --}}
<nav class="nav">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <a href="/" class="logo">
                <img src="{{ asset('images/Logo Nazma.png') }}" alt="Logo" class="h-8">
            </a>

            <button class="hamburger-button">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </button>

            <ul class="nav-links" id="navLinks">
                <li><a href="/">Home</a></li>
                <li><a href="/cvats">Cv Ats</a></li>
                <li><a href="/TemplateCv">Template Cv</a></li>
                @if (Auth::check())
                    <li class="auth-buttons-in-nav lg:hidden">
                        <a href="{{ route('profile.main') }}" class="profile-user">{{ Auth::user()->name }}</a>
                    </li>
                @else
                    <li class="auth-buttons-in-nav lg:hidden">
                        <button id="open-login-modal">Masuk</button>
                    </li>
                    <li class="auth-buttons-in-nav lg:hidden">
                        <button id="open-register-modal">Daftar</button>
                    </li>
                @endif
            </ul>

            <div class="auth-buttons max-lg:hidden">
                @if (Auth::check())
                    <a href="{{ route('profile.main') }}" class="profile-user">{{ Auth::user()->username }}</a>
                @else
                    <button id="open-login-modal">Masuk</button>
                    <button id="open-register-modal">Daftar</button>
                @endif
            </div>
        </div>
    </div>
</nav>