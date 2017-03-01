<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function questions()
    {
        return $this->hasMany('App\Question', 'user_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer', 'user_id');
    }
}
