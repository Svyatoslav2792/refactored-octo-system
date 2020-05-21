<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=[
        'user_id',
        'fio',
        'image',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
