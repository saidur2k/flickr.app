<?php

    namespace App;

    use Illuminate\Http\Request;

    /**
     * Class SearchObject
     * @package App
     */
    class SearchObject
    {
        /**
         * @var mixed|null|string
         * This is the search tag
         */
        private $tag;
        /**
         * @var current page
         */
        private $page;
        /**
         * Set the maximum number of Search Results per page
         */
        const RESULTS_PER_PAGE = 5;

        /**
         * SearchObject constructor.
         * @param Request $request
         * @param null    $tag
         */
        public function __construct(Request $request, $tag = null)
        {
            $this->tag = $this->setTag($request, $tag);
            $this->setPage($request);
        }

        /**
         * @param Request $request
         * @param null    $tag
         * @return mixed|null|string
         */
        private function setTag(Request $request, $tag = null)
        {
            $finalTag  = '';

            if($request->has('search_string'))
            {
                $finalTag = $request->get('search_string');
                return $finalTag;
            }

            return $tag ?? $finalTag;
        }

        /**
         * @return mixed|null|string
         */
        public function getTag()
        {
            return $this->tag;
        }

        /**
         * @param Request $request
         */
        private function setPage(Request $request)
        {
            $page = 1;

            if($request->has('page'))
            {
                $page = (int)$request->query()['page'];
            }

            $this->page = $page;
        }

        /**
         * @return int
         */
        public function getPage()
        {
            return $this->page;
        }




    }