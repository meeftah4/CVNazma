@extends('layouts.app')

@section('title', 'CV Nazma')

@vite(['resources/css/profile.css'])

@section('content')
<div class="profile-page">
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="profile-card">
                <img src="{{ $user->profile_sampul ? asset('storage/' . $user->profile_sampul) : asset('images/profile1.png') }}" alt="Background" class="profile-bg">
                <div class="profile-avatar">
                    @if ($user->profile_picture && filter_var($user->profile_picture, FILTER_VALIDATE_URL))
                        <img src="{{ $user->profile_picture }}" alt="Profile Picture">
                    @elseif ($user->profile_picture && file_exists(public_path('storage/' . $user->profile_picture)))
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
                    @else
                        <img src="{{ asset('images/profile2.png') }}" alt="Default Profile Picture">
                    @endif
                </div>
                <h2>{{ $user->name }}</h2>
                <ul>
                    <li>
                        <a href="{{ route('profile.main') }}" class="{{ Request::is('profile/main') ? 'active' : '' }}">Profil</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.ats') }}" class="{{ Request::is('profile/ats') ? 'active' : '' }}">Cv Ats Saya</a>
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
