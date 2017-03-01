<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker) {

    return [
        'user_id' => $faker->numberBetween(1, 10),
        'title' => $faker->city(),
        'description' => $faker->realText(200, 2)
    ];
});

$factory->define(App\Answer::class, function (Faker\Generator $faker) {

    return [
        'user_id' => $faker->numberBetween(1, 10),
        'question_id' => $faker->numberBetween(1, 50),
        'content' => $faker->realText(200, 1)
    ];
});
