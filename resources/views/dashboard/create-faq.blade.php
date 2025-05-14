<!-- filepath: d:\Magang\CVNazma\resources\views\dashboard\create-faq.blade.php -->
@extends('dashboard.components.index')

@section('title', 'Tambah FAQ')

@section('dahboard-content')
<div class="bg-white p-6 rounded-lg shadow-md mt-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Tambah FAQ</h2>
    <form action="{{ route('faq.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="question" class="block text-gray-700">Pertanyaan</label>
            <input type="text" id="question" name="question" value="{{ old('question') }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            @error('question')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="answer" class="block text-gray-700">Jawaban</label>
            <textarea id="answer" name="answer" class="mt-1 block w-full border border-gray-300 rounded-md p-2">{{ old('answer') }}</textarea>
            @error('answer')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
        </div>
    </form>
</div>
@endsection