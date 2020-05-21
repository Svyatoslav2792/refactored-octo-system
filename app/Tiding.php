<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiding extends Model
{
    protected $fillable=[
        'title',
        'text',
        'image',
        'active',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    //
}
