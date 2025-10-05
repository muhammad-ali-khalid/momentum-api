<?php

namespace Database\Factories;

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
        $dueDate = fake()->dateTimeBetween('-5 days', '+5 days')->format('Y-m-d H:i');

        // Determine status based on due date
        if ($dueDate < now()) {
            $status = fake()->randomElement(['completed', 'missed']);
        } elseif ($dueDate  >  now()->format('Y-m-d H:i')) {
            $status = 'active';
        } else {
            $status = 'active';
        }

        return [
            'user_id' => fake()->numberBetween(1, 10),
            'title' => fake()->realText(15),
            'description' => fake()->realText(35),
            'due_date' => $dueDate,
            'status' => $status,
        ];
    }
}
