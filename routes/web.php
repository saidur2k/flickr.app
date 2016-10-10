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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/search', 'SearchQueriesController@index');
Route::post('/search/store', 'SearchQueriesController@store');
Route::get('/search/{tags}/page/{pages}', [
    'as'=> 'search',
    'uses' =>'SearchQueriesController@paginate'
]);

Route::get('/history', 'SearchHistoryController@index');