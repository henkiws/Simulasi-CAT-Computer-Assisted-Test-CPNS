<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{   
    use SoftDeletes;
    protected $table = 'options';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'question_id', 'choise', 'answer', 'istext'
    ];

}
