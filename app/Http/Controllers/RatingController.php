<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingRequest;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Rating;
use Illuminate\Support\Arr;

class RatingController extends Controller
{
    public function create(Project $project)
    {
        return view('rating.create')
            ->with('project', $project)
            ->with(
                'employees',
                $project->users()
                ->get(['first_name', 'last_name', 'users.id'])
            );
    }

    public function store(RatingRequest $request, Project $project)
    {
        $this->authorize('create', [Rating::class, $project]);
        $rating = Rating::query()->make(Arr::except($request->validated(), ['user_id']));
        $projectUser = ProjectUser::query()
            ->where('project_id', $project->id)
            ->where('user_id', $request->get('user_id'))
            ->firstOrFail();
        $rating->projectUser()->associate($projectUser->id);
        $rating->save();

        return redirect()->route('projects.show', [$project->id])
            ->with('message', 'Rating has been added!');
    }
}
