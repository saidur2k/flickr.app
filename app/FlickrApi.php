<?php
    namespace App;

    use JeroenG\Flickr\Flickr as JGFlickr;

    class FlickrApi extends JGFlickr
    {
        public function listByTag($tag = null)
        {
            $parameters['tags'] = 'cat';
            $parameters['per_page'] = 5;
            $parameters['extras'] = 'original_format';
            return $this->request('flickr.photos.search', $parameters);
        }

        public function getPhotoSizes($photoId)
        {
            return $this->request('flickr.photos.getSizes', $photoId);
        }

    }