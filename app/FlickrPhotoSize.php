<?php
    namespace App;
    use JeroenG\Flickr\Flickr;

    class FlickrPhotosSearch extends Flickr
    {
        public function byTag($tag)
        {
            $parameters['tags'] = $tag;
            $parameters['per_page'] = 5;
            $parameters['extras'] = 'original_format';
            return $this->request('flickr.photos.search', $parameters);
        }
    }