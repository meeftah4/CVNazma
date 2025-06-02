<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\work_experiences;

class WorkExperiencesController extends Controller
{
    public function storeFromSession(Request $request)
    {
        $cvsy_id = $request->input('cvsy_id');
        $pengalamankerja = session('pengalamankerja', []);
        foreach ($pengalamankerja as $item) {
            \App\Models\work_experiences::create([
                'cvsy_id'      => $cvsy_id,
                'company_name' => $item['companyName'] ?? null,
                'role'         => $item['jobPosition'] ?? null,
                'location'     => $item['jobCity'] ?? null,
                'start_date'   => $item['jobStartDate'] ?? null,
                'end_date'     => $item['jobIsPresent'] ? null : ($item['jobEndDate'] ?? null),
                'description'  => is_array($item['jobDescription']) ? implode("\n", $item['jobDescription']) : ($item['jobDescription'] ?? null),
            ]);
        }
        return response()->json(['success' => true]);
    }
}
