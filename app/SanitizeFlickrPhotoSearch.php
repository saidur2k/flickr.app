<?php
    namespace App;

    use JeroenG\Flickr\Response;
    use JeroenG\Flickr\Api as FlickrConfig;
    use App\FlickrPhotosSearch;

    class SanitizeFlickrPhotoSearch
    {
        private $tag;
        private $page;

        private $rawSearchResult;
        private $sanitizedSearchResult;

        public function __construct($tag, $page)
        {
            $this->tag = $tag;
            $this->page = $page;

            $this->rawSearchResult = $this->rawPhotoListFromFlickrByTagAndPage();
            $this->sanitizedSearchResult = $this->photosFromFlickrAsArray();
        }

        protected function rawPhotoListFromFlickrByTagAndPage()
        {
            $api = new FlickrConfig($_ENV['FLICKR_KEY'], 'php_serial');
            $flickr = new FlickrPhotosSearch($api);
            return $flickr->byTag($this->tag, $this->page);
        }

        private function photosFromFlickrAsArray()
        {
            return $this->rawSearchResult->__get('photos');
        }

        public function getRawSearchResult()
        {
            return $this->rawSearchResult;
        }

        public function getSanitizedSearchResult()
        {
            return $this->sanitizedSearchResult;
        }

        public function getCurrentPage()
        {
            return $this->sanitizedSearchResult['page'];
        }

        public function getTotalPages()
        {
            return $this->sanitizedSearchResult['pages'];
        }

    }