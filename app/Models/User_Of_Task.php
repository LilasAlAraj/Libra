<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Of_Task extends Model
{
    use HasFactory;

    protected $table = 'users_of_tasks';
    protected $fillable = [
        'user_id', 'task_id',

    ];
}