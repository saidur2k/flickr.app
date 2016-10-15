<?php
    use App\Http\Controllers\SearchHistoryController;
    use App\Http\Controllers\SearchQueriesController;
    use Illuminate\Http\Request;

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
Route::get('/search/{tag}', 'SearchQueriesController@paginatedSearchQuery');
Route::post('/search', 'SearchQueriesController@saveAndSearch');
Route::get('/history', 'SearchHistoryController@index');