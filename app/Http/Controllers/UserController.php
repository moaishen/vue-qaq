<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Utils\Utils;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|max:20',
            'password' => 'required|min:6'
        ]);
        if ($validator->fails()) {
            return Utils::err($validator->errors()->first());
        }
        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return Utils::suc('register success!');
        }
        return Utils::err('register failed!');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return Utils::err($validator->errors()->first());
        }
        if (!$user = User::where('name', $request->name)->first()) {
            return Utils::err('username not found, register first?');
        }
        if (!Hash::check($request->password, $user->password)) {
            return Utils::err('password incorrect!');
        }
        $request->session()->put('user_id', $user->id);
        return Utils::suc($user->id);
    }

    public function is_login()
    {
        return Utils::suc(session('user_id') ? session('user_id') : 0);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_id');
        return Utils::suc('logout success!');
    }

    public function questions($id)
    {
        $user = User::find($id);
        $questions = $user->questions()->orderBy('created_at', 'desc')->get();
        return $questions;
    }
}
