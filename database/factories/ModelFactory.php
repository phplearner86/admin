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
/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->firstNAm,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(App\Category::class, function (Faker\Generator $faker) {
   
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
   
    return [
        'title' => rtrim($faker->sentence, '.'),
        'body' => $faker->paragraph,
        'user_id' => \App\User::all()->random()->id,
        'category_id' => \App\Category::all()->random()->id,
        					
    ];
});
