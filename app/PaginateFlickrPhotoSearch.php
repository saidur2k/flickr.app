<?php
    namespace App;


    class PaginateFlickrPhotoSearch
    {
        private $first;
        private $current;
        private $prev;
        private $next;
        private $total;

        public function __construct(array $data)
        {
            $this->first = 1;
            $this->current = (int)$data['page'] > 0 ? $data['page'] : 1;
            $this->prev = $this->current - 1;
            $this->next = $this->current + 1;
            $this->total = (int)$data['pages'] > 0 ? $data['pages'] : 1;
        }

        public function paginate()
        {
            // first
            $paginate[] = ['key' => 'First', 'value' => $this->first];

            // previous
            if ($this->current > 2)
            {
                $paginate[] = ['key' => 'Previous', 'value' => $this->prev];
            }

            // current
            if ($this->current > 1)
            {
                $paginate[] = ['key' => 'Current' , 'value' => $this->current];
            }


            // max 8, inbetween
            $finishLoopAt = ($this->current + 10 < $this->total - 2) ? $this->current+ 10 : $this->total - 1;
            for($i=$this->current+1; $i <  $finishLoopAt;$i++)
            {
                if ($i < $this->total)
                {
                    $paginate[] = ['key' => $i, 'value' => $i];
                }
            }




            // next
            if (($this->next < $this->total) && ($this->next > $this->current))
            {
                $paginate[] = ['key' => 'Next' , 'value'=> $this->next];
            }
            // last
            if ($this->total > $this->current)
            {
                $paginate[] = ['key' => 'Last' , 'value'=> $this->total];
            }

            return $paginate;
        }
    }