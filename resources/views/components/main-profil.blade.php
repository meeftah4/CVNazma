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
            <input type="file" id="profile_picture_input" name="profile_picture" accept="image/*">
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

<!-- Tambahkan link CropperJS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<!-- Modal Cropper -->
<div id="cropperModal" class="fixed inset-0 bg-black bg-opacity-50 items-center flex justify-center z-50 hidden">
    <div class="bg-white p-4 rounded shadow max-w-[90vw] max-h-[90vh] flex flex-col items-center relative">
        <button type="button" onclick="closeCropperModal()" style="position:absolute;top:10px;right:10px;background:none;border:none;font-size:24px;color:#01287E;cursor:pointer;">&times;</button>
        <div class="mb-2 font-bold text-center" style="color: #01287E;">Crop your photo</div>
        <img id="imageToCrop" style="max-width:80vw; max-height:60vh; display:block; margin:auto;">
        <div class="flex justify-center mt-4">
            <button id="cropBtn" style="background:#FFBC5D; color:#01287E;" class="px-8 py-2 rounded font-bold">Simpan</button>
        </div>
    </div>
</div>

<script>
let cropper;
const input = document.getElementById('profile_picture_input');
const form = document.getElementById('profile_picture_form');

// Saat pilih file, tampilkan modal cropper
input.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(ev) {
            document.getElementById('imageToCrop').src = ev.target.result;
            document.getElementById('cropperModal').classList.remove('hidden');
            cropper = new Cropper(document.getElementById('imageToCrop'), {
                aspectRatio: 1,
                viewMode: 1,
                movable: true,
                zoomable: true,
                rotatable: false,
                scalable: false,
            });
        };
        reader.readAsDataURL(file);
    }
});

// Simpan hasil crop ke server
document.getElementById('cropBtn').onclick = function() {
    const canvas = cropper.getCroppedCanvas({
        width: 200,
        height: 200,
    });
    canvas.toBlob(function(blob) {
        // Buat FormData baru, kirim hasil crop
        const fd = new FormData();
        fd.append('profile_picture', blob, 'profile_picture.png');
        fd.append('_token', '{{ csrf_token() }}');
        fetch("{{ route('profile.picture.update') }}", {
            method: 'POST',
            body: fd
        }).then(() => window.location.reload());
    }, 'image/png');
    document.getElementById('cropperModal').classList.add('hidden');
    cropper.destroy();
};

function closeCropperModal() {
    document.getElementById('cropperModal').classList.add('hidden');
    if (window.cropper) {
        window.cropper.destroy();
        window.cropper = null;
    }
}

// Klik di luar modal untuk menutup
document.getElementById('cropperModal').addEventListener('mousedown', function(e) {
    if (e.target === this) {
        closeCropperModal();
    }
});
</script>

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

<style>
/* CropperJS: area luar crop jadi hitam */
.cropper-bg {
    background-color: #000 !important;
    background-image: none !important;
}
</style>