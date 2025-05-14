<!-- Tambahkan H1 untuk "Profil Saya" di atas card -->
<h1 class="profile-title">Profil Saya</h1>
<div class="profile-header">
    <img src="{{ $user->profile_sampul ? asset('storage/' . $user->profile_sampul) : asset('images/profile1.png') }}" alt="Background" class="header-bg">
    <div class="header-avatar" style="text-align: left; margin-left: 10px;">
        <button class="btn-edit-profile-picture" onclick="document.getElementById('profile_picture_input').click()">
            @if ($user->profile_picture && filter_var($user->profile_picture, FILTER_VALIDATE_URL))
            <img src="{{ $user->profile_picture }}" alt="Profile Picture">
            @elseif ($user->profile_picture && file_exists(public_path('storage/' . $user->profile_picture)))
            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
            @else
            <img src="{{ asset('images/profile2.png') }}" alt="Default Profile Picture">
            @endif
        </button>
        <form id="profile_picture_form" action="{{ route('profile.picture.update') }}" method="POST" enctype="multipart/form-data" style="display: none;">
            @csrf
            <input type="file" id="profile_picture_input" name="profile_picture" accept="image/*" onchange="document.getElementById('profile_picture_form').submit();">
        </form>
    </div>

    <!-- Button Upload Sampul -->
    <button class="btn-upload-sampul" onclick="document.getElementById('profile_sampul_input').click()">Upload Sampul</button>
    <form id="profile_sampul_form" action="{{ route('profile.sampul.update') }}" method="POST" enctype="multipart/form-data" style="display: none;">
        @csrf
        <input type="file" id="profile_sampul_input" name="profile_sampul" accept="image/*" onchange="document.getElementById('profile_sampul_form').submit();">
    </form>

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

        <!-- Email dan Password-->
        <div class="form-group half-width">
            <div>
                <label for="username">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" readonly>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password baru" 
                       @if($user->is_google_account) disabled @endif>
                <small>
                    @if($user->is_google_account)
                        Password tidak dapat diubah untuk akun Google.
                    @else
                        Biarkan kosong jika tidak ingin mengubah password.
                    @endif
                </small>
            </div>
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