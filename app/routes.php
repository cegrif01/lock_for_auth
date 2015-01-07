<?php

Route::get('/', function()
{
	return Redirect::to('/login');
});

Route::get('sign-up', ['as' => 'registration', 'uses' => 'SessionsController@registration']);

Route::post('sign-up', ['as' => 'sign-up', 'uses' => 'SessionsController@store']);

Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@loginGet']);

Route::post('auth', ['as' => 'auth', 'uses' => 'SessionsController@loginPost']);

Route::get('logout','SessionsController@destroy');

//Route::group(['before' => 'lock.can'], function () {

Route::get('/users', function() {

    with(new \LockDemo\TaskAuthManager(App::make('lock.manager'), App::make('lock')))->setPermissions();

    pp(Auth::user()->can('read', 'tasks', 4));
});

Route::get('/tasks', function() {

    pp(Task::all());

});

//});