<?php

namespace App\Http\Controllers;

use App\FlickrPaginatePhotoSearch;
use Auth;
use App\FlickrPhotoUrlBuilder;
use App\PhotoListBuilder;
use App\BuildFlickrSearchResult;
use App\SearchObject;

class SearchQueriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('search');
    }

    public static function paginatedSearchQuery(SearchObject $searchObject)
    {
        $searchResults = new BuildFlickrSearchResult($searchObject);
        $photoUrlBuilder = new FlickrPhotoUrlBuilder();
        $paginatedSearchResults = new FlickrPaginatePhotoSearch($searchObject, $searchResults);
        return view('search', ['searchResults' => $searchResults->getPhotoList() , 'photoBuilder' => $photoUrlBuilder, 'results' => $paginatedSearchResults->render()]);
    }

}
