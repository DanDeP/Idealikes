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

//Manual way to do routes, users.
/*Route::get('contact','PagesController@contact');
Route::get('about','PagesController@about');
Route::get('users','UsersController@index');
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

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
// route to show the login form
//Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
//Route::post('login', array('uses' => 'HomeController@doLogin'));
