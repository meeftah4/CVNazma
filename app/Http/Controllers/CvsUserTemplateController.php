<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        } elseif (isset($profil[0])) {
            // Jika tidak ada foto, kosongkan cv_picture
            $profil[0]['cv_picture'] = '';
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
        $allowed = ['basic', 'template1', 'template2', 'template3', 'template4', 'template5'];
        if (!in_array($template, $allowed)) abort(404);

        $cvsy_id = $request->query('cvsy_id');
        if ($cvsy_id) {
            $cv = \App\Models\Cvs_Users::findOrFail($cvsy_id);

            $profil = [[
                'name' => $cv->name,
                'email' => $cv->email,
                'phone' => $cv->phone,
                'address' => $cv->address,
                'description' => $cv->description,
                'photo' => $cv->cv_picture,
                'linkedin' => $cv->linkedin,
                'portfolio' => $cv->portfolio,
            ]];
            $pengalamankerja = \App\Models\work_experiences::where('cvsy_id', $cvsy_id)->get()->toArray();
            $proyek = \App\Models\Project::where('cvsy_id', $cvsy_id)->get()->toArray();
            $pendidikan = \App\Models\educations::where('cvsy_id', $cvsy_id)->get()->toArray();
            $keahlian = \App\Models\skills::where('cvsy_id', $cvsy_id)->get()->toArray();
            $bahasa = \App\Models\languages::where('cvsy_id', $cvsy_id)->get()->toArray();
            $sertifikat = \App\Models\certificate::where('cvsy_id', $cvsy_id)->get()->toArray();
            $hobi = \App\Models\hobbies::where('cvsy_id', $cvsy_id)->get()->toArray();

            // PENTING: render dari folder cv-user
            return view('templates.cv-user.' . $template, compact(
                'profil', 'pengalamankerja', 'proyek', 'pendidikan', 'keahlian', 'bahasa', 'sertifikat', 'hobi'
            ));
        }

        // fallback ke session (preview sebelum simpan)
        $profil = session('profil', []);
        $pengalamankerja = session('pengalamankerja', []);
        $proyek = session('proyek', []);
        $pendidikan = session('pendidikan', []);
        $keahlian = session('keahlian', []);
        $bahasa = session('bahasa', []);
        $sertifikat = session('sertifikat', []);
        $hobi = session('hobi', []);

        return view('templates.indonesia.' . $template, compact(
            'profil', 'pengalamankerja', 'proyek', 'pendidikan', 'keahlian', 'bahasa', 'sertifikat', 'hobi'
        ));
    }
    
    public function downloadTemplate($template, Request $request)
    {
        $allowed = [
            'basic', 'template1', 'template2', 'template3', 'template4', 'template5'
        ];
        if (!in_array($template, $allowed)) abort(404);

        $cvsy_id = $request->query('cvsy_id');
        if ($cvsy_id) {
            $cv = \App\Models\Cvs_Users::findOrFail($cvsy_id);

            $profil = [[
                'name' => $cv->name,
                'email' => $cv->email,
                'phone' => $cv->phone,
                'address' => $cv->address,
                'description' => $cv->description,
                'photo' => $cv->cv_picture,
                'linkedin' => $cv->linkedin,
                'portfolio' => $cv->portfolio,
            ]];
            $pengalamankerja = \App\Models\work_experiences::where('cvsy_id', $cvsy_id)->get()->toArray();
            $proyek = \App\Models\Project::where('cvsy_id', $cvsy_id)->get()->toArray();
            $pendidikan = \App\Models\educations::where('cvsy_id', $cvsy_id)->get()->toArray();
            $keahlian = \App\Models\skills::where('cvsy_id', $cvsy_id)->get()->toArray();
            $bahasa = \App\Models\languages::where('cvsy_id', $cvsy_id)->get()->toArray();
            $sertifikat = \App\Models\certificate::where('cvsy_id', $cvsy_id)->get()->toArray();
            $hobi = \App\Models\hobbies::where('cvsy_id', $cvsy_id)->get()->toArray();

            // Render dari folder cv-user
            $html = view('templates.cv-user.' . $template, compact(
                'profil', 'pengalamankerja', 'proyek', 'pendidikan', 'keahlian', 'bahasa', 'sertifikat', 'hobi'
            ))->render();
        } else {
            // fallback ke session (jika tidak ada id)
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
        }

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