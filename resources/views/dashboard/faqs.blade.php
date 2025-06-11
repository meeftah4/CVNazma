<!-- filepath: d:\Magang\CVNazma\resources\views\dashboard\faqs.blade.php -->
@extends('dashboard.components.index')

@section('title', 'Dashboard - Faqs')

@section('dahboard-content')
<style>
    .faqs-header {
        background: #F4F8FF;
        padding: 1.5rem;
        border-radius: 0.75rem;
        box-shadow: 0 6px 20px rgba(59,130,246,0.10);
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    .faqs-header-icon {
        width: 2.5rem;
        height: 2.5rem;
        color: #01287E;
    }
    .faqs-header-title {
        font-size: 1.875rem;
        font-weight: bold;
        color: #01287E;
    }
    .faqs-header-desc {
        margin-top: 0.25rem;
        color: #01287E;
    }
    .faqs-table-container {
        background: #fff;
        margin-top: 1.5rem;
        padding: 1.5rem;
        border-radius: 0.75rem;
        box-shadow: 0 6px 20px rgba(59,130,246,0.07);
        overflow-x: auto;
    }
    .faqs-table {
        min-width: 100%;
        border-collapse: collapse;
    }
    .faqs-table th {
        background: #F4F8FF;
        padding: 0.75rem 1rem;
        text-align: center;
        font-size: 0.95rem;
        font-weight: 600;
        color: #374151;
    }
    .faqs-table td {
        padding: 0.75rem 1rem;
        color: #374151;
        vertical-align: middle;
        text-align: center;
    }
    .faqs-table td.question,
    .faqs-table td.answer {
        text-align: left;
        max-width: 300px;
        white-space: normal;
        word-break: break-word;
        overflow-wrap: break-word;
    }
    .faqs-table tr {
        border-bottom: 1px solid #e5e7eb;
        transition: background 0.2s;
    }
    .faqs-table tr:hover {
        background: #eef2ff;
    }
    .faq-badge {
        display: inline-block;
        background: #e0e7ff;
        color: #01287E;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    .faq-action-btn {
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
    .faq-edit-btn {
        background: #dbeafe;
        color: #1e40af;
    }
    .faq-edit-btn:hover {
        background: #bfdbfe;
    }
    .faq-delete-btn {
        background: #fee2e2;
        color: #b91c1c;
    }
    .faq-delete-btn:hover {
        background: #fecaca;
    }
    .faq-tambah-btn {
        background: #FFBC5D;
        font-weight: 600;
        color: #01287E;
        border: none;
    }
    .faq-tambah-btn:hover {
        background: #FFBC5D;
        color: #01287E;
    }
    @media (max-width: 640px) {
        .faqs-header-title { font-size: 1.25rem; }
        .faqs-table th, .faqs-table td { padding: 0.5rem 0.5rem; }
        .faq-action-btn { padding: 0.5rem 1rem; font-size: 0.9rem; }
    }
</style>

<div class="faqs-header">
    <svg class="faqs-header-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
        <circle cx="12" cy="12" r="10" stroke="#01287E" stroke-width="2.5" fill="none"/>
        <text x="12" y="17" text-anchor="middle" font-size="13" font-family="Arial, Helvetica, sans-serif" font-weight="bold" fill="#01287E">?</text>

    </svg>
    <div>
        <h2 class="faqs-header-title">Manajemen FAQ</h2>
        <p class="faqs-header-desc">Kelola pertanyaan yang sering diajukan di sini!</p>
    </div>
</div>

<div class="faqs-table-container">
    <div class="flex justify-end mb-3">
        <a href="{{ route('faq.create') }}" 
           class="faq-tambah-btn text-white px-4 py-2 rounded-md shadow hover:scale-105 transition">
           Tambah
        </a>
    </div>
    <table class="faqs-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faqs as $index => $faq)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td class="question">{{ $faq->question }}</td>
                <td class="answer">{{ $faq->answer }}</td>
                <td>
                    <span class="faq-badge">{{ $faq->created_at->format('d M Y') }}</span>
                </td>
                <td>
                    <a href="{{ route('faq.edit', $faq->id) }}" class="faq-action-btn faq-edit-btn">Edit</a>
                    <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" class="inline-block" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="faq-action-btn faq-delete-btn" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection