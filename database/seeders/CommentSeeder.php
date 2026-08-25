<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $task = Task::first();
        $user = User::first();

        $task->comments()->create([
            'user_id' => $user->id,
            'body' => 'テストコメント'
        ]);
    }
}
