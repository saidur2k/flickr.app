<?php
    namespace App;

    use JeroenG\Flickr\Flickr;

    /**
     * Class FlickrPhotosSearch
     * @package App
     */
    class FlickrPhotosSearch extends Flickr
    {
        /**
         * @param SearchObject $searchObject
         * @return \JeroenG\Flickr\Response
         */
        public function byTag(SearchObject $searchObject)
        {
            $parameters['tags'] = $searchObject->getTag();
            $parameters['per_page'] = $searchObject::RESULTS_PER_PAGE;
            $parameters['extras'] = 'original_format';
            $parameters['page'] = $searchObject->getPage();
            return $this->request('flickr.photos.search', $parameters);
        }



    }