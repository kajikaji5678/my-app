<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Project;
use App\Models\Status;
use App\Models\Task;
use App\Models\Type;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    // todo プロジェクトidの制限によるバグ修正
    // * AプロジェクトのタスクにBプロジェクトのカテゴリが混入するのを防ぐ

    public function definition(): array
    {
        $project = Project::inRandomOrder()->first();
        $categoryId = Category::where('project_id', $project->id)->inRandomOrder()->first()->id;
        $typeId = Type::where('projects_id', $project->id)->inRandomOrder()->first()->id;

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
            'status' => 'null',
            'project_id' => $project,
            'category_id' => $categoryId,
            'type_id' => $typeId,
            'status_id' => $statusId,
            'real_time' => $realTime,
            'estimated_time' => $estimatedTime,
            'priority' => $type,
            'responsible_user_id' => User::inRandomOrder()->first()->id,
            'added_at' => $createdAt,
            'deadline_at' => $deadlineAt,
            'completed_at' => $completedAt,
            'schedule' => $schedule,
            'task_name' => function () use ($categoryId, $typeId) {
                return match (true) {
                    in_array($categoryId, [1, 4, 7])
                    && in_array($typeId, [1, 5, 9]) => 'UI画面動作の確認',

                    in_array($categoryId, [2, 5, 8])
                    && in_array($typeId, [1, 5, 9]) => 'デザイン色合いの確認',

                    in_array($categoryId, [3, 6, 9])
                    && in_array($typeId, [1, 5, 9]) => 'コードレビュー',

                    in_array($categoryId, [1, 4, 7])
                    && in_array($typeId, [2, 6, 10]) => 'モーダルバグ修正',

                    in_array($categoryId, [2, 5, 8])
                    && in_array($typeId, [2, 6, 10]) => 'Figma色崩れバグ',

                    in_array($categoryId, [3, 6, 9])
                    && in_array($typeId, [2, 6, 10]) => 'リレーション崩れバグ',

                    in_array($categoryId, [1, 4, 7])
                    && in_array($typeId, [3, 7, 11]) => 'コンポーネント作成',

                    in_array($categoryId, [2, 5, 8])
                    && in_array($typeId, [3, 7, 11]) => 'PhotoShopレイアウト作成',

                    in_array($categoryId, [3, 6, 9])
                    && in_array($typeId, [3, 7, 11]) => 'API構築',

                    in_array($categoryId, [1, 4, 7])
                    && in_array($typeId, [4, 8, 12]) => 'ヘッダー修正要望',

                    in_array($categoryId, [2, 5, 8])
                    && in_array($typeId, [4, 8, 12]) => 'Figmaアカウント新規作成要望',

                    in_array($categoryId, [3, 6, 9])
                    && in_array($typeId, [4, 8, 12]) => 'プルリクエスト',

                    default => 'その他タスク',
                };
            },
        ];

    }
}
