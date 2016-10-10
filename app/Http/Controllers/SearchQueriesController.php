<?php

namespace App\Http\Controllers;

use App\PaginateFlickrPhotoSearch;
use Illuminate\Http\Request;
use App\SearchQueries;
use Illuminate\Support\Facades\App;
use Auth;

use JeroenG\Flickr\Api as FlickrConfig;
use App\FlickrPhotosSearch;
use App\FlickrPhotoUrlBuilder;
use App\PhotoListBuilder;
use App\SanitizeFlickrPhotoSearch;
use Illuminate\Support\Facades\Route;
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
        //store the search string and redirect to search page
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        SearchQueries::create($data);
        return $this->searchByTag($data['search_string'], 1);
    }

    private function searchByTag($tag = null, $page = 1)
    {
        $api = new FlickrConfig($_ENV['FLICKR_KEY'], 'php_serial');
        $this->flickr = new FlickrPhotosSearch($api);
        $photos = $this->flickr->byTag($tag, $page);
        $photoBuilder = new FlickrPhotoUrlBuilder();
        $sanitizedList = new SanitizeFlickrPhotoSearch($photos);
        $getList = $sanitizedList->getList();

        $paginate = new PaginateFlickrPhotoSearch($getList);
        $pagination = $paginate->paginate();
        return view('search', ['photos' => $getList , 'photoBuilder' => $photoBuilder, 'pagination' => $pagination, 'tag'=>$tag]);
    }

    public function paginate($tag, $page)
    {
        return $this->searchByTag($tag, $page);
    }
}
