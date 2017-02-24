<?php

namespace App\Http\Controllers;

use App\Utils\Utils;
use Illuminate\Http\Request;
use App\Question;
use Validator;

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
            'title' => 'required|max:200'
        ]);
        if ($validator->fails()) {
            return Utils::err($validator->errors()->first());
        }

        $question = Question::create(array_add($request->all(), 'user_id', Utils::userId()));
        if ($question->save()){
            return Utils::suc('add success!');
        }
        return Utils::err('add question failed!');
    }
}
