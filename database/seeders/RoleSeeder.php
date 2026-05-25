<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'フロントエンジニア',
            'バックエンジニア',
            'デザイナー',
            'PM',
            'テスター'
        ];

        foreach ($roles as $role) {
            Role::create([
                'role_name' => $role,
            ]);
        }

        $users = User::all();

        foreach (Role::all() as $role) {
            // ロール1つにつき1~5名を選出している
            $randomUsers = $users->random(rand(1, 5));
            foreach ($randomUsers as $user) {
                // 中間テーブルにインサート
                $role->tasks()->attach($user->id, [
                    'role_level' => fake()->randomElement([
                        '見習い',
                        'ジュニア',
                        'ミドル',
                        'シニア'
                    ])
                ]);
            }
        }
    }
}
