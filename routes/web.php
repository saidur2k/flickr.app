<?php
    use App\Http\Controllers\SearchQueriesController;
    use App\SaveSearchQueryFromRequest;
    use App\SearchObject;
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

Route::post('/search',function(Request $request) {
    $searchObject = new SearchObject($request);
    new SaveSearchQueryFromRequest($searchObject->getTag());
    return SearchQueriesController::paginatedSearchQuery($searchObject);
});

Route::get('/search/{tag}', function(Request $request, $tag) {
    $searchObject = new SearchObject($request, $tag);
    return SearchQueriesController::paginatedSearchQuery($searchObject);
});

Route::get('/history', 'SearchHistoryController@index');