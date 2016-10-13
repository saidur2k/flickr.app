<?php

    namespace App;

    use Illuminate\Pagination\LengthAwarePaginator;
    use App\BuildFlickrSearchResult;
    use App\SearchObject;

    class FlickrPaginatePhotoSearch
    {
        private $searchResult;
        private $searchObject;
        public function __construct(SearchObject $searchObject, BuildFlickrSearchResult $searchResult)
        {
            $this->searchObject = $searchObject;
            $this->searchResult = $searchResult;
        }

        public function render()
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
