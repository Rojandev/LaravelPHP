<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('pages.showtask');
});

/*Route::resource('task', 'TaskController');*/

//Task Routes
Route::get('task/{id?}', 'ShowTaskController@index');
Route::post('task', 'ShowTaskController@store');
Route::post('task/{id}', 'ShowTaskController@update');
Route::delete('task/{id}', 'ShowTaskController@destroy');

//Email Routes
Route::get('send', 'EmailController@send');