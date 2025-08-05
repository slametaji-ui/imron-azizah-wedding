<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin User',
            'email' => 'slametaji.info@gmail.com',
            'password' => Hash::make('Minimal8@'), // You can use any password
            'role' => 'administrator',
        ]);

        // Example of adding multiple users using Faker
        \App\Models\User::factory(10)->create(); // This assumes you have a User factory set up
    }
}
