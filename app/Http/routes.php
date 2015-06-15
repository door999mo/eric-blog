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

// Blog
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


Route::get('blog/{post}', [
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

// User Management
Route::get('user', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'UserController@index',
    'roles' => ['']
]);

Route::get('user/new', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'UserController@newUser',
    'roles' => ['']
]);


Route::get('user/{user}', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'UserController@editUser',
    'roles' => ['']
]);

Route::get('user/{user}/delete', [
    'middleware' => ['auth', 'roles'],
    'uses' => 'UserController@deleteUser',
    'roles' => ['']
]);

Route::post('user/create', [
    'middleware' => ['auth', 'roles'],
    'as' => 'user.create',
    'uses' => 'UserController@createUser',
    'roles' => ['']
]);

Route::post('user/{user}/update', [
    'middleware' => ['auth', 'roles'],
    'as' => 'user.update',
    'uses' => 'UserController@updateUser',
    'roles' => ['']
]);

// Comment
Route::post('comment/create/{post}', [
    'middleware' => ['auth', 'roles'],
    'as' => 'comment.create',
    'uses' => 'CommentController@createComment',
    'roles' => ['user']
]);


Route::controllers([
    'auth' => 'Auth\AuthController'
]);