<?php

namespace App\Http\Controllers\Project;

use App\Enums\ProjectImportanceEnum;
use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Project::class, 'project');
    }

    public function index()
    {
        return view('project.index')
            ->with(
                'projects',
                ProjectResource::collection(
                    Project::query()
                        ->orderByDesc('created_at')
                        ->paginate(10)
                )
            );
    }

    public function show(Project $project)
    {
        return view('project.show')
            ->with(
                'project',
                ProjectResource::make($project->load('projectUsers.user', 'projectUsers.rating'))
            );
    }

    public function create()
    {
        return view('project.create')
            ->with('importance', ProjectImportanceEnum::toArray())
            ->with(
                'employees',
                User::query()
                ->where('role', UserRoleEnum::employee())
                ->get(['first_name', 'last_name', 'id'])
            );
    }

    public function store(ProjectRequest $request)
    {
        $project = Project::query()->create($request->validated());
        $project->users()->attach($request->get('users'));

        return redirect()->route('projects.index')
            ->with('message', 'Your project has been added!');
    }

    public function edit(Project $project)
    {
        return view('project.edit')
            ->with('project', $project)
            ->with('importance', ProjectImportanceEnum::toArray())
            ->with(
                'employees',
                User::query()
                ->where('role', UserRoleEnum::employee())
                ->get(['first_name', 'last_name', 'id'])
            );
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        $project->users()->sync($request->get('users'));

        return redirect()->route('projects.index')
            ->with('message', 'Your project has been updated!');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
            ->with('message', 'Your project has been deleted!');
    }
}
