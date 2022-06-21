<?php

namespace Admins\Models;

use Admins\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsFeed extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'news';
    protected $fillable = [
        'name',
         'details',
         'deleted_at',
         'created_by'
    ];

    public function deletedBy()
    {
        return $this->belongsTo(Admin::class, 'deleted_by');
    }

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
