<?php

Route::get('/', 'PagesController@root')->name('root');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
//Route::get('/users/{user}', 'UsersController@show')->name('users.show');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit','index','destroy']]);
    Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);
    Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
    Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');
    Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
    Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');
});
