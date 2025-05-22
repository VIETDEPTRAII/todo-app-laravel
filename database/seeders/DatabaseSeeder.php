<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create some sample tasks for the test user
        Task::create([
            'user_id' => $user->id,
            'title' => 'Complete project documentation',
            'description' => 'Write comprehensive documentation for the Todo API project',
            'completed' => false,
        ]);

        Task::create([
            'user_id' => $user->id,
            'title' => 'Fix authentication bug',
            'description' => 'Resolve the issue with token expiration in the authentication system',
            'completed' => true,
        ]);

        Task::create([
            'user_id' => $user->id,
            'title' => 'Implement task filtering',
            'description' => 'Add the ability to filter tasks by completion status',
            'completed' => false,
        ]);
    }
}

