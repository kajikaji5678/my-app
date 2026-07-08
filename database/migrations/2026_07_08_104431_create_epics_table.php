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
        Schema::create('epics', function (Blueprint $table) {
            $table->id();
            $table->string('epic_name');
            $table->timestamps();
            $table->foreignId('project_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('type_id')->constrained();
            $table->foreignId('responsible_user_id')->nullable()->constrained('users');
            $table->string('priority')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epics');
    }
};
