<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StartAndEndTime>
 */
class StartAndEndTimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = Carbon::now()->subHours(rand(1, 8));
        $end = (clone $start)->addHours(rand(1, 8));
        return [
            'user_id' => User::factory(),
            'start_time' => $start,
            'end_time' => $end,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
