<?php

namespace Database\Admins\Seeders;

use Admins\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function run()
    {
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make(12345678)
        ]);
    }

   
}
