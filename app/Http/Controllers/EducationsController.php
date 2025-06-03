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
                'institution'  => $item['educationInstitution'] ?? null,
                'degree'       => $item['educationDegree'] ?? null,
                'start_date'   => $item['educationStartDate'] ?? null,
                'end_date'     => ($item['isPresent'] ?? false) ? null : ($item['educationEndDate'] ?? null),
                'description'  => $item['educationDescription'] ?? null,
            ]);
        }
        return response()->json(['success' => true]);
    }
}
