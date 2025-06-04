<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CvsUserTemplateController extends Controller
{
    // Simpan data ke session
    public function saveSession(Request $request)
    {
        $profil = $request->input('profil', []);
        $foto = $request->input('foto', '');

        // Jika ada foto hasil crop, update ke profil[0]['cv_picture']
        if ($foto && isset($profil[0])) {
            $profil[0]['cv_picture'] = $foto;
        }

        session([
            'profil' => $profil,
            'pengalamankerja' => $request->input('pengalamankerja', []),
            'proyek' => $request->input('proyek', []),
            'pendidikan' => $request->input('pendidikan', []),
            'keahlian' => $request->input('keahlian', []),
            'bahasa' => $request->input('bahasa', []),
            'sertifikat' => $request->input('sertifikat', []),
            'hobi' => $request->input('hobi', []),
            'foto' => $foto, // opsional, boleh dihapus jika sudah di profil[0]['cv_picture']
        ]);
        return response()->json(['success' => true]);
    }

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
    public function showTemplate2()
    {
        $profil = session('profil', []);
        $pengalamankerja = session('pengalamankerja', []);
        $proyek = session('proyek', []);
        $pendidikan = session('pendidikan', []);
        $keahlian = session('keahlian', []);
        $bahasa = session('bahasa', []);
        $sertifikat = session('sertifikat', []);
        $hobi = session('hobi', []);

        return view('templates.indonesia.template2', compact(
            'profil', 'pengalamankerja', 'proyek', 'pendidikan', 'keahlian', 'bahasa', 'sertifikat', 'hobi'
        ));
    }
    public function showTemplate3()
    {
        $profil = session('profil', []);
        $pengalamankerja = session('pengalamankerja', []);
        $proyek = session('proyek', []);
        $pendidikan = session('pendidikan', []);
        $keahlian = session('keahlian', []);
        $bahasa = session('bahasa', []);
        $sertifikat = session('sertifikat', []);
        $hobi = session('hobi', []);

        return view('templates.indonesia.template3', compact(
            'profil', 'pengalamankerja', 'proyek', 'pendidikan', 'keahlian', 'bahasa', 'sertifikat', 'hobi'
        ));
    }
    public function showTemplate4()
    {
        $profil = session('profil', []);
        $pengalamankerja = session('pengalamankerja', []);
        $proyek = session('proyek', []);
        $pendidikan = session('pendidikan', []);
        $keahlian = session('keahlian', []);
        $bahasa = session('bahasa', []);
        $sertifikat = session('sertifikat', []);
        $hobi = session('hobi', []);

        return view('templates.indonesia.template4', compact(
            'profil', 'pengalamankerja', 'proyek', 'pendidikan', 'keahlian', 'bahasa', 'sertifikat', 'hobi'
        ));
    }
    public function showTemplate5()
    {
        $profil = session('profil', []);
        $pengalamankerja = session('pengalamankerja', []);
        $proyek = session('proyek', []);
        $pendidikan = session('pendidikan', []);
        $keahlian = session('keahlian', []);
        $bahasa = session('bahasa', []);
        $sertifikat = session('sertifikat', []);
        $hobi = session('hobi', []);

        return view('templates.indonesia.template5', compact(
            'profil', 'pengalamankerja', 'proyek', 'pendidikan', 'keahlian', 'bahasa', 'sertifikat', 'hobi'
        ));
    }
}