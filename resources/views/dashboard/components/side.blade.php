<aside class="w-64 h-screen bg-gradient-to-b from-blue-600 to-blue-800 text-white shadow-md">
    <div class="p-4">
        <h1 class="text-lg font-bold">Admin Dashboard</h1>
    </div>
    <ul class="mt-6">
        <li>
            <a href="/dashboard" class="flex items-center p-4 hover:bg-blue-700">
                <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="/dashboard/users" class="flex items-center p-4 hover:bg-blue-700">
                <i class="fas fa-users mr-3"></i> Users
            </a>
        </li>
        <li>
            <a href="/dashboard/transactions" class="flex items-center p-4 hover:bg-blue-700">
                <i class="fas fa-cogs mr-3"></i> Transactions
            </a>
        </li>
        {{-- Tombol Switch ke Halaman Utama --}}
        <li>
            <a href="/" class="flex items-center p-4 hover:bg-blue-700">
                <i class="fas fa-home mr-3"></i> Switch ke Halaman Utama
            </a>
        </li>
    </ul>
</aside>