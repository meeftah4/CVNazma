{{-- filepath: d:\Magang\CVNazma\resources\views\dashboard\edit-user.blade.php --}}
@extends('dashboard.components.index')

@section('title', 'Edit User')

@section('dahboard-content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800">Edit User</h2>
    <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="w-full border border-gray-300 rounded-lg px-4 py-2">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="w-full border border-gray-300 rounded-lg px-4 py-2">
        </div>
        <div class="mb-4">
            <label for="role" class="block text-gray-700">Role</label>
            <select name="role" id="role" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Update</button>
    </form>
</div>
@endsection