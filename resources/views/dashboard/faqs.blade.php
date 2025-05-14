<!-- filepath: d:\Magang\CVNazma\resources\views\dashboard\faqs.blade.php -->
@extends('dashboard.components.index')

@section('title', 'Dashboard - Faqs')

@section('dahboard-content')
<div class="bg-white p-6 rounded-lg shadow-md mt-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Frequently Asked Questions</h2>
    <div class="mb-4">
        <a href="{{ route('faq.create') }}" class="bg-gradient-to-b from-blue-600 to-blue-800 text-white px-4 py-2 rounded-md">Tambah FAQ</a>
    </div>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b text-left text-gray-600">No</th>
                <th class="py-2 px-4 border-b text-left text-gray-600">Pertanyaan</th>
                <th class="py-2 px-4 border-b text-left text-gray-600">Jawaban</th>
                <th class="py-2 px-4 border-b text-left text-gray-600">Tanggal Dibuat</th>
                <th class="py-2 px-4 border-b text-left text-gray-600">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faqs as $index => $faq)
            <tr>
                <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                <td class="py-2 px-4 border-b">{{ $faq->question }}</td>
                <td class="py-2 px-4 border-b">{{ $faq->answer }}</td>
                <td class="py-2 px-4 border-b">{{ $faq->created_at->format('d M Y') }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('faq.edit', $faq->id) }}" class="text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection