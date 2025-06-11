@extends('dashboard.components.index')

@section('title', 'Dashboard - Transactions')

@section('dahboard-content')
<style>
    .transactions-header {
        background: #F4F8FF;
        padding: 1.5rem;
        border-radius: 0.75rem;
        box-shadow: 0 6px 20px rgba(59,130,246,0.10);
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    .transactions-header-icon {
        width: 2.5rem;
        height: 2.5rem;
        color: #01287E;
    }
    .transactions-header-title {
        font-size: 1.875rem;
        font-weight: bold;
        color: #01287E;
    }
    .transactions-header-desc {
        margin-top: 0.25rem;
        color: #01287E;
    }
    .transactions-table-container {
        background: #fff;
        margin-top: 1.5rem;
        padding: 1.5rem;
        border-radius: 0.75rem;
        box-shadow: 0 6px 20px rgba(59,130,246,0.07);
        overflow-x: auto;
    }
    .transactions-table {
        min-width: 100%;
        border-collapse: collapse;
    }
    .transactions-table th {
        background: #F4F8FF;
        padding: 0.75rem 1rem;
        text-align: center;
        font-size: 0.95rem;
        font-weight: 600;
        color: #374151;
    }
    .transactions-table td {
        padding: 0.75rem 1rem;
        color: #374151;
        vertical-align: middle;
        text-align: center;
    }
    .transactions-table tr {
        border-bottom: 1px solid #e5e7eb;
        transition: background 0.2s;
    }
    .transactions-table tr:hover {
        background: #eef2ff;
    }
    .status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 100px; /* opsional, agar badge seragam */
        text-align: center;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.8rem;
        font-weight: bold;
        box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        border: 1px solid #e5e7eb;
    }
    .status-completed {
        background: #bbf7d0;
        color: #15803d;
        border-color: #15803d;
    }
    .status-pending {
        background: #fef9c3;
        color: #b45309;
        border-color: #facc15;
    }
    .status-cancelled {
        background: #fee2e2;
        color: #b91c1c;
        border-color: #b91c1c;
    }
    .action-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.3rem 0.8rem;
        border-radius: 0.5rem;
        font-size: 1rem;
        border: none;
        cursor: pointer;
        transition: background 0.2s;
        margin-right: 0.3rem;
    }
    .view-btn {
        background: #dbeafe;
        color: #1e40af;
    }
    .view-btn:hover {
        background: #bfdbfe;
    }
    .delete-btn {
        background: #fee2e2;
        color: #b91c1c;
    }
    .delete-btn:hover {
        background: #fecaca;
    }
    @media (max-width: 640px) {
        .transactions-header-title { font-size: 1.25rem; }
        .transactions-table th, .transactions-table td { padding: 0.5rem 0.5rem; }
        .action-btn { padding: 0.5rem 1rem; font-size: 0.9rem; }
    }
</style>

<div class="transactions-header">
    <svg class="transactions-header-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
        <circle cx="12" cy="12" r="10" stroke="#01287E" stroke-width="2.5" fill="none"/>
        <text x="12" y="17" text-anchor="middle" font-size="13" font-family="Arial, Helvetica, sans-serif" font-weight="bold" fill="#01287E">$</text>
    </svg>
    <div>
        <h2 class="transactions-header-title">Manajemen Transaksi</h2>
        <p class="transactions-header-desc">Kelola semua transaksi di sini!</p>
    </div>
</div>

<div class="transactions-table-container">
    <table class="transactions-table">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Pengguna</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td class="font-mono text-sm">TX12345</td>
                <td>
                    John Doe
                </td>
                </td>
                <td class="font-semibold" style="color:#16a34a;">$100.00</td>
                <td>
                    <span class="status-badge status-completed">Completed</span>
                </td>
                <td>2025-05-08</td>
                <td>
                    <button class="action-btn view-btn">Lihat</button>
                    <button class="action-btn delete-btn">Hapus</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td class="font-mono text-sm">TX12346</td>
                <td>
                    Jane Smith
                </td>
                <td class="font-semibold" style="color:#ca8a04;">$250.00</td>
                <td>
                    <span class="status-badge status-pending">Pending</span>
                </td>
                <td>2025-05-07</td>
                <td>
                    <button class="action-btn view-btn">Lihat</button>
                    <button class="action-btn delete-btn">Hapus</button>
                </td>
            </tr>
            <!-- Tambahkan baris transaksi lain di sini -->
        </tbody>
    </table>
</div>
@endsection