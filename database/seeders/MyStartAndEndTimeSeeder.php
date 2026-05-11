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
            'name' => '福田',
            'email' => 'aaa@gmail.com',
            'password' => Hash::make('kajikaji1'),
            'admin' => 1,
        ]);

        StartAndEndTime::factory()->count(5)->create(['user_id' => $user->id]);
    }
}
