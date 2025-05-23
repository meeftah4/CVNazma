<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CvsUserTemplateController extends Controller
{
    // Simpan data ke session
    public function saveSession(Request $request)
    {
        session([
            'profil' => $request->input('profil', []),
            'pengalamankerja' => $request->input('pengalamankerja', []),
            'proyek' => $request->input('proyek', []),
            'pendidikan' => $request->input('pendidikan', []),
            'keahlian' => $request->input('keahlian', []),
            'bahasa' => $request->input('bahasa', []),
            'sertifikat' => $request->input('sertifikat', []),
            'hobi' => $request->input('hobi', []),
        ]);
        return response()->json(['success' => true]);
    }

    // Tampilkan template1 dengan data dari session
    public function showTemplate1()
    {
        $profil = session('profil', []);
        $pengalamankerja = session('pengalamankerja', []);
        $proyek = session('proyek', []);
        $pendidikan = session('pendidikan', []);
        $keahlian = session('keahlian', []);
        $bahasa = session('bahasa', []);
        $sertifikat = session('sertifikat', []);
        $hobi = session('hobi', []);

        return view('templates.indonesia.template1', compact(
            'profil', 'pengalamankerja', 'proyek', 'pendidikan', 'keahlian', 'bahasa', 'sertifikat', 'hobi'
        ));
    }

    // Contoh untuk basic (jika ada)
    public function showBasic()
    {
        $profil = session('profil', []);
        $pengalamankerja = session('pengalamankerja', []);
        $proyek = session('proyek', []);
        $pendidikan = session('pendidikan', []);
        $keahlian = session('keahlian', []);
        $bahasa = session('bahasa', []);
        $sertifikat = session('sertifikat', []);
        $hobi = session('hobi', []);

        return view('templates.indonesia.basic', compact(
            'profil', 'pengalamankerja', 'proyek', 'pendidikan', 'keahlian', 'bahasa', 'sertifikat', 'hobi'
        ));
    }
}
