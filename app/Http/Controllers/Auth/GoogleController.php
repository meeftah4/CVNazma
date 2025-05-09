<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cari pengguna berdasarkan email
            $user = Users::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Jika pengguna belum ada, buat akun baru
                $user = Users::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'profile_picture' => $googleUser->getAvatar(),
                    'password' => bcrypt('defaultpassword'), // Password default (tidak akan digunakan)
                ]);
            }

            // Login pengguna
            Auth::login($user);

            return redirect('/')->with('success', 'Login berhasil menggunakan Google!');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan saat login dengan Google.');
        }
    }
}