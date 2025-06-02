<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CvsUsersController extends Controller
{
    public function saveFromSession(Request $request)
    {
        // Debug: cek isi session
        Log::info('SESSION PROFIL', session('profil', []));

        $user = \Illuminate\Support\Facades\Auth::user();
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        // Ambil data dari session
        $profil = session('profil', [])[0] ?? [];

        // Simpan ke cvs_users
        $cv = \App\Models\Cvs_Users::create([
            'user_id'     => $user->id,
            'name'        => $profil['name'] ?? '',
            'email'       => $profil['email'] ?? '',
            'phone'       => $profil['phone'] ?? '',
            'address'     => $profil['address'] ?? '',
            'linkedin'    => $profil['linkedin'] ?? '',
            'website'     => $profil['website'] ?? ($profil['portfolio'] ?? ''),
            'description' => $profil['description'] ?? '',
            'cv_picture'  => $profil['cv_picture'] ?? '', // <-- path gambar dari session
        ]);

        $cvsy_id = $cv->id;

        // Kembalikan id untuk dipakai di frontend
        return response()->json(['success' => true, 'cvsy_id' => $cvsy_id]);
    }
    public function uploadPhoto(Request $request)
    {
        $photo = $request->input('photo');
        if ($photo && preg_match('/^data:image\/(\w+);base64,/', $photo, $type)) {
            $data = substr($photo, strpos($photo, ',') + 1);
            $data = base64_decode($data);
            $ext = strtolower($type[1]);
            $filename = uniqid() . '.' . $ext;
            $folder = 'assets/cvs_profile';
            $path = $folder . '/' . $filename;

            // Pastikan folder ada
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder, 0775, true);
            }

            Storage::disk('public')->put($path, $data);
            return response()->json(['path' => 'storage/' . $path]);
        }
        return response()->json(['message' => 'No file uploaded'], 400);
    }
}
