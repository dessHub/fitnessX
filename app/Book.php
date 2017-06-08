<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Book extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'session_id', 'user_name', 'status','amount','session','trainer','title'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
