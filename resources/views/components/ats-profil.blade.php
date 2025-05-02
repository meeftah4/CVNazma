<!-- Tambahkan H1 untuk "Profil Saya" di atas card -->
<h1 class="profile-title">CV Ats Saya</h1>
<div class="profile-header">
    <a href="#" class="btn-logout">Keluar</a>
</div>

<div class="edit-profile">
    <h2>Edit Profil</h2>
    <form action="#" method="POST">
        <div class="form-group">
            <div>
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name">
            </div>
        </div>
        <div class="form-group">
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
        </div>
        <div class="form-group">
            <div>
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div>
                <label for="phone">Nomor Handphone</label>
                <input type="text" id="phone" name="phone">
            </div>
        </div>
        <div class="form-group full-width">
            <label for="address">Alamat</label>
            <textarea id="address" name="address"></textarea>
        </div>
        <button type="submit" class="btn-save">Simpan</button>
    </form>
</div>