<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    protected $table = 'questions';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'question', 'question_type', 'question_group', 'istext', 'information', 'pembahasan'
    ];

    function option(){
        return $this->hasMany(Option::class);
    }

}
