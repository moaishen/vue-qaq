<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function getById($id)
    {
        $limit = config('website.questions.limit');
        $questions = Question::where('status', 1)->orderBy('updated_at', 'desc')->with('author')->paginate($limit);
        return $questions;
    }
}
