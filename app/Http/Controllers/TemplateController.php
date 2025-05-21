<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Menampilkan tampilan template berdasarkan ID.
     */
    public function show($id)
    {
        // Mapping id ke nama view
        $templates = [
            1 => 'templates.template1',
            2 => 'templates.template2',
            3 => 'templates.template3',
            4 => 'templates.template4',
            5 => 'templates.template5',
            6 => 'templates.template6',
        ];

        if (!array_key_exists($id, $templates)) {
            abort(404, 'Template tidak ditemukan.');
        }

        return view($templates[$id]);
    }

    /**
     * Fungsi unduh CV (bisa diganti nanti ke PDF export).
     */
    public function download()
    {
        // Contoh: mengunduh file PDF statis (nanti bisa diganti export dinamis)
        return response()->download(public_path('example_cv.pdf'));
    }
}
