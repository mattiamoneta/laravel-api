<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

#Model

use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $projects = Project::all();
        return view('admin.types', compact('types', 'projects'));
    }


}
