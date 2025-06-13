@extends('dashboard.components.index')

@section('title', 'Dashboard - Paket')

@section('dahboard-content')
<style>
    .package-header {
        background: #F4F8FF;
        padding: 1.5rem;
        border-radius: 0.75rem;
        box-shadow: 0 6px 20px rgba(59,130,246,0.10);
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    .package-header-icon {
        width: 2.5rem;
        height: 2.5rem;
        color: #01287E;
    }
    .package-header-title {
        font-size: 1.875rem;
        font-weight: bold;
        color: #01287E;
    }
    .package-header-desc {
        margin-top: 0.25rem;
        color: #01287E;
    }
    .package-table-container {
        background: #fff;
        margin-top: 1.5rem;
        padding: 1.5rem;
        border-radius: 0.75rem;
        box-shadow: 0 6px 20px rgba(59,130,246,0.07);
        overflow-x: auto;
    }
    .package-table {
        min-width: 100%;
        border-collapse: collapse;
    }
    .package-table th {
        background: #F4F8FF;
        padding: 0.75rem 1rem;
        text-align: center;
        font-size: 0.95rem;
        font-weight: 600;
        color: #374151;
    }
    .package-table td {
        padding: 0.75rem 1rem;
        color: #374151;
        vertical-align: middle;
        text-align: center;
    }
    .package-table td.name,
    .package-table td.desc {
        text-align: left;
        max-width: 300px;
        white-space: normal;
        word-break: break-word;
        overflow-wrap: break-word;
    }
    .package-table tr {
        border-bottom: 1px solid #e5e7eb;
        transition: background 0.2s;
    }
    .package-table tr:hover {
        background: #eef2ff;
    }
    .package-badge {
        display: inline-block;
        background: #e0e7ff;
        color: #01287E;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    .package-action-btn {
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
    .package-edit-btn {
        background: #dbeafe;
        color: #1e40af;
    }
    .package-edit-btn:hover {
        background: #bfdbfe;
    }
    .package-delete-btn {
        background: #fee2e2;
        color: #b91c1c;
    }
    .package-delete-btn:hover {
        background: #fecaca;
    }
    .package-tambah-btn {
        background: #FFBC5D;
        font-weight: 600;
        color: #01287E;
        border: none;
    }
    .package-tambah-btn:hover {
        background: #FFBC5D;
        color: #01287E;
    }
    @media (max-width: 640px) {
        .package-header-title { font-size: 1.25rem; }
        .package-table th, .package-table td { padding: 0.5rem 0.5rem; }
        .package-action-btn { padding: 0.5rem 1rem; font-size: 0.9rem; }
    }
</style>

<div class="package-header">
    <svg class="package-header-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
        <rect x="4" y="7" width="16" height="10" rx="3" stroke="#01287E" stroke-width="2.5" fill="none"/>
        <rect x="8" y="3" width="8" height="4" rx="2" stroke="#01287E" stroke-width="2" fill="none"/>
    </svg>
    <div>
        <h2 class="package-header-title">Manajemen Paket</h2>
        <p class="package-header-desc">Kelola daftar paket layanan di sini!</p>
    </div>
</div>

<div class="package-table-container">
    <div class="flex justify-end mb-3">
        <a href="{{ route('dashboard.package.create') }}" 
           class="package-tambah-btn text-white px-4 py-2 rounded-md shadow hover:scale-105 transition">
           Tambah
        </a>
    </div>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <table class="package-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Harga (Diskon)</th>
                <th>Jumlah</th>
                <th>Harga Asli</th>
                <th>Bonus</th> <!-- Tambahkan ini -->
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($packages as $index => $package)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td class="name">{{ $package->name }}</td>
                <td>Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                <td>{{ $package->amount }}</td>
                <td>Rp {{ $package->original ? number_format($package->original, 0, ',', '.') : '-' }}</td>
                <td>{{ $package->bonus ?? '-' }}</td> <!-- Tambahkan ini -->
                <td>
                    <span class="package-badge">{{ $package->created_at->format('d M Y') }}</span>
                </td>
                <td>
                    <a href="{{ route('dashboard.package.edit', $package->id) }}" class="package-action-btn package-edit-btn">Edit</a>
                    <form action="{{ route('dashboard.package.destroy', $package->id) }}" method="POST" class="inline-block" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="package-action-btn package-delete-btn" onclick="return confirm('Apakah Anda yakin ingin menghapus paket ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center py-4">Tidak ada data paket.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection