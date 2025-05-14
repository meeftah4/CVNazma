<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqsController extends Controller
{
    public function index()
    {
        $faqs = Faq::all(); // Ambil semua data FAQs dari database
        return view('dashboard.faqs', compact('faqs')); // Kirim data ke view
    }

    public function create()
    {
        return view('dashboard.create-faq'); // Tampilkan form tambah data
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($request->all()); // Simpan data baru ke database

        return redirect()->route('dashboard.faqs')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id); // Cari data berdasarkan ID
        return view('dashboard.edit-faq', compact('faq')); // Kirim data ke view edit
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id); // Cari data berdasarkan ID
        $faq->update($request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ])); // Validasi dan update data

        return redirect()->route('dashboard.faqs')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id); // Cari data berdasarkan ID
        $faq->delete(); // Hapus data

        return redirect()->route('dashboard.faqs')->with('success', 'FAQ berhasil dihapus.');
    }
}
