<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Schedule>
 */
class SchedulesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $baseDate = Carbon::create(2026, 5, 20);

        $startHour = rand(9, 14);
        $start = (clone $baseDate)->setTime($startHour, 0);
        $duration = rand(2, 5);
        $end = (clone $start)->addHours($duration);
        static $userId = 1;

        return [
            'user_id' => $userId++,
            'start_time' => $start,
            'end_time' => $end,
            'title' => 'あああ',
            'date' => $baseDate,
        ];
    }
}
