<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = 'user_detail';

    protected $fillable = [
        'user_id', 'date_birth', 'address', 'gender'
    ];

}
