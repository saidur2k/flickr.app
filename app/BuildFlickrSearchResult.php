<?php

    namespace App;

    use App\SanitizeFlickrPhotoSearch;
    use App\FlickrApi;

    class BuildFlickrSearchResult
    {
        private $photoSearchApi;

        private $rawPhotoSearchData;

        public function __construct(SearchObject $searchObject)
        {
            $this->photoSearchApi = FlickrApi::photoSearch();
            $this->rawPhotoSearchData = $this->photoSearchApi->byTag($searchObject);
            $this->sanitizedPhotoSearchData = $this->rawPhotoSearchData->__get('photos');
        }

        public function getRawPhotoSearchResult()
        {
            return $this->rawPhotoSearchData;
        }

        public function getSanitizedSearchResult()
        {
            return $this->rawPhotoSearchData->__get('photos');
        }

        public function getPhotoList()
        {
            return $this->sanitizedPhotoSearchData['photo'];
        }

        public function getCurrentPage()
        {
            return $this->sanitizedPhotoSearchData['page'];
        }

        public function getTotalPages()
        {
            return $this->sanitizedPhotoSearchData['pages'];
        }

        public function getTotalItems()
        {
            return $this->sanitizedPhotoSearchData['total'];
        }
    }