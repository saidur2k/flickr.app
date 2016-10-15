<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\SearchObject;
use App\FlickrPaginatePhotoSearch;
use App\FlickrPhotoUrlBuilder;

class SearchQueriesController extends Controller
{
    public function __construct(Request $request, $tag = null)
    {
        $this->middleware('auth');

    }

    public function index()
    {
        return view('search');
    }

    public function saveAndSearch(Request $request)
    {
        $searchObject = new SearchObject($request, null);
        $currentUser = Auth::user();
        $currentUser->saveSearch($searchObject);
        return $this->paginatedSearchQuery($request, $searchObject->getTag());
    }

    public function paginatedSearchQuery(Request $request, $tag)
    {
        $searchObject = new SearchObject($request, $tag);
        $paginatedSearchResults = new FlickrPaginatePhotoSearch($searchObject);
        return view('search',   ['tag'=> $searchObject->getTag()
                               , 'searchResults' => $paginatedSearchResults->getSearchResults()
                               , 'photoBuilder' => new FlickrPhotoUrlBuilder()
                               , 'results' => $paginatedSearchResults->paginate()
                                ]
        );
    }

}
