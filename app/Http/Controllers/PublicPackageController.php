<?php

namespace App\Http\Controllers;

use App\Models\Package;

class PublicPackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('price')->get();
        return view('pages.paket', compact('packages'));
    }
}