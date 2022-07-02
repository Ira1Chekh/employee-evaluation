<?php

namespace App\Models;

use App\Enums\ProjectStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'importance',
        'status'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function projectUsers()
    {
        return $this->hasMany(ProjectUser::class);
    }

    public function ratings(): HasManyThrough
    {
        return $this->hasManyThrough(
            Rating::class,
            ProjectUser::class,
            'project_id',
            'project_user_id'
        );
    }

    public function isOpen(): bool
    {
        return $this->status == ProjectStatusEnum::open();
    }

    public function isClosed(): bool
    {
        return $this->status == ProjectStatusEnum::closed();
    }
}
