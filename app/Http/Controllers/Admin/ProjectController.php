<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();

        $slug = Str::slug($request->title, '-');

        $validated['slug'] = $slug;

        Project::create($validated);

        return to_route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Project $post)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(UpdatePostRequest $request, Project $post)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Project $post)
    // {
    //     //
    // }
}
