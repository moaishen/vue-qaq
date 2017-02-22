<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    public function questions()
    {
        return $this->hasMany('App\question', 'user_id');
    }
}
