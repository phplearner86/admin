<?php


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::name('home')->get('/home', 'HomeController@index');

//Article
Route::resource('articles', 'ArticleController');
Route::name('articles.status')->patch('articles/status/{article}', 'ArticleController@changeStatus');

//Home
Route::name('admin.dashboard')->get('dashboard', 'HomeController@dashboard');


//User
Route::resource('users', 'UserController');
Route::name('email.verification')->get('register/verify-account/{token}', 'Auth\RegisterController@confirmEmail' );