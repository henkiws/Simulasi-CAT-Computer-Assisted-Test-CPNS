<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'question', 'question_type', 'question_group', 'istext'
    ];

    function option(){
        return $this->hasMany(Option::class);
    }

}
