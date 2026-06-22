<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Milestone;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\Type;
use App\Enums\TaskStatus;
use App\Models\Status;
use App\Models\User;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //todo プロジェクトidの制限によるバグ修正
    //* AプロジェクトのタスクにBプロジェクトのカテゴリが混入するのを防ぐ

    public function definition(): array
    {
        $project = Project::inRandomOrder()->first();

        $number = rand(5, 20);

        return [
            'task_name' => fake()->randomElement([
                'ログイン修正',
                '通知機能追加',
                'UI改善',
                'API修正',
                'バグ対応',
                '認証実装',
                '一覧画面作成',
                '検索機能追加',
                '権限修正',
                'レイアウト調整',
            ]),
            'status' => 'null',
            'project_id' => $project,
            'category_id' => Category::where('project_id', $project->id)->inRandomOrder()->first()->id,
            'type_id' => Type::where('projects_id', $project->id)->inRandomOrder()->first()->id,
            'milestone_id' => Milestone::where('project_id', $project->id)->inRandomOrder()->first()->id,
            'status_id' => Status::where('project_id', $project->id)->inRandomOrder()->first()->id,
            'estimated_time' => $number * 30,
            'real_time' => rand($number - 4, $number + 4) * 30,
        ];

    }
}
