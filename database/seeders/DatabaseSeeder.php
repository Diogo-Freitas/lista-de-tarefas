<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create user test with tasks
        User::factory()->create(['name' => 'Usuário Teste', 'email' => 'usuario@exemplo.com'])->each(function ($user) {
            $user->tasks()->saveMany(Task::factory(100)->make());
        });

        // Create 9 users with tasks
        User::factory(9)->create()->each(function ($user) {
            $user->tasks()->saveMany(Task::factory(100)->make());
        });
    }
}
