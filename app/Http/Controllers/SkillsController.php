<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\skills;

class SkillsController extends Controller
{
    public function storeFromSession(Request $request)
    {
        $cvsy_id = $request->input('cvsy_id');
        $keahlian = session('keahlian', []);
        foreach ($keahlian as $item) {
            \App\Models\skills::create([
                'cvsy_id'    => $cvsy_id,
                'skill_name' => $item['skillName'] ?? null,
            ]);
        }
        return response()->json(['success' => true]);
    }
}
