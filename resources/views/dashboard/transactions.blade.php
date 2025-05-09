@extends('dashboard.components.index')

@section('title', 'Dashboard - Transactions')

@section('dahboard-content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800">Welcome to Admin Dashboard</h2>
    <p class="mt-2 text-gray-600">Manage your application settings and users here.</p>
</div>

<!-- Example Cards -->
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800">Transactions</h2>
    <p class="mt-2 text-gray-600">Manage and view all transactions here.</p>
</div>

<!-- Transactions Table -->
<div class="bg-white mt-6 p-6 rounded-lg shadow-md">
    <table class="min-w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2 text-left">#</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Transaction ID</th>
                <th class="border border-gray-300 px-4 py-2 text-left">User</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Amount</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Date</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border border-gray-300 px-4 py-2">1</td>
                <td class="border border-gray-300 px-4 py-2">TX12345</td>
                <td class="border border-gray-300 px-4 py-2">John Doe</td>
                <td class="border border-gray-300 px-4 py-2">$100.00</td>
                <td class="border border-gray-300 px-4 py-2 text-green-600">Completed</td>
                <td class="border border-gray-300 px-4 py-2">2025-05-08</td>
                <td class="border border-gray-300 px-4 py-2">
                    <button class="text-blue-600 hover:underline">View</button>
                    <button class="text-red-600 hover:underline ml-2">Delete</button>
                </td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-4 py-2">2</td>
                <td class="border border-gray-300 px-4 py-2">TX12346</td>
                <td class="border border-gray-300 px-4 py-2">Jane Smith</td>
                <td class="border border-gray-300 px-4 py-2">$250.00</td>
                <td class="border border-gray-300 px-4 py-2 text-yellow-600">Pending</td>
                <td class="border border-gray-300 px-4 py-2">2025-05-07</td>
                <td class="border border-gray-300 px-4 py-2">
                    <button class="text-blue-600 hover:underline">View</button>
                    <button class="text-red-600 hover:underline ml-2">Delete</button>
                </td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div>
@endsection