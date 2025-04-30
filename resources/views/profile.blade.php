@extends('layouts.app')

@section('title', 'CV Nazma')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('content')
<div class="profile-page">
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="profile-card">
                <img src="{{ asset('images/profile.png') }}" alt="Background" class="profile-bg">
                <div class="profile-avatar">
                    <img src="{{ asset('images/profile2.png') }}" alt="Avatar">
                </div>
                <h2>Shery Marsaraina Dabit</h2>
                <ul>
                    <li><a href="#">Profil</a></li>
                    <li><a href="#">CV ATS Saya</a></li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
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
        </div>
    </div>
</div>
@endsection
