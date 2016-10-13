<?php

    namespace App;

    use Illuminate\Http\Request;
    use App\SearchQueries;
    use Auth;

    class SaveSearchQueryFromRequest
    {
        public function __construct($tag)
        {
            $this->save($tag);
        }

        private function save($tag)
        {
            //store the search string and return search string
            $data = array();
            $data['search_string'] = $tag;
            $data['user_id'] = Auth::user()->id;
            SearchQueries::create($data);
        }

    }