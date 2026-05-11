<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SalaryRequest;
use App\Models\User;

class SalaryRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach($users as $user) {
            SalaryRequest::factory()->count(1)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
