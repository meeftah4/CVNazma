<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function storeFromSession(Request $request)
    {
        $cvsy_id = $request->input('cvsy_id');
        $proyek = session('proyek', []);
        foreach ($proyek as $item) {
            \App\Models\Project::create([
                'cvsy_id'     => $cvsy_id,
                'name'        => $item['projectName'] ?? null,
                'description' => $item['projectDescription'] ?? null,
                'link'        => $item['projectLink'] ?? null,
                'start_date'  => $item['projectStartDate'] ?? null,
                'end_date'    => $item['projectIsPresent'] ? null : ($item['projectEndDate'] ?? null),
            ]);
        }
        return response()->json(['success' => true]);
    }
}
