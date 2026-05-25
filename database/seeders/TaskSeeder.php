<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory(100)->create();

        $roles = Role::all();

        foreach (Task::all() as $task) {
            $randomRoles = $roles->random(rand(1, 5));

            foreach($randomRoles as $role) {
                $task->roles()->attach($role->id, [
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
