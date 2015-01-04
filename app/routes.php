<?php

Route::get('/', function()
{
	return Redirect::to('/users');
});

//Route::group(['before' => 'lock.can'], function () {

Route::get('/users', function() {

    return pp(User::all());
});

Route::get('/tasks', function() {

    return pp(Task::all());
});

//});