<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleController;

// Page Routes
Route::get('/', function () {
    return view('pages.home');
});
Route::get('/cvats', function () {
    return view('pages.cv', [
    ]);
});
Route::get('/template', function () {
    return view('pages.template', [
    ]);
});

// Profile Routes
Route::post('/daftar', [UsersController::class, 'register'])->name('register');
Route::post('/masuk', [UsersController::class, 'login'])->name('login');
Route::get('/masuk', function () {return redirect('/')->with('error', 'Silahkan gunakan form login untuk masuk.');});
Route::post('/profile/sampul/update', [UsersController::class, 'updateProfileSampul'])->middleware('auth')->name('profile.sampul.update');
Route::post('/profile/picture/update', [UsersController::class, 'updateProfilePicture'])->middleware('auth')->name('profile.picture.update');

// Account Routes
Route::middleware(['web'])->group(function () {
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});
Route::get('/profile', [UsersController::class, 'showProfile'])->middleware('auth')->name('profile');
Route::post('/profile/update', [UsersController::class, 'updateProfile'])->middleware('auth')->name('profile.update');
Route::post('/logout', function () {Auth::logout();request()->session()->invalidate();request()->session()->regenerateToken();return redirect('/')->with('success', 'Anda telah logout.');})->name('logout');
Route::middleware(['auth'])->group(function () {Route::get('/profile/main', [UsersController::class, 'showMainProfile'])->name('profile.main');
Route::get('/profile/ats', [UsersController::class, 'showAtsProfile'])->name('profile.ats');});

// Admin Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [UsersController::class, 'dashboard'])->name('dashboard');

    // Users Management
    Route::get('/dashboard/users', [UsersController::class, 'index'])->name('dashboard.users');
    Route::delete('/dashboard/users/{id}', [UsersController::class, 'destroy'])->name('dashboard.users.destroy');
    Route::get('/dashboard/users/{id}/edit', [UsersController::class, 'edit'])->name('dashboard.users.edit');
    Route::put('/dashboard/users/{id}', [UsersController::class, 'update'])->name('dashboard.users.update');

    // Transactions Page
    Route::get('/dashboard/transactions', function () {
        $user = Auth::user();

        // Cek apakah pengguna sudah login
        if (!$user) {
            return redirect('/')->with('error', 'Silahkan login untuk mengakses halaman ini.');
        }

        // Cek apakah pengguna adalah admin
        if ($user->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak! Halaman ini hanya untuk admin.');
        }

        return view('dashboard.transactions');
    })->name('dashboard.transactions');
});