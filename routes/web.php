<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Middleware\Login;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function () {
    Route::get('register', ['uses' => 'UserController@register']);
    Route::get('login', ['uses' => 'UserController@login']);
    Route::get('islogin', ['uses' => 'UserController@is_login']);
    Route::get('logout', ['uses' => 'UserController@logout']);
});

Route::group(['prefix' => 'api', 'middleware' => Login::class], function () {
    Route::get('/test', function () {
        dd(config('website.questions.limit'));
    });
    Route::get('/questions', ['uses' => 'QuestionController@getQuestions']);
});

Route::get('/test', function () {
    dd(config('website.questions.limit'));
})->middleware(Login::class);

Route::get('/test1', 'QuestionController@test');
