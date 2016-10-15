<?php

    namespace App;

    use JeroenG\Flickr\Api as FlickrConfig;
    use App\FlickrPhotosSearch;

    /**
     * Class FlickrApi
     * @package App
     */
    class FlickrApi
    {
        /**
         * @return \App\FlickrPhotosSearch
         */
        public static function photoSearch()
        {
            return new FlickrPhotosSearch(new FlickrConfig($_ENV['FLICKR_KEY'], 'php_serial'));
        }
    }