<?php

Route::get('/', function () {
    return view('resume');
});

//2UP
Route::get('/task_2up', function () {
    return view('task_2up');
});
Route::get('/vacancies', 'VacanciesController@index')->name('vacancies');

// WKS
Route::get('/task_wks', function () {
    return view('task_wks');
});
Route::match(['get', 'post'], '/users', 'UserController@index')->name('usersList');
Route::post('/random', 'UserController@random')->name('random');

// ABZ
Route::get('/task_abz', function () {
    return view('task_abz');
});
Route::get('/workers', 'IndexController@index')->name('workersTree');
Route::post('/brunch', 'IndexController@getBrunch')->name('getBrunch');

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
    Route::get('/{id}/edit', 'AdminController@edit')->name('formEditWorker');
    Route::put('/{id}/update', 'AdminController@update')->name('updateWorker');
    Route::get('/{id}/destroy', 'AdminController@destroy')->name('destroyWorker');

});