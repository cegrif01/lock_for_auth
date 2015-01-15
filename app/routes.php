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

//by default, the user shouldn't be able to view anything.  We must go to
// /user-management first to set permissions in the database.  Once they
//are in the db, then we can view our tasks if we are allowed.
Route::get('/tasks/{task_id}', function($task_id) {

    $user = Auth::user();

    if( $user->cannot('readAll', 'tasks') &&
        $user->cannot('readOwn', 'tasks', function() use ($task_id, $user) {

            return in_array($task_id, $user->tasks()->get()->fetch('id')->toArray());

        })) {

        throw new Exception('You do not have permission to view this');
    }

    return Task::find($task_id);
});

//set permissions here.  Because we are using the database driver, calling this method
//will set those permissions in the database.  Then they are referenced everywhere in
//code base.
Route::get('user-management', function()
{
    //App::make('lock')
    with(new \LockDemo\AuthManager(App::make('lock.manager'), App::make('lock')))->setPermissions();
});