<?php

namespace App\Models;

use App\Enums\UserRoleEnum;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'role',
        'start_date',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'start_date' => 'date'
    ];

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function ratings(): HasManyThrough
    {
        return $this->hasManyThrough(
            Rating::class,
            ProjectUser::class,
            'user_id',
            'project_user_id'
        );
    }

    public function projectUsers()
    {
        return $this->hasMany(ProjectUser::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function scopeEmployee(Builder $query)
    {
        return $query->where('role', UserRoleEnum::employee());
    }

    public function isAdmin()
    {
        return $this->role == UserRoleEnum::admin();
    }
}
