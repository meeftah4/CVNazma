<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/profile', function () {
    return view('pages.profile', [
        'content' => 'components.main-profil',
    ]);
});

Route::get('/profile/ats', function () {
    return view('pages.profile', [
        'content' => 'components.ats-profil',
    ]);
});

Route::get('/CvAts', function () {
    return view('pages.buatcv', [
    ]);
});
