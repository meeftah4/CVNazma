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

// Profile Routes
Route::post('/daftar', [UsersController::class, 'register'])->name('register');
Route::post('/masuk', [UsersController::class, 'login'])->name('login');
Route::post('/profile/sampul/update', [UsersController::class, 'updateProfileSampul'])->middleware('auth')->name('profile.sampul.update');
Route::post('/profile/picture/update', [UsersController::class, 'updateProfilePicture'])->middleware('auth')->name('profile.picture.update');

// Account Routes
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/profile', [UsersController::class, 'showProfile'])->middleware('auth')->name('profile');
Route::post('/profile/update', [UsersController::class, 'updateProfile'])->middleware('auth')->name('profile.update');
Route::post('/logout', function () {Auth::logout();request()->session()->invalidate();request()->session()->regenerateToken();return redirect('/')->with('success', 'Anda telah logout.');})->name('logout');
Route::middleware(['auth'])->group(function () {Route::get('/profile/main', [UsersController::class, 'showMainProfile'])->name('profile.main');
Route::get('/profile/ats', [UsersController::class, 'showAtsProfile'])->name('profile.ats');});

// Dashboard Admin Routes
Route::get('/dashboard', function () {
        return view('dashboard.home');
});
Route::get('/dashboard/users', function () {
    return view('dashboard.users');
});
Route::get('/dashboard/transactions', function () {
    return view('dashboard.transactions');
});