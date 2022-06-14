<?php

namespace Users\Models;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable
{
    use HasApiTokens, HasFactory ;
    protected $table = 'users';
    
    
}
