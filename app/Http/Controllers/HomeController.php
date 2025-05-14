<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class HomeController extends Controller
{
    public function index()
    {
        $faqs = Faq::all(); // Ambil semua data FAQ dari database
        return view('pages.home', compact('faqs')); // Kirim data FAQ ke view
    }
}