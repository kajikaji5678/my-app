<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Role;
use App\Models\RoleLevel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    //* attach()について
    //* 第1引数が関連先ID（今いる側の反対のID）
    //* 第2引数が中間テーブルの追加カラム
    public function run(): void
    {
        $projects = Project::all();

        foreach($projects as $project) {
            $users = User::all();
            $roles = Role::all();
            $levels = RoleLevel::where('project_id', $project->id)->get();

            foreach($users as $user) {
                $randomRoles = $roles->random(rand(1, 3));

                foreach ($randomRoles as $role) {
                    $user->roles()->attach($role->id, [
                        'role_level_id' => $levels->random()->id,
                    ]);
                }
            }
        }
    }
}
