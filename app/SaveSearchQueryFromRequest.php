<?php

    namespace App;

    use Illuminate\Http\Request;
    use App\SearchQueries;
    use Auth;

    class SaveSearchQueryFromRequest
    {
        private $request;

        public function __construct(Request $request)
        {
            $this->request = $request;
        }

        public function save()
        {
            //store the search string and return search string
            $data = $this->request->all();
            $data['user_id'] = Auth::user()->id;
            SearchQueries::create($data);
        }

        public function get()
        {
            return $this->request->input('search_string');
        }
    }