<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SalaryRequest;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SalaryRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'before_salary' => 1200,
            'after_salary' => fake()->numberBetween(1250, 1400),
            'reason' => fake('ja_JP')->realText(30),
            'status' => 'pending',
            'approved_by' => fake()->numberBetween(1, 3),
        ];
    }
}
