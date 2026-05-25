<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            '未対応',
            '処理中',
            '承認待ち',
            '完了'
        ];

        foreach ($types as $type) {
            Type::create([
                'type_name' => $type,
                'projects_id' => Project::inRandomOrder()->first()->id
            ]);
        }
    }
}
