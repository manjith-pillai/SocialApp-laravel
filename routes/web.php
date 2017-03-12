<?php

Route::group(['middleware' => ['web']], function(){
	Route::get('/', function () {
    return view('welcome');
	})->name('login');

	Route::post('/signup',[
		'uses' => 'UserController@postSignUp',
		'as' => 'signup'
	]);

	Route::post('/signin',[
		'uses' => 'UserController@postSignIn',
		'as' => 'signin'
	]);

	Route::get('/logout','UserController@getLogout');

	Route::get('/account', [
		'uses' => 'UserController@getAccount',
		'as' => 'account'
	]);

	Route::post('/updateaccount', [
		'uses' => 'UserController@postSaveAccount',
		'as' => 'account.save'
	]);

	Route::get('/userimage/{filename}', [
		'uses' => 'UserController@getUserImage',
		'as' => 'account.image'
	]);

	Route::get('/dashboard',[
		'uses' => 'PostController@getDashboard',
		'as' => 'dashboard'
	])->middleware('auth');

	Route::post('/createpost', [
		'uses' => 'PostController@postCreatePost',
		'as' => 'post.create'
	])->middleware('auth');
	Route::get('/delete/{id}', [
		'uses' => 'PostController@getDeletePost',
		'as' => 'post.create'
	])->middleware('auth');
	Route::post('/edit','PostController@postEditPost')->name('edit');
});