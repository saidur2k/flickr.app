<?php

    namespace App;

    use App\SanitizeFlickrPhotoSearch;
    use App\FlickrApi;

    /**
     * Class BuildFlickrSearchResult
     * @package App
     */
    class BuildFlickrSearchResult
    {
        /**
         * @var \JeroenG\Flickr\Response
         */
        private $rawPhotoSearchData;

        /**
         * BuildFlickrSearchResult constructor.
         * @param SearchObject $searchObject
         */
        public function __construct(SearchObject $searchObject)
        {
            $this->rawPhotoSearchData = FlickrApi::photoSearch()->byTag($searchObject);
            $this->sanitizedPhotoSearchData = $this->rawPhotoSearchData->__get('photos');
        }

        /**
         * @return \JeroenG\Flickr\Response
         */
        public function getRawPhotoSearchResult()
        {
            return $this->rawPhotoSearchData;
        }

        /**
         * @return mixed
         */
        public function getSanitizedSearchResult()
        {
            return $this->sanitizedPhotoSearchData;
        }

        /**
         * @return mixed
         */
        public function getPhotoList()
        {
            return $this->sanitizedPhotoSearchData['photo'];
        }

        /**
         * @return int
         */
        public function getCurrentPage()
        {
            return $this->sanitizedPhotoSearchData['page'];
        }

        /**
         * @return int
         */
        public function getTotalPages()
        {
            return $this->sanitizedPhotoSearchData['pages'];
        }

        /**
         * @return int
         */
        public function getTotalItems()
        {
            return $this->sanitizedPhotoSearchData['total'];
        }
    }