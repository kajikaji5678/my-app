<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'ECサイト構築',
            '社内業務管理システム',
            '予約管理アプリ'
        ];

        foreach ($names as $name) {
            Project::create([
                'projects_name' => $name,
                'projects_key' => fake()->name()
            ]);
        }
    }
}
