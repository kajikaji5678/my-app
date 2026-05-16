<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $baseDate = Carbon::create(2026, 5, 13);
        $startHour = rand(9, 14);
        $start = (clone $baseDate)->setTime($startHour, 0);
        $duration = rand(2, 5);
        $end = (clone $start)->addHours($duration);
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'start_time' => $start,
            'end_time' => $end,
            'title' => "あああ",
            'date' => Carbon::create(2026, 5, rand(16, 18)),
        ];
    }
}
