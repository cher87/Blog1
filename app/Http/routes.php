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

Route::group(['middleware' => 'web'], function () {

    Route::get('/', [
        'as'    => 'index',
        'uses'  => 'PostsController@index',
    ]);

    Route::get('/posts', [
        'as'    => 'posts.index',
        'uses'  => 'PostsController@index',
    ]);

    Route::get('/posts/{post}', [
        'as'    => 'posts.show',
        'uses'  => 'PostsController@show',
    ]);

    Route::post('/posts', [
		'as'	=> 'posts.add',
		'uses'	=> 'PostsController@add',
        'middleware' => 'auth',
	]);

    Route::post('/posts/{post}/comments', [
        'as'    => 'posts.add.comment',
        'uses'  => 'CommentsController@add',
        'middleware'  => 'auth',
    ]);

    Route::get('/posts/{post}/edit', [
    	'as'	=> 'posts.post.edit',
    	'uses'	=> 'PostsController@edit',
        'middleware'    => 'auth',
    ]);

    Route::patch('/posts/{post}', [
    	'as'    => 'posts.update',
        'uses'  => 'PostsController@update',
        'middleware'    => 'auth',
	]);

	Route::post('/login', [
		'as'	=> 'login',
		'uses'	=> 'HomeController@processLogin'
	]);

    Route::get('/posts/sortbytitle', [
        'as'    =>  'sortbytitle',
        'uses'  =>  'PostsController@sortbytitle'
    ]);

    Route::auth();
});



