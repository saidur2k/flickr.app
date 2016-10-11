<?php

    namespace App;

    use App\SanitizeFlickrPhotoSearch;
    use App\PaginateFlickrPhotoSearch;

    class BuildFlickrSearchResult
    {
        private $tag;
        private $currentPage;

        private $photoList;

        public function __construct($tag, $currentPage = 1)
        {
            $this->photoUrlBuilder = new FlickrPhotoUrlBuilder();
            $this->tag = $tag;
            $this->currentPage = $currentPage;

            $this->photoList = new SanitizeFlickrPhotoSearch($this->tag, $this->currentPage);
        }

        public function getPhotoList()
        {

            return $this->photoList->getSanitizedSearchResult();
        }

        public function getPaginationBar()
        {
            $paginate = new PaginateFlickrPhotoSearch($this->photoList->getCurrentPage(), $this->photoList->getTotalPages());
            return $paginate->paginate();
        }
    }