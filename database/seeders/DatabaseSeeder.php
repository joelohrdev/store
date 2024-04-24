<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'email@email.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);

        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
        ]);

    }
}
