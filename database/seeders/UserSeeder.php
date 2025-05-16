<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
        ])->assignRole('admin');

        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'krani@example.com',
        ])->assignRole('krani');

        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'assistant@example.com',
        ])->assignRole('assistant');

        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'manager@example.com',
        ])->assignRole('manager');
    }
}
