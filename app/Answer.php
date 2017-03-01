<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['user_id', 'question_id', 'content'];

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id')->select(['name', 'id']);
    }

    public function question()
    {
        return $this->belongsTo('App\Question', 'question_id')->select(['id', 'title']);
    }
}
