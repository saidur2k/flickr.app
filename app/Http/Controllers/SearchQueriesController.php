<?php

namespace App\Http\Controllers;

use App\PaginateFlickrPhotoSearch;
use Illuminate\Http\Request;
use App\SearchQueries;
use Illuminate\Support\Facades\App;
use Auth;

use App\FlickrPhotoUrlBuilder;
use App\PhotoListBuilder;
use Illuminate\Support\Facades\Route;
use App\SaveSearchQueryFromRequest;
use App\BuildFlickrSearchResult;
class SearchQueriesController extends Controller
{
    private $flickr;
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(Request $request)
    {
        return view('search');
    }

    public function store(Request $request)
    {
        $queryString = new SaveSearchQueryFromRequest($request);
        $queryString->save();
        return $this->searchByTag($queryString->get(), 1);
    }

    private function searchByTag($tag = '', $page = 1)
    {
        $searchResults = new BuildFlickrSearchResult($tag,$page);
        $getPhotoList = $searchResults->getPhotoList();
        $photoUrlBuilder = new FlickrPhotoUrlBuilder();
        $pagination = $searchResults->getPaginationBar();

        return view('search', ['photos' => $getPhotoList , 'photoBuilder' => $photoUrlBuilder, 'pagination' => $pagination, 'tag'=>$tag]);
    }

    public function paginatedSearchQuery($tag = '', $page)
    {
        return $this->searchByTag($tag, $page);
    }
}
