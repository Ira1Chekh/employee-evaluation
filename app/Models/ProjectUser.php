<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectUser extends Pivot
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rating()
    {
        return $this->hasOne(Rating::class, 'project_user_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
