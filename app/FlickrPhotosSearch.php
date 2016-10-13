<?php
    namespace App;

    use JeroenG\Flickr\Flickr;

    class FlickrPhotosSearch extends Flickr
    {
        public function byTag(SearchObject $searchObject)
        {
            $parameters['tags'] = $searchObject->getTag();
            $parameters['per_page'] = $searchObject::RESULTS_PER_PAGE;
            $parameters['extras'] = 'original_format';
            $parameters['page'] = $searchObject->getPage();
            return $this->request('flickr.photos.search', $parameters);
        }
    }