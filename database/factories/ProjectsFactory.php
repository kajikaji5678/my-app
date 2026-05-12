<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class ProjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = [
            '業務A',
            '業務B',
            '業務C',
            '業務D',
            '業務E',
        ];

        return [
            'name' => $this->faker->randomElement($names),
            'deadline' => now()->addMonth()->addDays(rand(-5, 5)),
        ];
    }
}
