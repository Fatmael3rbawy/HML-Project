<?php

namespace Suppliers\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;

class Supplier extends Authenticable
{
    use HasFactory;
    protected $table = 'suppliers';

    public function products()
    {
       return $this->hasMany(Product::class);
    }
}
