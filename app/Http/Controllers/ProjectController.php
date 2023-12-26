<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(3);
        return view("project.index", ["projects" => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view("project.form", ["employees" => $employees]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:100',
            'description' => 'required|max:400',
            'employees' => 'sometimes|array'
        ]);

        $project = Project::create($validatedData);

        if ($request->has('employees')) {
            $project->employees()->attach($request->employees);
        }

        return redirect()->route('project.index');
    }

    public function show(Project $project)
    {
        return view("project.show", ["project" => $project]);
    }

    public function edit(Project $project)
    {
        $employees = Employee::all();
        return view("project.form", ["employees" => $employees, "project" => $project]);
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required|max:1000',
            'employees' => 'sometimes|array'
        ]);

        $project->update($validatedData);

        if ($request->has('employees')) {
            $project->employees()->sync($request->employees);
        }

        return redirect()->route('project.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index');
    }
}
