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
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->change();
            $table->foreignId('type_id')->nullable()->change();
            $table->integer('real_time')->nullable()->change();
            $table->integer('estimated_time')->nullable()->change();
            $table->string('priority')->nullable()->change();
            $table->foreignId('responsible_user_id')->nullable()->change();
            $table->dateTime('deadline_at')->nullable()->change();
            $table->string('schedule')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        });
    }
};
