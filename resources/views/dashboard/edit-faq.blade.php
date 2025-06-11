<!-- filepath: d:\Magang\CVNazma\resources\views\dashboard\edit-faq.blade.php -->
@extends('dashboard.components.index')

@section('title', 'Edit FAQ')

@section('dahboard-content')
<style>
.faq-form-container {
    background: #fff;
    padding: 2rem 2.5rem;
    border-radius: 0.75rem;
    box-shadow: 0 6px 24px rgba(59,130,246,0.10);
    margin-top: 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}
.faq-form-title {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 1.5rem;
    font-weight: bold;
    color: #01287E;
    margin-bottom: 1.5rem;
}
.faq-form-label {
    color: #01287E;
    font-weight: 600;
    margin-bottom: 0.5rem;
    display: block;
}
.faq-form-input, .faq-form-textarea {
    width: 100%;
    border: 1.5px solid #d1d5db;
    border-radius: 0.5rem;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    margin-bottom: 0.25rem;
    transition: border 0.2s;
    background: #f9fafb;
}
.faq-form-input:focus, .faq-form-textarea:focus {
    border-color: #01287E;
    outline: none;
    background: #fff;
}
.faq-form-error {
    color: #ef4444;
    font-size: 0.95rem;
    margin-bottom: 0.5rem;
}
.faq-form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 0.5rem;
    margin-top: 1.5rem;
}
.faq-form-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: #FFBC5D;
    color: #01287E;
    font-weight: 600;
    padding: 0.7rem 1.5rem;
    border-radius: 0.5rem;
    border: none;
    box-shadow: 0 2px 8px rgba(59,130,246,0.08);
    cursor: pointer;
    transition: background 0.2s, transform 0.2s;
}
.faq-form-btn:hover {
    background: #FFBC5D;
    transform: translateY(-2px) scale(1.03);
}
</style>

<div class="faq-form-container">
    <div class="faq-form-title">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
            <circle cx="12" cy="12" r="10" stroke="#01287E" stroke-width="2" fill="none"/>
            <text x="12" y="17" text-anchor="middle" font-size="13" font-family="Arial, Helvetica, sans-serif" font-weight="bold" fill="#01287E">?</text>
        </svg>
        Edit FAQ
    </div>
    <form action="{{ route('faq.update', $faq->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="question" class="faq-form-label">Pertanyaan</label>
            <input type="text" id="question" name="question" value="{{ old('question', $faq->question) }}" class="faq-form-input" placeholder="Masukkan pertanyaan">
            @error('question')
                <div class="faq-form-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="answer" class="faq-form-label">Jawaban</label>
            <textarea id="answer" name="answer" rows="4" class="faq-form-textarea" placeholder="Masukkan jawaban">{{ old('answer', $faq->answer) }}</textarea>
            @error('answer')
                <div class="faq-form-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="faq-form-actions">
            <button type="submit" class="faq-form-btn">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection