<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    public function definition()
    {
        return [
            'project_user_id' => ProjectUser::query()->inRandomOrder()->firstOrFail(),
            'correctness' => fake()->numberBetween(1, 10),
            'initiative' => fake()->numberBetween(1, 10),
            'comment' => fake()->text,
        ];
    }
}
