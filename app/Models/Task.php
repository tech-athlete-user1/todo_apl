<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'detail',
        'deadline',
        'finish_flg',
        'finish_date',
    ];

    protected $casts = [
        'deadline' => 'datetime',
        'finish_date' => 'datetime',
    ];
}
