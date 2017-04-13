<?php

Route::get('/example', function () {
    return view('example');
});

Route::get('/', function () {
    return view('resume');
});

Route::get('/workers', 'IndexController@index')->name('workersTree');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', 'AdminController@index')->name('listWorkers');
    Route::get('/create', 'AdminController@create')->name('formCreateWorker');
    Route::post('/store', 'AdminController@store')->name('storeWorker');
    Route::post('/show', 'AdminController@show')->name('showWorker');
    Route::get('/edit/{id}', 'AdminController@edit')->name('formEditWorker');
    Route::put('/update', 'AdminController@update')->name('updateWorker');
    Route::delete('/destroy/{id}', 'AdminController@destroy')->name('destroyWorker');

});