@extends('dashboard.components.index')

@section('title')
    {{ isset($package) ? 'Edit Paket' : 'Tambah Paket' }}
@endsection

@section('dahboard-content')
<style>
    .form-container {
        background: #fff;
        padding: 2rem;
        border-radius: 0.75rem;
        box-shadow: 0 6px 20px rgba(59,130,246,0.07);
        max-width: 600px;
        margin: 2rem auto;
    }
    .form-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #01287E;
        margin-bottom: 1.5rem;
        text-align: center;
    }
    .form-group {
        margin-bottom: 1rem;
    }
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #374151;
        font-weight: 600;
    }
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        transition: border-color 0.2s;
    }
    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59,130,246,0.25);
    }
    .form-group textarea {
        min-height: 100px;
        resize: vertical;
    }
    .form-actions {
        margin-top: 1.5rem;
        display: flex;
        justify-content: flex-end;
        gap: 0.5rem;
    }
    .form-submit-btn {
        background: #01287E;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.375rem;
        border: none;
        cursor: pointer;
        transition: background 0.2s;
    }
    .form-submit-btn:hover {
        background: #001f63;
    }
    .form-cancel-btn {
        background: #e5e7eb;
        color: #374151;
        padding: 0.75rem 1.5rem;
        border-radius: 0.375rem;
        border: none;
        cursor: pointer;
        transition: background 0.2s;
    }
    .form-cancel-btn:hover {
        background: #d1d5db;
    }
    .alert-danger {
        background-color: #fee2e2;
        border-color: #fecaca;
        color: #b91c1c;
        padding: 1rem;
        border-radius: 0.375rem;
        margin-bottom: 1rem;
    }
    .alert-danger ul {
        list-style-type: disc;
        margin-left: 1.25rem;
    }
</style>

<div class="form-container">
    <h2 class="form-title">{{ isset($package) ? 'Edit Paket' : 'Tambah Paket Baru' }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops! Ada beberapa masalah dengan input Anda:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($package) ? route('dashboard.package.update', $package->id) : route('dashboard.package.store') }}" method="POST">
        @csrf
        @if(isset($package))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Nama Paket</label>
            <input type="text" id="name" name="name" value="{{ old('name', $package->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" id="price" name="price" value="{{ old('price', $package->price ?? '') }}" required min="0">
        </div>

        <div class="form-group">
            <label for="amount">Jumlah</label>
            <input type="number" id="amount" name="amount" value="{{ old('amount', $package->amount ?? '1') }}" required min="1">
        </div>

        <div class="form-group">
            <label for="original">Harga Asli (Opsional)</label>
            <input type="number" id="original" name="original" value="{{ old('original', $package->original ?? '') }}" min="0">
        </div>

        <div class="form-group">
            <label for="bonus">Bonus (Opsional)</label>
            <input type="number" id="bonus" name="bonus" value="{{ old('bonus', $package->bonus ?? '') }}" min="0">
        </div>

        <div class="form-actions">
            <a href="{{ route('dashboard.package.index') }}" class="form-cancel-btn">Batal</a>
            <button type="submit" class="form-submit-btn">{{ isset($package) ? 'Simpan Perubahan' : 'Tambah Paket' }}</button>
        </div>
    </form>
</div>
@endsection
