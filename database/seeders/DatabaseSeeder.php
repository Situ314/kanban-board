<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Board;
use App\Models\Task;
use App\Models\KanbanList;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@kanban.com',
             'password' => 'admin'
         ]);

        \App\Models\User::factory()->create([
            'name' => 'user1',
            'email' => 'user1@kanban.com',
            'password' => 'user123'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'user2',
            'email' => 'user2@example.com',
            'password' => 'user234'
        ]);

        Board::factory(3)->create();
        KanbanList::factory(10)->create();
        Task::factory(10)->create();
    }
}
