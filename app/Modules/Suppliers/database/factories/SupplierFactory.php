<?php

namespace Database\Suppliers\Factories;

use Admins\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' =>  Hash::make(12345678), // password
            'admin_id' => Admin::all()->random()->id,
        ];
    }

   
}
