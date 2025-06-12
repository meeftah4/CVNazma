<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transactions;
use App\Models\Cvs_Users;
use Illuminate\Support\Facades\Auth;

class CvCompleteController extends Controller
{
    public function show(Request $request)
    {
        $cvsy_id = $request->query('cvsy_id');
        $template = $request->query('template', 'basic');

        // Cek data CV
        $cv = Cvs_Users::find($cvsy_id);
        if (!$cv) {
            return redirect('/')->with('error', 'CV tidak ditemukan.');
        }

        // Cek apakah user yang login adalah pemilik CV
        if ($cv->user_id !== Auth::id()) {
            return redirect('/')->with('error', 'Akses ditolak. Anda bukan pemilik CV ini.');
        }

        // Cek transaksi settlement/capture
        $trx = transactions::where('cvsy_id', $cvsy_id)
            ->whereIn('transaction_status', ['settlement', 'capture'])
            ->first();

        if (!$trx) {
            return redirect('/')->with('error', 'Akses tidak diizinkan. Pembayaran belum selesai.');
        }

        // Jika lolos, tampilkan view
        return view('pages.cv-complete', [
            'template' => $template,
            'cvsy_id' => $cvsy_id,
        ]);
    }
}