<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PtoRequest>
 */
class PtoRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = Carbon::parse(fake()->dateTimeBetween('-1 month', 'now'));
        $end = (clone $start)->addDays(fake()->numberBetween(1,3));
        return [
            'user_id' => 1,
            'start_date' => $start,
            'end_date' => $end,
            'days' => $start->diffInDays($end) + 1,
            'status' => 'pending',
        ];
    }
}
