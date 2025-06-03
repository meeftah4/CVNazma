<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\languages;

class LanguagesController extends Controller
{
    public function storeFromSession(Request $request)
    {
        $cvsy_id = $request->input('cvsy_id');
        $bahasa = $request->input('data', []);
        foreach ($bahasa as $item) {
            \App\Models\languages::create([
                'cvsy_id'      => $cvsy_id,
                'language_name'=> $item['languageName'] ?? null,
            ]);
        }
        return response()->json(['success' => true]);
    }
}
