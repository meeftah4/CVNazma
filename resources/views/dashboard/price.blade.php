@extends('dashboard.components.index')

@section('title', 'Dashboard - Harga')

@section('dahboard-content')
<style>
    .price-header {
        background: #F4F8FF;
        padding: 1.5rem;
        border-radius: 0.75rem;
        box-shadow: 0 6px 20px rgba(59,130,246,0.10);
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    .price-header-icon {
        width: 2.5rem;
        height: 2.5rem;
        color: #01287E;
    }
    .price-header-title {
        font-size: 1.875rem;
        font-weight: bold;
        color: #01287E;
    }
    .price-header-desc {
        margin-top: 0.25rem;
        color: #01287E;
    }
    .price-table-container {
        background: #fff;
        margin-top: 1.5rem;
        padding: 1.5rem;
        border-radius: 0.75rem;
        box-shadow: 0 6px 20px rgba(59,130,246,0.07);
        overflow-x: auto;
    }
    .price-table {
        min-width: 100%;
        border-collapse: collapse;
    }
    .price-table th {
        background: #F4F8FF;
        padding: 0.75rem 1rem;
        text-align: center;
        font-size: 0.95rem;
        font-weight: 600;
        color: #374151;
    }
    .price-table td {
        padding: 0.75rem 1rem;
        color: #374151;
        vertical-align: middle;
        text-align: center;
    }
    .price-table td.name,
    .price-table td.value {
        text-align: left;
        max-width: 300px;
        white-space: normal;
        word-break: break-word;
        overflow-wrap: break-word;
    }
    .price-table tr {
        border-bottom: 1px solid #e5e7eb;
        transition: background 0.2s;
    }
    .price-table tr:hover {
        background: #eef2ff;
    }
    .price-badge {
        display: inline-block;
        background: #e0e7ff;
        color: #01287E;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    .price-action-btn {
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
        box-shadow: 0 2px 6px rgba(59,130,246,0.08);
    }
    .price-edit-btn {
        background: #dbeafe;
        color: #1e40af;
    }
    .price-edit-btn:hover {
        background: #bfdbfe;
    }
    .price-delete-btn {
        background: #fee2e2;
        color: #b91c1c;
    }
    .price-delete-btn:hover {
        background: #fecaca;
    }
    .price-tambah-btn {
        background: #FFBC5D;
        font-weight: 600;
        color: #01287E;
        border: none;
    }
    .price-tambah-btn:hover {
        background: #FFBC5D;
        color: #01287E;
    }
    @media (max-width: 640px) {
        .price-header-title { font-size: 1.25rem; }
        .price-table th, .price-table td { padding: 0.5rem 0.5rem; }
        .price-action-btn { padding: 0.5rem 1rem; font-size: 0.9rem; }
    }
</style>

<div class="price-header">
    <svg class="price-header-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
        <rect x="4" y="4" width="16" height="16" rx="4" stroke="#01287E" stroke-width="2.5" fill="none"/>
        <text x="12" y="17" text-anchor="middle" font-size="13" font-family="Arial, Helvetica, sans-serif" font-weight="bold" fill="#01287E">Rp</text>
    </svg>
    <div>
        <h2 class="price-header-title">Manajemen Harga</h2>
        <p class="price-header-desc">Kelola daftar harga paket di sini!</p>
    </div>
</div>

<div class="price-table-container">
    <div class="flex justify-end mb-3">
        <a href="#" 
           class="price-tambah-btn text-white px-4 py-2 rounded-md shadow hover:scale-105 transition">
           Tambah
        </a>
    </div>
    <table class="price-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Harga</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td class="name">Paket Basic</td>
                <td class="value">Rp 50.000</td>
                <td>
                    <span class="price-badge">01 Jan 2024</span>
                </td>
                <td>
                    <a href="#" class="price-action-btn price-edit-btn">Edit</a>
                    <button type="button" class="price-action-btn price-delete-btn" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td class="name">Paket Pro</td>
                <td class="value">Rp 120.000</td>
                <td>
                    <span class="price-badge">15 Feb 2024</span>
                </td>
                <td>
                    <a href="#" class="price-action-btn price-edit-btn">Edit</a>
                    <button type="button" class="price-action-btn price-delete-btn" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td class="name">Paket Premium</td>
                <td class="value">Rp 250.000</td>
                <td>
                    <span class="price-badge">10 Mar 2024</span>
                </td>
                <td>
                    <a href="#" class="price-action-btn price-edit-btn">Edit</a>
                    <button type="button" class="price-action-btn price-delete-btn" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection