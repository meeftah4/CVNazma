@extends('dashboard.components.index')

@section('title', 'Dashboard')

@section('dahboard-content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800">Welcome to Admin Dashboard</h2>
    <p class="mt-2 text-gray-600">Manage your application settings and users here.</p>
</div>

<!-- Example Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold text-gray-800">Total Users</h3>
        <p class="mt-2 text-2xl font-bold text-blue-600">{{ $totalUsers }}</p> {{-- Tampilkan total pengguna --}}
    </div>
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold text-gray-800">Active Sessions</h3>
        <p class="mt-2 text-2xl font-bold text-green-600">567</p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold text-gray-800">Pending Tasks</h3>
        <p class="mt-2 text-2xl font-bold text-red-600">12</p>
    </div>
</div>
@endsection