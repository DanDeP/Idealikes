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


use Illuminate\Support\Facades\Redirect;


Route::get('/', function () {
    if (Auth::check()){
        return redirect('myIdeas');
    }else{
        return view('welcome');
    }

});


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


Route::group(array('before' => 'auth'), function()
{
//Manual way to do routes, users.
   // Route::get('about','PagesController@about');
   // Route::get('users','UsersController@index');
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

    Route::get('tags/{tags}', 'TagsController@show');

    Route::get('likes', 'LikesController@myLikes'); //returns your likes page
    Route::get('likes/{id}','LikesController@likeContent'); //returns likes page with content
    Route::post('likes','CommentsController@addComments'); //submits comment

    Route::get('unlike/{id}', 'LikesController@unlike');

    Route::get('myIdeas', 'MyIdeasController@index');
    Route::get('myIdeas/{id}', 'MyIdeasController@ideaContent');
    Route::post('myIdeas','CommentsController@addOwnComments');
    Route::get('myIdeas/delete/{id}','MyIdeasController@delete');

    Route::get('profile', 'MyProfileController@index');
    Route::get('profile/edit/{id}','MyProfileController@edit');
    Route::get('profile/{id}','MyProfileController@viewProfile');
    Route::post('profile/edit/{id}','MyProfileController@addBio');
    Route::post('profile', 'MyProfileController@addBio');

    Route::group(['prefix' => 'messages'], function () {
        Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
        Route::get('create/{id}', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
        Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
        Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
        Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
    });
});

// AUTH FILTER
Route::filter('auth', function()
{
    if (Auth::guest()) return Redirect::to('/');
});
