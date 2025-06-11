<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\CvsUsersController;
use App\Http\Controllers\WorkExperiencesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EducationsController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\LanguagesController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\HobbiesController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\CvsUserTemplateController;
use App\Models\transactions;

// Page Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cvats', function () {
    return view('pages.cv', [
    ]);
});
Route::get('/cvats/unduh', function () {
    return view('pages.unduh-cv', [
    ]);
});
Route::get('/template', function () {
    return view('pages.template', [
    ]);
});

Route::get('/rating', function () {
    return view('dashboard.rating');
})->name('rating');

Route::get('/template-cv-html', [TemplatesController::class, 'showTemplates']);

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
    Route::get('/dashboard/faqs', [FaqsController::class, 'index'])->name('dashboard.faqs');
    Route::get('/dashboard/faqs/{id}/edit', [FaqsController::class, 'edit'])->name('faq.edit');
    Route::put('/dashboard/faqs/{id}', [FaqsController::class, 'update'])->name('faq.update');
    Route::delete('/dashboard/faqs/{id}', [FaqsController::class, 'destroy'])->name('faq.destroy');
    Route::get('/dashboard/faqs/create', [FaqsController::class, 'create'])->name('faq.create');
    Route::post('/dashboard/faqs', [FaqsController::class, 'store'])->name('faq.store');
});

// Template Routes
Route::post('/cv/save-session', [\App\Http\Controllers\CvsUserTemplateController::class, 'saveSession']);
Route::get('/indonesia/basic', [\App\Http\Controllers\CvsUserTemplateController::class, 'showBasic']);
Route::get('/indonesia/template1', [\App\Http\Controllers\CvsUserTemplateController::class, 'showTemplate1']);
Route::get('/indonesia/template2', [\App\Http\Controllers\CvsUserTemplateController::class, 'showTemplate2']);
Route::get('/indonesia/template3', [\App\Http\Controllers\CvsUserTemplateController::class, 'showTemplate3']);
Route::get('/indonesia/template4', [\App\Http\Controllers\CvsUserTemplateController::class, 'showTemplate4']);
Route::get('/indonesia/template5', [\App\Http\Controllers\CvsUserTemplateController::class, 'showTemplate5']);
Route::get('/cv/get-session', function() {
    return response()->json([
        'profil' => session('profil', []),
        'pengalamankerja' => session('pengalamankerja', []),
        'proyek' => session('proyek', []),
        'pendidikan' => session('pendidikan', []),
        'keahlian' => session('keahlian', []),
        'bahasa' => session('bahasa', []),
        'sertifikat' => session('sertifikat', []),
        'hobi' => session('hobi', []),
        'foto' => session('foto', ''),
    ]);
});
Route::get('/view/{key}', function ($key) {
    return view('templates.view.' . $key);
});
Route::post('/cvs-users/save-from-session', [CvsUsersController::class, 'saveFromSession'])->middleware('auth');
Route::post('/work-experiences/store-from-session', [WorkExperiencesController::class, 'storeFromSession'])->middleware('auth');
Route::post('/projects/store-from-session', [ProjectController::class, 'storeFromSession'])->middleware('auth');
Route::post('/educations/store-from-session', [EducationsController::class, 'storeFromSession'])->middleware('auth');
Route::post('/skills/store-from-session', [SkillsController::class, 'storeFromSession'])->middleware('auth');
Route::post('/languages/store-from-session', [LanguagesController::class, 'storeFromSession'])->middleware('auth');
Route::post('/certificates/store-from-session', [CertificateController::class, 'storeFromSession'])->middleware('auth');
Route::post('/hobbies/store-from-session', [HobbiesController::class, 'storeFromSession'])->middleware('auth');
Route::post('/cvs-users/upload-photo', [CvsUsersController::class, 'uploadPhoto'])->middleware('auth');
Route::post('/midtrans/get-snap-token', [\App\Http\Controllers\TransactionsController::class, 'getSnapToken'])->middleware('auth');
Route::post('/midtrans/callback', [TransactionsController::class, 'midtransCallback']);
Route::post('/midtrans/check-status', [\App\Http\Controllers\TransactionsController::class, 'checkStatus'])->middleware('auth');
Route::get('/cvats/cv-complete', function () {
    $user = Auth::user();
    $cvsy_id = request('cvsy_id');
    $template = request('template', 'basic');
    $cv = \App\Models\Cvs_Users::where('id', $cvsy_id)
        ->where('user_id', $user->id)
        ->firstOrFail();

    return view('pages.cv-complete', [
        'cv' => $cv,
        'template' => $template,
        'cvsy_id' => $cvsy_id,
    ]);
})->middleware('auth');
Route::get('/indonesia/{template}/download', [\App\Http\Controllers\CvsUserTemplateController::class, 'downloadTemplate']);
//Route::get('/indonesia/{template}', [\App\Http\Controllers\CvsUserTemplateController::class, 'showTemplate']);
Route::delete('/cvs-users/{id}', [\App\Http\Controllers\CvsUsersController::class, 'destroy'])->name('cvs-users.destroy');
Route::get('/cv-user/{template}', [\App\Http\Controllers\CvsUserTemplateController::class, 'showTemplate']);
Route::get('/cv-user/{template}/download', [\App\Http\Controllers\CvsUserTemplateController::class, 'downloadTemplate']);