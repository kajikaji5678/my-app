<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            MyStartAndEndTimeSeeder::class,
            StartAndEndTimeSeeder::class,
            SalaryRequestSeeder::class,
            PtoRequestSeeder::class,
            // ここから新しいやつ
            ProjectSeeder::class,
            CategorySeeder::class,
            TypeSeeder::class,
            RoleSeeder::class,
            StatusSeeder::class,
            TaskSeeder::class,
            RoleLevelSeeder::class,
            RoleUserSeeder::class,
            // 8月25日久々にやる
            CommentSeeder::class
        ]);
    }
}
