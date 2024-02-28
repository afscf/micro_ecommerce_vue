<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserStreet;
use Database\Factories\UserStreetFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.it',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'user_street_id' => 0
        ]);

        UserStreet::factory(5)->has(
            User::factory()->count(1)
        )->create();

    }
}
