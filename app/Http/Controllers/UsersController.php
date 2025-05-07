<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function register(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
            ]);

            // Simpan data ke database
            Users::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            // Flash message sukses
            return redirect('/')->with('success', 'Registrasi berhasil! Selamat datang di CV Nazma.');
        } catch (\Exception $e) {
            // Flash message gagal
            return redirect('/')->with('error', 'Registrasi gagal! Silakan coba lagi.');
        }
    }

    public function login(Request $request)
    {
        try {
            // Validasi input
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:8',
            ]);

            // Cek kredensial
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                // Flash message sukses
                return redirect('/')->with('success', 'Login berhasil! Selamat datang kembali.');
            }

            // Flash message gagal
            return redirect('/')->with('error', 'Login gagal! Email atau password salah.');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Terjadi kesalahan! Silakan coba lagi.');
        }
    }

    public function showProfile(Request $request)
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Tentukan konten berdasarkan parameter atau default
        $content = $request->query('content', 'components.main-profil'); // Default ke 'main-profil'

        // Kirim data pengguna ke view
        return view('pages.profile', [
            'content' => $content,
            'user' => $user,
        ]);
    }

    public function showMainProfile()
    {
        $user = Auth::user();
        return view('pages.profile', [
            'content' => 'components.main-profil',
            'user' => $user,
        ]);
    }

    public function showAtsProfile()
    {
        $user = Auth::user();
        return view('pages.profile', [
            'content' => 'components.ats-profil',
            'user' => $user,
        ]);
    }

    public function updateProfile(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'full_name' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'phone_number' => 'nullable|string|max:15',
                'address' => 'nullable|string|max:255',
            ]);

            // Ambil pengguna yang sedang login
            $user = Auth::user();

            // Update data pengguna
            $user->update([
                'name' => $validatedData['full_name'],
                'username' => $validatedData['username'],
                'telephone' => $validatedData['phone_number'],
                'address' => $validatedData['address'],
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->route('profile')->with('error', 'Terjadi kesalahan saat memperbarui profil.');
        }
    }
}