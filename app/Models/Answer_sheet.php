<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer_sheet extends Model
{
    protected $table = 'answer_sheet';
    public $timestamps = false;

    protected $fillable = [
        'ljk_id', 'question_id', 'question_group', 'option_id', 'answer_id', 'value'
    ];

    function question(){
        return $this->hasOne(Question::class,'id','question_id');
    }

    function option(){
        return $this->belongsTo(Option::class);
    }

    function answer(){
        return $this->belongsTo(Option::class,'answer_id','id');
    }

}
