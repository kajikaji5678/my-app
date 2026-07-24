<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task_name');
            $table->foreignId('project_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('type_id')->constrained();
            // * 6/12 ステータスカラーを持たせることを廃止
            $table->string('status');
            $table->timestamps();
            $table->text('description')->nullable();
            //* 7/24 親タスクidを追加
            $table->foreignId('parent_task_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
