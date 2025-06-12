<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request; // Import Request class

class GoogleController extends Controller
{
    public function redirectToGoogle(Request $request) // Tambahkan parameter Request $request
    {
        if ($request->has('redirect')) {
            session(['google_redirect_url' => $request->get('redirect')]);
        }
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user(); // Tambahkan stateless()

            // Cari pengguna berdasarkan email
            $user = Users::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = Users::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'profile_picture' => $googleUser->getAvatar(),
                    'password' => bcrypt('defaultpassword'),
                    'is_google_account' => true, // Tandai sebagai akun Google
                ]);
            }

            // Login pengguna
            Auth::login($user, true);

            // Regenerate sesi
            session()->regenerate();

            $redirectUrl = session('google_redirect_url', '/');
            session()->forget('google_redirect_url');
            return redirect($redirectUrl)->with('success', 'Login berhasil menggunakan Google!');
        } catch (\Exception $e) {
            // Tangani error dengan lebih spesifik
            return redirect('/')->with('error', 'Terjadi kesalahan saat login dengan Google: ' . $e->getMessage());
        }
    }
}