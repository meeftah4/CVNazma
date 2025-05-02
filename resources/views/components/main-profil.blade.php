<!-- Tambahkan H1 untuk "Profil Saya" di atas card -->
<h1 class="profile-title">Profil Saya</h1>
<div class="profile-header">
    <img src="{{ asset('images/profile1.png') }}" alt="Background" class="header-bg">
    <div class="header-avatar">
        <img src="{{ asset('images/profile2.png') }}" alt="Avatar">
    </div>
    <button class="btn-upload">Upload Gambar</button>
    <h2>Shery Marsaraina Dabit</h2>
    <a href="#" class="btn-logout">Keluar</a>
</div>

<!-- Edit Profile -->
<div class="edit-profile">
    <h2>Edit Profil</h2>
    <form action="#" method="POST">
        <!-- Nama Lengkap -->
        <div class="form-group full-width">
            <label for="full_name">Nama Lengkap</label>
            <input type="text" id="full_name" name="full_name">
        </div>

        <!-- Username dan Password -->
        <div class="form-group half-width">
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
        </div>

        <!-- Alamat Email dan Nomor Handphone -->
        <div class="form-group half-width">
            <div>
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="phone_number">Nomor Handphone</label>
                <input type="text" id="phone_number" name="phone_number">
            </div>
        </div>

        <!-- Alamat -->
        <div class="form-group full-width">
            <label for="address">Alamat</label>
            <textarea id="address" name="address"></textarea>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="btn-save">Simpan</button>
    </form>
</div>