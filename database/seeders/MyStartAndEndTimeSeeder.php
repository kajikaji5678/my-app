<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\StartAndEndTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class MyStartAndEndTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'id' => 1,
            'name' => '福田',
            'email' => 'aaa@gmail.com',
            'password' => Hash::make('kajikaji1'),
            'role' => 1,
        ]);

        for ($i = 1; $i <= 5; $i++) {
            $start = Carbon::create(2026, 3, $i, 9, 0, 9);
            $end = (clone $start)->addHours(8);

            StartAndEndTime::create([
                'user_id' => $user->id,
                'start_time' => $start,
                'end_time' => $end,
                'status' => 2,
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            $start = Carbon::create(2026, 4, $i, 9, 0, 9);
            $end = (clone $start)->addHours(8);

            StartAndEndTime::create([
                'user_id' => $user->id,
                'start_time' => $start,
                'end_time' => $end,
                'status' => 2,
            ]);
        }
    }
}
