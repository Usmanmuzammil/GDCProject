<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{

    protected $guards = 'faculties';
    protected $table = 'teachers';

    protected $fillable = [
        'name',
        'email',
        'password',
        'desgination',
        'description',
        'phone',
        'image',
        'facebook_link',
        'youtube_link',
        'twitter_link',
        'status'
    ];
}
