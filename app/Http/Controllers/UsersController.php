<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index()
    {
        return view('user.index')
            ->with(
                'users',
                UserResource::collection(
                    User::query()
                        ->employee()
                        ->orderByDesc('created_at')
                        ->paginate(10)
                )
            );
    }

    public function show(User $user)
    {
        return view('user.show')
            ->with(
                'user',
                UserResource::make(
                    $user->load('ratings.projectUser.project')
                        ->loadAvg('ratings', 'initiative')
                        ->loadAvg('ratings', 'correctness')
                )
            );
    }
}
