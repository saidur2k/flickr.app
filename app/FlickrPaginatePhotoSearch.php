<?php

    namespace App;

    use Illuminate\Pagination\LengthAwarePaginator;
    use App\BuildFlickrSearchResult;
    use App\SearchObject;

    /**
     * Class FlickrPaginatePhotoSearch
     * @package App
     */
    class FlickrPaginatePhotoSearch
    {
        /**
         * @var \App\BuildFlickrSearchResult
         */
        private $searchResult;
        /**
         * @var \App\SearchObject
         */
        private $searchObject;

        /**
         * FlickrPaginatePhotoSearch constructor.
         * @param \App\SearchObject            $searchObject
         * @param \App\BuildFlickrSearchResult $searchResult
         */
        public function __construct(SearchObject $searchObject)
        {
            $this->searchObject = $searchObject;
            $this->searchResult = $this->fetchSearchResults();
        }

        /**
         * @return \App\BuildFlickrSearchResult
         */
        private function fetchSearchResults()
        {
            return new BuildFlickrSearchResult($this->searchObject);
        }

        /**
         * @return mixed
         */
        public function getSearchResults()
        {
            return $this->searchResult->getPhotoList();
        }
        /**
         * @return LengthAwarePaginator
         */
        public function paginate()
        {
            return new LengthAwarePaginator(
                                                  $this->searchResult->getTotalItems()
                                                , $this->searchResult->getTotalPages()
                                                , $this->searchObject::RESULTS_PER_PAGE
                                                , $this->searchObject->getPage()
                                                , ['path' => '/search/'.$this->searchObject->getTag().'/']
                                            );
        }
    }
