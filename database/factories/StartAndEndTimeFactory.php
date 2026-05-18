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
        $date = Carbon::now()->subDays(rand(1, 30));
        $start = (clone $date)->setTime(rand(9, 11), rand(0,59));
        $end = (clone $start)->addHours(rand(8, 10));
        return [
            'start_time' => $start,
            'end_time' => $end,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
