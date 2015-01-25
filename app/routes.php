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

Route::get('/users', function() {

    return User::all();
});

Route::get('/tasks/{taskId}', function($taskId) {

    $user = Auth::user();

    if( $user->cannot('readAll', 'tasks') &&
        $user->cannot('readOwn', 'tasks', (int) $taskId)) {

        throw new Exception('You do not have permission to view this');
    }

    return Task::find($taskId);
});
