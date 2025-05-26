<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    public function showTemplates()
    {
        $templateList = [
            [
                'key' => 'basic',
                'name' => 'ATS Friendly',
                'label' => 'Basic'
            ],
            [
                'key' => 'template1',
                'name' => 'Template 1',
                'label' => 'Modern Blue'
            ],
            [
                'key' => 'template2',
                'name' => 'Template 2',
                'label' => 'Minimalist'
            ],
            [
                'key' => 'template3',
                'name' => 'Template 3',
                'label' => 'Professional'
            ],
            [
                'key' => 'template4',
                'name' => 'Template 4',
                'label' => 'Sidebar'
            ],
            [
                'key' => 'template5',
                'name' => 'Template 5',
                'label' => 'Elegant'
            ],
        ];
        return view('components.templates-cv', compact('templateList'));
    }
}
