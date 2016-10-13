<?php

    namespace App;

    use JeroenG\Flickr\Api as FlickrConfig;
    use App\FlickrPhotosSearch;

    class FlickrApi
    {
        public static function photoSearch()
        {
            $api = new FlickrConfig($_ENV['FLICKR_KEY'], 'php_serial');
            $photoSearch = new FlickrPhotosSearch($api);
            return $photoSearch;
        }
    }