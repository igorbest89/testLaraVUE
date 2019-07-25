<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';
    public $timestamps = false;
    //
    protected $fillable = [
        'task_text'
    ];
}
