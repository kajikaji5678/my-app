<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StartAndEndTime;
use App\Models\User;

class StartAndEndTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ユーザー10人
        $users = User::all();
        // 各ユーザーに勤怠5件
        foreach($users as $user) {
            StartAndEndTime::factory()->count(5)->create(['user_id' => $user->id]);
        } 
    }
}
