<!-- Tambahkan H1 untuk "Profil Saya" di atas card -->
<h1 class="profile-title">Profil Saya</h1>
<div class="profile-header">
    <img src="{{ asset('images/profile1.png') }}" alt="Background" class="header-bg">
    <div class="header-avatar">
        <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/profile2.png') }}" alt="Avatar">
    </div>
    <button class="btn-upload">Upload Gambar</button>
    <h2>{{ $user->name }}</h2>
    <a href="#" class="btn-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

<!-- Edit Profile -->
<div class="edit-profile">
    <h2>Edit Profil</h2>

    @if (session('success'))
        <div id="alert-container" class="fixed top-4 right-4 z-50">
            <div id="alert-message" class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div id="alert-container" class="fixed top-4 right-4 z-50">
            <div id="alert-message" class="alert alert-danger">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <!-- Nama Lengkap -->
        <div class="form-group full-width">
            <label for="full_name">Nama Lengkap</label>
            <input type="text" id="full_name" name="full_name" value="{{ $user->name }}">
        </div>

        <!-- Username dan Nomor Telepon-->
        <div class="form-group half-width">
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ $user->username }}">
            </div>
            <div>
                <label for="phone_number">Nomor Handphone</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ $user->telephone }}">
            </div>
        </div>

        <!-- Alamat -->
        <div class="form-group full-width">
            <label for="address">Alamat</label>
            <textarea id="address" name="address">{{ $user->address }}</textarea>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="btn-save">Simpan</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alertContainer = document.getElementById('alert-container');
        if (alertContainer) {
            setTimeout(() => {
                alertContainer.style.display = 'none';
            }, 2000); // 3000ms = 3 detik
        }
    });
</script>