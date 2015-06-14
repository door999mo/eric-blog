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

Route::get('blog', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'BlogController@index',
    'roles' => ['user']
]);

Route::get('blog/new', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'BlogController@newPost',
    'roles' => ['']
]);


Route::get('blog/{id}', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'BlogController@showPost',
    'roles' => ['user']
]);


Route::get('blog/{post}/edit', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'BlogController@editPost',
    'roles' => ['']
]);

Route::get('blog/{post}/delete', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'BlogController@deletePost',
    'roles' => ['']
]);

Route::post('blog/create', [
    'middleware' => ['auth', 'roles'],
    'as' => 'post.create',
    'uses' => 'BlogController@createPost',
    'roles' => ['']
]);

Route::post('blog/{post}/update', [
    'middleware' => ['auth', 'roles'],
    'as' => 'post.update',
    'uses' => 'BlogController@updatePost',
    'roles' => ['']
]);

Route::controllers([
    'auth' => 'Auth\AuthController'
]);