<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/CvAts', function () {
    return view('pages.cv', [
    ]);
});

Route::post('/daftar', [UsersController::class, 'register'])->name('register');
Route::post('/masuk', [UsersController::class, 'login'])->name('login');
Route::get('/profile', [UsersController::class, 'showProfile'])->middleware('auth')->name('profile');
Route::post('/profile/update', [UsersController::class, 'updateProfile'])->middleware('auth')->name('profile.update');
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/')->with('success', 'Anda telah logout.');
})->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/main', [UsersController::class, 'showMainProfile'])->name('profile.main');
    Route::get('/profile/ats', [UsersController::class, 'showAtsProfile'])->name('profile.ats');
});
