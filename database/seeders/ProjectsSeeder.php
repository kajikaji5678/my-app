<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Projects;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['業務A','業務B' ,'業務C' ,'業務D' ,'業務E' ];

        foreach($names as $name) {
            Projects::factory()->create([
                'name' => $name
            ]);
        }
    }
}
