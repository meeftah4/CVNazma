@extends('layouts.app')

@section('title', 'CV Nazma')

@vite(['resources/css/profile.css'])

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
                <h2>{{ $user->name }}</h2>
                <ul>
                    <li>
                        <a href="{{ route('profile.main') }}" class="{{ Request::is('profile/main') ? 'active' : '' }}">Profil</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.ats') }}" class="{{ Request::is('profile/ats') ? 'active' : '' }}">CV ATS Saya</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content">
            @include($content, ['user' => $user]) <!-- Kirim variabel $user ke view -->
        </div>
    </div>
</div>
@endsection
