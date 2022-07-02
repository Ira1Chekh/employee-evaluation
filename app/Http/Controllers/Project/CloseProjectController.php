<?php

namespace App\Http\Controllers\Project;

use App\Enums\ProjectStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Project;

class CloseProjectController extends Controller
{
    public function __invoke(Project $project)
    {
        $this->authorize('updateStatus', [$project]);
        $project->update(['status' => ProjectStatusEnum::closed()]);

        return redirect()->route('projects.index')
            ->with('message', 'Your project has been updated!');
    }
}
