<?php

Route::get('/', function () {
    return view('resume');
});

Route::get('/workers', 'IndexController@index')->name('workersTree');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', function() {
        return view('admin.workers');
    })->name('listWorkers');
    Route::post('/', 'AdminController@index')->name('getWorkers');
    Route::get('/create', 'AdminController@create')->name('formCreateWorker');
    Route::post('/get_bosses', 'AdminController@getBosses')->name('getBosses');
    Route::post('/store', 'AdminController@store')->name('storeWorker');
    Route::post('/show', 'AdminController@show')->name('showWorker');
    Route::get('/edit/{id}', 'AdminController@edit')->name('formEditWorker');
    Route::put('/update/{id}', 'AdminController@update')->name('updateWorker');
    Route::delete('/destroy/{id}', 'AdminController@destroy')->name('destroyWorker');

});