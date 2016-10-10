<?php
    namespace App;

    use JeroenG\Flickr\Response;

    class SanitizeFlickrPhotoSearch
    {
        private $response;

        public function __construct(Response $response)
        {
           $this->response = $response;
        }

        public function getList()
        {
            return $this->response->__get('photos');
        }

    }