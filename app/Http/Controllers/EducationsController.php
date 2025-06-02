<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\educations;

class EducationsController extends Controller
{
    public function storeFromSession(Request $request)
    {
        $cvsy_id = $request->input('cvsy_id');
        $pendidikan = session('pendidikan', []);
        foreach ($pendidikan as $item) {
            \App\Models\educations::create([
                'cvsy_id'      => $cvsy_id,
                'school_name'  => $item['schoolName'] ?? null,
                'degree'       => $item['degree'] ?? null,
                'major'        => $item['major'] ?? null,
                'start_date'   => $item['startDate'] ?? null,
                'end_date'     => $item['isPresent'] ? null : ($item['endDate'] ?? null),
                'description'  => $item['description'] ?? null,
            ]);
        }
        return response()->json(['success' => true]);
    }
}
