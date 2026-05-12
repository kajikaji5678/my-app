<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 中間テーブルなのでモデルなしでシーダーを書く
        // 必然的にファクトリーは使えなくなる
        // なのでSQLほぼ直書きになる

        $users = DB::table('users')->pluck('id');
        $projects = DB::table('projects')->pluck('id');

        foreach ($users as $userId) {
            foreach ($projects->random(2) as $projectsId) {
                DB::table('project_user')->insert([
                    'user_id' => $userId,
                    'project_id' => $projectsId,
                ]);
            }
        }
    }
}
