<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

#Custom Request
use App\Http\Requests\ProjectRequest;

#Models
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::all();
        return view('admin.index', compact('projects'));
    }


    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.create', compact('types','technologies'));
    }

    public function store(ProjectRequest $request)
    {
        $data = $request->validated();

        $newProject = new Project();
        $newProject->name = $data['name'];
        $newProject->description = $data['description'];
        $newProject->slug = Project::assignSlug($data['name']);

        $validSlug = Project::where('slug', Project::assignSlug($data['name']))->where('id', '<>', $newProject->id)->first();

        if ($validSlug) {
            return back()->withInput()->withErrors(['name' => 'ERRORE: Slug già utilizzato.']);
        }

        $newProject->type_id = $data['type'];

        $path = Storage::put('user_uploads', $data['thumb']);
        $newProject->thumb = $path;


        $newProject->save();

        if($request->has('technologies')){
            $newProject->technologies()->attach($request->technologies);
        }


     
        return redirect()->route('admin.projects.index')->with('retMsg', 'Progetto creato correttamente!');
    }


    public function show(Project $project)
    {
        return view('admin.show', compact('project'));
    }


    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.edit', compact('project','types','technologies'));
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->thumb = $data['thumb'];
        $project->slug = Project::assignSlug($data['name']);
 

        $validSlug = Project::where('slug', Project::assignSlug($data['name']))->where('id', '<>', $project->id)->first();

        if ($validSlug) {
            return back()->withInput()->withErrors(['name' => 'ERRORE: Slug già utilizzato.']);
        }

   


        if($request->hasFile('thumb')){



            if($project->thumb){
                Storage::delete($project->thumb);
            }

            $path = Storage::put('user_uploads', $data['thumb']);
            $project->thumb = $path;

        }

     
        $project->type_id = $data['type'];
        $project->save();

        if($request->has('technologies')){
            $project->technologies()->sync($request->technologies);
        }

        return redirect()->route('admin.projects.show', $project->slug)->with('retMsg', 'Progetto modificato correttamente!');
    }


    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if($project->thumb){
            Storage::delete($project->thumb);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('retMsg', 'Elemento eliminato con successo');
    }
}
