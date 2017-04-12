<?php

Route::get('/', 'IndexController@index');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', 'AdminController@index')->name('listWorkers');
    Route::get('/create', 'AdminController@create');
    Route::post('/store', 'AdminController@store');
    Route::post('/show/{id}', 'AdminController@show');
    Route::get('/edit/{id}', 'AdminController@edit');
    Route::put('/update/{id}', 'AdminController@update');
    Route::delete('/destroy/{id}', 'AdminController@destroy');

});

//Route::get('/home', 'HomeController@index');