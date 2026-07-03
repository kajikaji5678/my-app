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
use Carbon\Carbon;

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
        $number2 = rand(1, 100);

        $statusId = Status::where('project_id', $project->id)->inRandomOrder()->first()->id;

        if ($statusId !== 1) {
            $realTime = rand($number - 4, $number + 4) * 30;
            $estimatedTime = $number * 30;
        } else {
            $realTime = 0;
            $estimatedTime = 0;
        }

        if ($number2 <= 10) {
            $type = '高';
        } else {
            $type = '中';
        }

        $createdAt = fake()->dateTimeBetween('-30 days', 'now');
        $deadlineAt = Carbon::instance($createdAt)->addDays(rand(5, 14));
        if (($statusId % 4) === 0) {
            $completedAt = Carbon::instance($deadlineAt)->addDays(rand(-5, 2));
        } else {
            $completedAt = null;
        }

        $number3 = rand(1, 50);
        if ($number3 <= 44) {
            $schedule = '予定工数タスク';
        } else {
            $schedule = '追加工数タスク';
        }

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
            'status_id' => $statusId,
            'real_time' => $realTime,
            'estimated_time' => $estimatedTime,
            'priority' => $type,
            'responsible_user_id' => User::inRandomOrder()->first()->id,
            'added_at' => $createdAt,
            'deadline_at' => $deadlineAt,
            'completed_at' => $completedAt,
            'schedule' => $schedule,
        ];

    }
}
