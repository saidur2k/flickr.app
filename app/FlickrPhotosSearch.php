<?php
    namespace App;
    use JeroenG\Flickr\Flickr;

    class FlickrPhotosSearch extends Flickr
    {
        public function byTag($tag, $page = 1)
        {
            $parameters['tags'] = $tag;
            $parameters['per_page'] = 5;
            $parameters['extras'] = 'original_format';
            $parameters['page'] = $page;
            return $this->request('flickr.photos.search', $parameters);
        }
    }