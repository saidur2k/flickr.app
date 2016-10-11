<?php
    namespace App;

    class FlickrPhotoUrlBuilder
    {
        public static function getThumbnailPhotoUrl(array $photo)
        {
            //template in https://www.flickr.com/services/api/misc.urls.html
            //https://farm{farm-id}.staticflickr.com/{server-id}/{id}_{o-secret}_o.(jpg|gif|png)
            try
            {
                $farmId = $photo['farm'];
                $serverId = $photo['server'];
                $photoId = $photo['id'];
                $secretId = $photo['secret'];

                return "https://farm" . $farmId
                       .".staticflickr.com/" . $serverId
                       . "/". $photoId ."_" . $secretId . "_t.jpg";
            }
            catch(\Exception $e)
            {
                throw new \Exception("Error");
            }
        }

        public static function getFullPhotoUrl(array $photo)
        {
            //template in https://www.flickr.com/services/api/misc.urls.html
            //https://farm{farm-id}.staticflickr.com/{server-id}/{id}_{secret}_o.(jpg|gif|png)
            try
            {
                $farmId = $photo['farm'];
                $serverId = $photo['server'];
                $photoId = $photo['id'];
                $secretId = $photo['secret'];

                $originalSecretId = isset($photo['originalsecret']) ? $photo['originalsecret'] : false;
                $originalFormat = isset($photo['originalformat']) ? $photo['originalformat'] : false;

                if ($originalSecretId == false || $originalFormat == false)
                {
                    return "https://farm" . $farmId
                           .".staticflickr.com/" . $serverId
                           . "/". $photoId ."_" . $secretId . "_c.jpg";
                }

                return "https://farm" . $farmId
                       .".staticflickr.com/" . $serverId
                       . "/". $photoId ."_" . $originalSecretId . "_o." . $originalFormat;
            }
            catch(\Exception $e)
            {
                throw new \Exception("Error");
            }
        }

    }