<?php

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(['before' => 'lock.can'], function () {

    Route::get('/users', function() {

        return User::all();
    });

});