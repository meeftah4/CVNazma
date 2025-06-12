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

            // Tambahan: jika AJAX, return JSON saja
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => true, 'user' => $user]);
            }

            // Flash message sukses
            return redirect('/')->with('success', 'Registrasi berhasil! Selamat datang di CV Nazma.');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kembalikan respons JSON dengan status 500
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Registrasi gagal! Silakan coba lagi.'], 500);
            }
            // Flash message gagal
            return redirect('/')->with('error', 'Registrasi gagal! Silakan coba lagi.');
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:8',
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $user = Auth::user();

                // Tambahan: jika AJAX, return JSON saja
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json(['success' => true, 'user' => $user]);
                }

                if ($user->role === 'admin') {
                    return redirect('/dashboard')->with('success', 'Login berhasil! Selamat datang, Admin.');
                }
                return redirect('/')->with('success', 'Login berhasil! Selamat datang, ' . $user->name . '.');
            }

            // Jika gagal
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Email atau password salah.'], 401);
            }
            return redirect('/')->with('error', 'Login gagal! Email atau password salah.');
        } catch (\Exception $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'message' => 'Terjadi kesalahan! Silakan coba lagi.'], 500);
            }
            return redirect('/')->with('error', 'Terjadi kesalahan! Silakan coba lagi.');
        }
    }

    protected function authenticated(Request $request, $user)
    {
        $redirect = session('url.intended', '/');
        return redirect($redirect);
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
        $cvs = \App\Models\Cvs_Users::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('pages.profile', [
            'content' => 'components.ats-profil',
            'user' => $user,
            'cvs' => $cvs,
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
                'password' => 'nullable|string|min:8', // Validasi password
            ]);

            // Ambil pengguna yang sedang login
            $user = Auth::user();

            // Cek apakah akun adalah akun Google
            if ($user->is_google_account && $request->filled('password')) {
                return redirect()->route('profile')->with('error', 'Password tidak dapat diubah untuk akun Google.');
            }

            // Update data pengguna
            $user->update([
                'name' => $validatedData['full_name'],
                'username' => $validatedData['username'],
                'telephone' => $validatedData['phone_number'],
                'address' => $validatedData['address'],
            ]);

            // Update password jika diisi dan bukan akun Google
            if (!$user->is_google_account && $request->filled('password')) {
                $user->update([
                    'password' => Hash::make($validatedData['password']),
                ]);
            }

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

        // Cek apakah pengguna sudah login
        if (!$user) {
            return redirect('/')->with('error', 'Silahkan login untuk mengakses halaman ini.');
        }

        // Cek apakah pengguna adalah admin
        if ($user->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak! Halaman ini hanya untuk admin.');
        }

        // Hitung total pengguna dan tampilkan dashboard
        $totalUsers = Users::count();
        return view('dashboard.home', compact('totalUsers'));
    }

    public function index()
    {
        $users = Users::all(); // Ambil semua data pengguna
        return view('dashboard.users', compact('users')); // Kirim data ke view
    }

    public function destroy($id)
    {
        try {
            $user = Users::findOrFail($id); // Cari pengguna berdasarkan ID
            $user->delete(); // Hapus pengguna
            return redirect()->route('dashboard.users')->with('success', 'User berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.users')->with('error', 'Terjadi kesalahan saat menghapus user.');
        }
    }

    public function edit($id)
    {
        $user = Users::findOrFail($id);
        return view('dashboard.edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string',
        ]);

        $user = Users::findOrFail($id);
        $user->update($validatedData);

        return redirect()->route('dashboard.users')->with('success', 'User berhasil diperbarui.');
    }
}