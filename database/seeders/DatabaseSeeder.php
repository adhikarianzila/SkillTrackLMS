<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);

        // STUDENT USER
        User::create([
            'name' => 'Student User',
            'email' => 'student@test.com',
            'password' => bcrypt('12345'),
            'role' => 'student',
        ]);
        Course::create([
            'title' => 'Laravel Basics',
        ]);
    }
}
