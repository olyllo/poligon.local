<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $fillable = [
        'id', 'user_id', 'user_for_name', 'user_for_email', 'task_done','task_name','task_text'
    ];

}
