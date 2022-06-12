<?php

namespace Database\Users\Seeders;

use Users\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function run()
    {
        User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make(12345678)
        ]);
    }

   
}
