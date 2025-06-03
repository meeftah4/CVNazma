<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hobbies;

class HobbiesController extends Controller
{
    public function storeFromSession(Request $request)
    {
        $cvsy_id = $request->input('cvsy_id');
        $hobi = session('hobi', []);
        foreach ($hobi as $item) {
            \App\Models\hobbies::create([
                'cvsy_id' => $cvsy_id,
                'hobby'   => $item['hobbyName'] ?? null,
            ]);
        }
        return response()->json(['success' => true]);
    }
}
