<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'name',
        'email',
        'desgination',
        'image',
        'facebook_link',
        'youtube_link',
        'twitter_link',
        'status'
    ];
}
