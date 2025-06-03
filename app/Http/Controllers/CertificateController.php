<?php

namespace App\Http\Controllers;

use App\Models\certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function storeFromSession(Request $request)
    {
        $cvsy_id = $request->input('cvsy_id');
        $sertifikat = $request->input('data', []);
        foreach ($sertifikat as $item) {
            \App\Models\certificate::create([
                'cvsy_id'         => $cvsy_id,
                'certificate_name'=> $item['certificateName'] ?? null,
            ]);
        }
        return response()->json(['success' => true]);
    }
}
