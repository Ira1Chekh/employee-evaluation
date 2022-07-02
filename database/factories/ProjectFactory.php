<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition()
    {
        return [
           'name' => 'Project '.fake()->word,
           'start_date' => fake()->date,
           'importance' => fake()->numberBetween(1, 3),
       ];
    }

    public function withUsers($count = 1): self
    {
        return $this->afterCreating(fn (Project $project) => $project->users()->attach(
            User::query()->employee()->inRandomOrder()->take($count)->get()
        ));
    }
}
