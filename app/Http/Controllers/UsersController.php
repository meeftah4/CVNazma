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
            $user = Users::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            // Login pengguna setelah registrasi
            Auth::login($user);

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

                // Ambil pengguna yang sedang login
                $user = Auth::user();

                // Cek apakah pengguna adalah admin
                if ($user->role === 'admin') {
                    // Redirect ke dashboard admin
                    return redirect('/dashboard')->with('success', 'Login berhasil! Selamat datang, Admin.');
                }

                // Jika bukan admin, redirect ke halaman utama
                return redirect('/')->with('success', 'Login berhasil! Selamat datang, ' . $user->name . '.');
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

    public function updateProfilePicture(Request $request)
    {
        try {
            // Validasi file gambar
            $request->validate([
                'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Ambil pengguna yang sedang login
            $user = Auth::user();

            // Simpan file gambar ke folder 'public/storage/profile_pictures'
            $file = $request->file('profile_picture');
            $filePath = $file->store('profile_pictures', 'public');

            // Hapus gambar lama jika ada
            if ($user->profile_picture && file_exists(public_path('storage/' . $user->profile_picture))) {
                unlink(public_path('storage/' . $user->profile_picture));
            }

            // Update path gambar di database
            $user->update([
                'profile_picture' => $filePath,
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('profile')->with('success', 'Foto profil berhasil diperbarui.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->route('profile')->with('error', 'Terjadi kesalahan saat memperbarui foto profil.');
        }
    }

    public function updateProfileSampul(Request $request)
    {
        try {
            // Validasi file gambar
            $request->validate([
                'profile_sampul' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Ambil pengguna yang sedang login
            $user = Auth::user();

            // Simpan file gambar ke folder 'public/storage/profile_sampul'
            $file = $request->file('profile_sampul');
            $filePath = $file->store('profile_sampul', 'public');

            // Hapus gambar lama jika ada
            if ($user->profile_sampul && file_exists(public_path('storage/' . $user->profile_sampul))) {
                unlink(public_path('storage/' . $user->profile_sampul));
            }

            // Update path gambar di database
            $user->update([
                'profile_sampul' => $filePath,
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('profile')->with('success', 'Sampul profil berhasil diperbarui.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->route('profile')->with('error', 'Terjadi kesalahan saat memperbarui sampul profil.');
        }
    }

    public function dashboard()
    {
        $user = Auth::user();

        // Cek apakah pengguna adalah admin
        if ($user && $user->role === 'admin') {
            return view('dashboard.home');
        }

        // Jika bukan admin, redirect ke halaman utama
        return redirect('/')->with('error', 'Akses ditolak! Halaman ini hanya untuk admin.');
    }
}