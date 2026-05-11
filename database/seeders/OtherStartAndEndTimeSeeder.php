<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StartAndEndTime;
use App\Models\User;

class OtherStartAndEndTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StartAndEndTime::factory()->count(5)->create(['user_id' => $user->id]);
    }
}
