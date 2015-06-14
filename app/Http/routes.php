<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return redirect('/blog');
});

Route::get('blog', 'BlogController@index');
Route::get('blog/new', 'BlogController@newPost');
Route::get('blog/{id}', 'BlogController@showPost');
Route::get('blog/{post}/edit', 'BlogController@editPost');
Route::get('blog/{post}/delete', 'BlogController@deletePost');

Route::post('blog/create', ['as' => 'post.create', 'uses' => 'BlogController@createPost']);
Route::post('blog/{post}/update', ['as' => 'post.update', 'uses' => 'BlogController@updatePost']);

Route::controllers([
    'auth' => 'Auth\AuthController'
]);