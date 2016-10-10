<?php
    namespace App;
    use JeroenG\Flickr\Flickr;

    class FlickrPhotoSize extends Flickr
    {
        public function getPhotoSizes($photoId)
        {
            return $this->request('flickr.photos.getSizes', $photoId);
        }
    }