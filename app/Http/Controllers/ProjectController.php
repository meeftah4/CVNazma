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
                'cvsy_id'      => $cvsy_id,
                'project_name' => $item['projectName'] ?? null,
                'role'         => $item['projectPosition'] ?? null,
                'start_date'   => $item['projectStartDate'] ?? null,
                'end_date'     => ($item['isPresent'] ?? false) ? null : ($item['projectEndDate'] ?? null),
                'description'  => $item['projectDescription'] ?? null,
            ]);
        }
        return response()->json(['success' => true]);
    }
}
