@extends('dashboard.components.index')

@section('title', 'Dashboard - Users')

@section('dahboard-content')
<style>
    .users-header {
        background: #F4F8FF;
        padding: 1.5rem;
        border-radius: 0.75rem;
        box-shadow: 0 6px 20px rgba(59,130,246,0.10);
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    .users-header-icon {
        width: 2.5rem;
        height: 2.5rem;
        color: #01287E;
    }
    .users-header-title {
        font-size: 1.875rem;
        font-weight: bold;
        color: #01287E;
    }
    .users-header-desc {
        margin-top: 0.25rem;
        color: #01287E;
    }
    .users-table-container {
        background: #fff;
        margin-top: 1.5rem;
        padding: 1.5rem;
        border-radius: 0.75rem;
        box-shadow: 0 6px 20px rgba(59,130,246,0.07);
        overflow-x: auto;
    }
    .users-table {
        min-width: 100%;
        border-collapse: collapse;
    }
    .users-table th {
        background: #F4F8FF;
        padding: 0.75rem 1rem;
        text-align: left;
        font-size: 0.95rem;
        font-weight: 600;
        color: #374151;
    }
    .users-table td {
        padding: 0.75rem 1rem;
        color: #374151;
        vertical-align: middle;
    }
    .users-table tr {
        border-bottom: 1px solid #e5e7eb;
        transition: background 0.2s;
    }
    .users-table tr:hover {
        background: #eef2ff;
    }
    .role-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.8rem;
        font-weight: bold;
        box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        border: 1px solid #e5e7eb;
    }
    .role-admin {
        background: #bbf7d0;
        color: #15803d;
        border-color: #15803d;
    }
    .role-user {
        background: #dbeafe;
        color: #01287E;
        border-color: #01287E;
    }
    .role-other {
        background: #f3f4f6;
        color: #374151;
        border-color: #d1d5db;
    }
    .delete-btn {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.3rem 0.8rem;
        background: #fee2e2; /* merah muda */
        color: #b91c1c;      /* merah */
        border-radius: 0.5rem;
        font-size: 1rem;
        box-shadow: 0 2px 6px rgba(239,68,68,0.08);
        transition: background 0.2s;
        border: none;
        cursor: pointer;
    }
    .delete-btn:hover {
        background: #fecaca;
    }
    .users-table th:nth-child(4),
    .users-table td:nth-child(4) {
        text-align: center;
        vertical-align: middle;
    }
    @media (max-width: 640px) {
        .users-header-title { font-size: 1.25rem; }
        .users-table th, .users-table td { padding: 0.5rem 0.5rem; }
        .delete-btn { padding: 0.5rem 1rem; font-size: 0.9rem; }
    }
</style>

<div class="users-header">
    <svg class="users-header-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-2a4 4 0 10-8 0 4 4 0 008 0zm6-2a4 4 0 10-8 0 4 4 0 008 0z" />
    </svg>
    <div>
        <h2 class="users-header-title">Manajemen Pengguna</h2>
        <p class="users-header-desc">Kelola semua pengguna terdaftar di sini!</p>
    </div>
</div>

<div class="users-table-container">
    <table class="users-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="role-badge
                        @if($user->role == 'admin') role-admin
                        @elseif($user->role == 'user') role-user
                        @else role-other @endif">
                        {{ ucfirst($user->role) }}
                    </span>
                </td>
                <td>
                    <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="delete-btn"
                            onclick="return confirm('Are you sure?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center; color:#9ca3af; padding:1.5rem 0;">No users found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection