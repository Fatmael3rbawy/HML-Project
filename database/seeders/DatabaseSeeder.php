<?php

namespace Database\Seeders;

use Database\Admins\Seeders\AdminSeeder;
use Database\Admins\Seeders\NewsSeeder;
use Database\Suppliers\Seeders\SupplierSeeder;
use Database\Users\Seeders\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminSeeder::class,
            SupplierSeeder::class,
            UserSeeder::class,
            NewsSeeder::class
        ]);
    }
}
