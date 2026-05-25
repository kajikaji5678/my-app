<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Milestone;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\Type;

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
    public function definition(): array
    {
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
            'project_id' => Project::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'type_id' => Type::inRandomOrder()->first()->id,
            'milestone_id' => Milestone::inRandomOrder()->first()->id
        ];
    }
}
