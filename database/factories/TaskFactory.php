<?php

namespace Database\Factories;

use App\Models\KanbanList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lists = KanbanList::all();

        return [
            'title' => fake()->word(),
            'description' => fake()->text(),
            'list_id' => fake()->numberBetween(1, $lists->count())
        ];
    }
}
