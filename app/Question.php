<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected  $fillable = ['title', 'description', 'user_id'];

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id')->select(['name', 'id']);
    }
    public function answers()
    {
        return $this->hasMany('App\Answer', 'question_id');
    }
}
