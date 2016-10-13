<?php

    namespace App;

    use Illuminate\Http\Request;

    class SearchObject
    {
        private $tag;
        private $page;
        const RESULTS_PER_PAGE = 5;

        public function __construct(Request $request, $tag = null)
        {
            $this->tag = $this->setTag($request, $tag);
            $this->setPage($request);
        }

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

        public function getTag()
        {
            return $this->tag;
        }

        private function setPage(Request $request)
        {
            $page = 1;

            if($request->has('page'))
            {
                $page = $request->query()['page'];
            }

            $this->page = $page;
        }
        public function getPage()
        {
            return $this->page;
        }




    }