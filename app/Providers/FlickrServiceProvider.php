<?php

    namespace App\Providers;

    use JeroenG\Flickr\Api;
    use App\Flickr;
    use JeroenG\Flickr\FlickrServiceProvider as JeroenGFlickrServiceProvider;
    class FlickrServiceProvider extends JeroenGFlickrServiceProvider
    {
        /**
         * Perform post-registration booting of services.
         */
        public function boot()
        {
            //
        }

        /**
         * Register any package services.
         */
        public function register()
        {
            $this->app->singleton('flickr', function ($app) {

                $api = new Api(env('FLICKR_KEY'), 'rest');

                return new Flickr($api);

            });
        }

        /**
         * Get the services provided by the provider.
         *
         * @return array
         */
        public function provides()
        {
            return ['flickr'];
        }
    }
