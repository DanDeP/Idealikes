<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|https://laracasts.com/series/laravel-5-fundamentals/episodes/3
*/

Route::get('/', function () {
    return view('welcome');
});

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//Manual way to do routes, users.
Route::get('about','PagesController@about');
Route::get('users','UsersController@index');
/*Route::get('contact','PagesController@contact');
Route::get('users/create','UsersController@create');
Route::get('users/{id}','UsersController@show');
Route::post('users','UsersController@store');*/

Route::resource('users','UsersController');

//Idea routes
/*Route::get('ideas','IdeasController@index');
Route::get('ideas/create','IdeasController@create');
Route::get('ideas/{id}','IdeasController@show');
Route::post('ideas','IdeasController@store');*/

Route::resource('ideas','IdeasController');

Route::get('rate','LikesController@index');
Route::post('rate','LikesController@rated');
//Route::get('likes','LikesController@index');
//Route::post('likes','LikesController@rated');
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
// route to show the login form
//Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
//Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::get('tags/{tags}', 'TagsController@show');