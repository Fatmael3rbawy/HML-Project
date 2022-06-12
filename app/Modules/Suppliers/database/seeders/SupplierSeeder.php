<?php

namespace Database\Suppliers\Seeders;

use Suppliers\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SupplierSeeder extends Seeder
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function run()
    {
        // Supplier::factory(5)->create();
        Supplier::create([
            'name' => 'Supplier',
            'email' => 'supplier@example.com',
            'password' => Hash::make(12345678),
            'admin_id' => 2
        ]);
    }

   
}
