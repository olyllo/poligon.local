<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = [
        'id', 'parent_id', 'slug', 'title', 'description'
    ];
}
