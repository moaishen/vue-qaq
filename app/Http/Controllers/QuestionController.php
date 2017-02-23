<?php

namespace App\Http\Controllers;

use App\Utils\Utils;
use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    public function getQuestions()
    {
        $limit = config('website.questions.limit');
        $questions = Question::where('status', 1)->orderBy('updated_at', 'desc')->with('author')->paginate($limit);
        return $questions;
    }

    public function getById($id)
    {
        $question = Question::with('author')->find($id);
        if ($question) {
            return $question;
        }
        return Utils::err('no such question here!');
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|max:20',
            'password' => 'required|min:6'
        ]);
        if ($validator->fails()) {
            return Utils::err($validator->errors()->first());
        }

    }

    public function test()
    {
        $question = Question::find(1);
        return $question->author;
    }
}
