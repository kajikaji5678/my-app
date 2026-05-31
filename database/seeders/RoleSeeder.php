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
    }
}
