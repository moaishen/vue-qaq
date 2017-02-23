<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    public function getQuestions() {
        $limit = config('website.questions.limit');
        $questions = Question::where('status', 1)->with('author')->paginate($limit);
        return $questions;
    }

    public function test()
    {
        $question = Question::find(1);
        return $question->author;
    }
}
