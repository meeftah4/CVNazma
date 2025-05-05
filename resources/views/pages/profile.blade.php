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
                    <li><a href="/profile">Profil</a></li>
                    <li><a href="/profile/ats">CV ATS Saya</a></li>
                </ul>
            </div>
        </div>
        <div class="main-content">
            @include($content)
        </div>
    </div>
</div>
@endsection

<div class="profile-card">
    <div class="profile-bg"></div>
    <div class="profile-avatar">
        <img src="avatar.jpg" alt="Avatar">
    </div>
    <h2>Nama Pengguna</h2>
    <ul>
        <li><a href="/profile" class="active">Profil</a></li>
        <li><a href="/cv-ats">CV ATS Saya</a></li>
    </ul>
</div>