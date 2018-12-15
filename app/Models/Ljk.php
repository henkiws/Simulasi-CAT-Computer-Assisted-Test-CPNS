<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ljk extends Model
{
    protected $table = 'ljk';

    protected $fillable = [
        'user_id', 'skor_twk', 'skor_tiu', 'skor_tkp', 'skor_total', 'status', 'keterangan', 'finish_at'
    ];

    public function user(){
        return $this->belongsto(User::class);
    }
}
