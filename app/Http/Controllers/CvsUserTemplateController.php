<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Browsershot\Browsershot;

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

    public function showTemplate($template, Request $request)
    {
        $allowed = [
            'basic', 'template1', 'template2', 'template3', 'template4', 'template5'
        ];

        if (!in_array($template, $allowed)) {
            abort(404, 'Template tidak ditemukan.');
        }

        // Ambil data dari session
        $profil = session('profil', []);
        $pengalamankerja = session('pengalamankerja', []);
        $proyek = session('proyek', []);
        $pendidikan = session('pendidikan', []);
        $keahlian = session('keahlian', []);
        $bahasa = session('bahasa', []);
        $sertifikat = session('sertifikat', []);
        $hobi = session('hobi', []);

        $view = 'templates.indonesia.' . $template;
        $data = compact('profil', 'pengalamankerja', 'proyek', 'pendidikan', 'keahlian', 'bahasa', 'sertifikat', 'hobi');

        if ($request->has('download') && $request->query('download') == 1) {
            // Generate PDF dan download
            $pdf = Pdf::loadView($view, $data);
            $pdf->setPaper('a4', 'portrait');

            // Gunakan method download() agar header Content-Disposition diset dengan benar
            return $pdf->download("CV-{$template}.pdf");
        }

        // Jika bukan download, tampilkan view biasa untuk preview
        return view($view, $data);
    }
    public function downloadTemplate($template, Request $request)
    {
        $allowed = [
            'basic', 'template1', 'template2', 'template3', 'template4', 'template5'
        ];
        if (!in_array($template, $allowed)) abort(404);

        // Render HTML dari view (dengan asset eksternal)
        $html = view('templates.indonesia.' . $template, [
            'profil' => session('profil', []),
            'pengalamankerja' => session('pengalamankerja', []),
            'proyek' => session('proyek', []),
            'pendidikan' => session('pendidikan', []),
            'keahlian' => session('keahlian', []),
            'bahasa' => session('bahasa', []),
            'sertifikat' => session('sertifikat', []),
            'hobi' => session('hobi', []),
        ])->render();

        $pdf = Browsershot::html($html)
            ->format('A4')
            ->showBackground()
            ->margins(0, 0, 0, 0)
            ->pdf();

        return response($pdf)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="CV-' . $template . '.pdf"');
    }
}