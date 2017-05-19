<?php

Route::get('/', function () {
    return view('resume');
});

// Leblav
Route::group(['prefix' => 'leblav'], function() {
    Route::get('/task', function () {
        return view('leblav/task_leblav');
    })->name('taskLeblav');
    // RSS
    Route::get('/rss', 'LeblavController@rss')->name('getRss');
    // To do list
    Route::group(['prefix' => 'todo'], function() {
        Route::get('/list', 'LeblavController@toDoList')->name('toDoList');
        Route::post('/store', 'LeblavController@store')->name('store');
        Route::post('/destroy', 'LeblavController@destroy')->name('destroy');
    });
    // Rent apartments
    Route::group(['prefix' => 'flats'], function() {
        Route::get('/list', 'LeblavController@flatList')->name('flatList');
        Route::get('/create', 'LeblavController@createFlat')->name('createFlat');
        Route::post('/store', 'LeblavController@storeFlat')->name('storeFlat');
    });
});

//ForAbroad
Route::get('/abroad/task', function () {
    return view('task_abroad');
})->name('taskAbroad');

//2UP
Route::group(['prefix' => '2up'], function() {
    Route::get('/task', function () {
        return view('task_2up');
    })->name('task2UP');
    Route::get('/vacancies', 'VacanciesController@index')->name('listVacancies');
    Route::post('/vacancies', 'VacanciesController@getVacancies')->name('getVacancies');
    Route::post('/status', 'VacanciesController@toggleStatus')->name('status');
});

// WKS
Route::group(['prefix' => 'wks'], function() {
    Route::get('/task', function () {
        return view('task_wks');
    })->name('taskWKS');
    Route::match(['get', 'post'], '/users', 'UserController@index')->name('usersList');
    Route::post('/random', 'UserController@random')->name('random');
});

// ABZ
Route::get('/task_abz', function () {
    return view('task_abz');
});
Route::get('/workers', 'IndexController@index')->name('workersTree');
Route::post('/brunch', 'IndexController@getBrunch')->name('getBrunch');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/workers', function() {
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