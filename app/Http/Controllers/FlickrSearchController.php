<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JeroenG\Flickr\Api as FlickrConfig;
use App\FlickrPhotosSearch;
use App\FlickrPhotoUrlBuilder;
use App\PhotoListBuilder;
class FlickrSearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $flickr;

    public function __construct()
    {
        $this->middleware('auth');
        $api = new FlickrConfig($_ENV['FLICKR_KEY'], 'php_serial');
        $this->flickr = new FlickrPhotosSearch($api);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = $this->flickr->byTag();
        $photoBuilder = new FlickrPhotoUrlBuilder();
        return view('search', ['photos' => $photos, 'photoBuilder' => $photoBuilder]);
    }

    public function byTag()
    {
        $photos = $this->flickr->byTag();
        $photoBuilder = new FlickrPhotoUrlBuilder();
        return view('search', ['photos' => $photos, 'photoBuilder' => $photoBuilder]);
    }


}
