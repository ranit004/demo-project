<?php

/*
|--------------------------------------------------------------------------
| Database\Seeders\DatabaseSeeder — Default data seeder
|--------------------------------------------------------------------------
| Seeds one admin and one standard user so the app is usable immediately
| after `php artisan migrate --seed`.
|
| Admin → admin@example.com / password   (role: admin)
| User  → user@example.com  / password   (role: user)
*/

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Use updateOrCreate so re-seeding does not create duplicates.
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'User',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );
    }
}
