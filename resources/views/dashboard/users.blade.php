@extends('dashboard.components.index')

@section('title', 'Dashboard - Users')

@section('dahboard-content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800">Users Management</h2>
    <p class="mt-2 text-gray-600">Manage all registered users here.</p>
</div>

<!-- Users Table -->
<div class="bg-white mt-6 p-6 rounded-lg shadow-md">
    <table class="min-w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Role</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border border-gray-300 px-4 py-2">1</td>
                <td class="border border-gray-300 px-4 py-2">John Doe</td>
                <td class="border border-gray-300 px-4 py-2">john.doe@example.com</td>
                <td class="border border-gray-300 px-4 py-2">Admin</td>
                <td class="border border-gray-300 px-4 py-2">
                    <button class="text-blue-600 hover:underline">Edit</button>
                    <button class="text-red-600 hover:underline ml-2">Delete</button>
                </td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-4 py-2">2</td>
                <td class="border border-gray-300 px-4 py-2">Jane Smith</td>
                <td class="border border-gray-300 px-4 py-2">jane.smith@example.com</td>
                <td class="border border-gray-300 px-4 py-2">User</td>
                <td class="border border-gray-300 px-4 py-2">
                    <button class="text-blue-600 hover:underline">Edit</button>
                    <button class="text-red-600 hover:underline ml-2">Delete</button>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>
@endsection