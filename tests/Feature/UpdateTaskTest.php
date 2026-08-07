<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Status;
use App\Models\Task;
use Tests\TestCase;

class UpdateTaskTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_task_can_be_updated()
    {
        $category = Category::create(['category_name' => '開発']);
        $status = Status::create(['status_name' => 'ああああ']);
        $task = Task::factory()->create([
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);
        $newCategory = Category::create(['category_name' => 'いいい']);
        $newStatus = Status::create(['status_name' => 'うううう']);
        $response = $this->putJson("/api/tasks/{$task->id}", [
            'category_id' => $newCategory->id,
            'status_id' => $newStatus->id,
            'deadline_at' => '2028-01-21',
        ]);
        $response->assertStatus(200);
    }
}
