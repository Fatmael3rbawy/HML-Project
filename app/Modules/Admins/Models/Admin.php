<?php

namespace Admins\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;

class Admin extends Authenticable
{
    use HasFactory;
    protected $table = 'admins';

    public function categories()
    {
       return $this->hasMany(Category::class);
    }
    public function deleteNews()
    {
        return $this->hasMany(NewsFeed::class, 'deleted_by')->withTrashed();
    }

    public function createNews()
    {
        return $this->hasMany(NewsFeed::class, 'created_by')->withTrashed();
    }
}
