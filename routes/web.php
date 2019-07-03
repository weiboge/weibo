<?php

Route::get('/', 'PagesController@root')->name('root');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
//Route::get('/users/{user}', 'UsersController@show')->name('users.show');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit','index','destroy']]);
    Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);
});
