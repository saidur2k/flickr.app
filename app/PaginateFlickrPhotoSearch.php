<?php
    namespace App;


    use League\Flysystem\Exception;

    class PaginateFlickrPhotoSearch
    {
        private $first;
        private $current;
        private $prev;
        private $next;
        private $total;

        private $paginate = array();

        public function __construct($currentPage, $totalPage)
        {
            $this->first = 1;
            $this->current = (int)$currentPage > 0 ? $currentPage : 1;
            $this->prev = $this->current - 1;
            $this->next = $this->current + 1;
            $this->total = $this->setTotal($totalPage);
        }

        private function setTotal($iTotal)
        {
            try
            {
                $total = (int)$iTotal > 0 ? $iTotal : 1;
                if ($total > 100000)
                {
                    return 100000;
                }
                return $total;
            }
            catch (\Exception $e)
            {
                //catch code
            }
        }

        private function first()
        {
            $this->paginate[] = new PaginationItem('First',$this->first);
        }

        private function previous()
        {
            if ($this->current > 1)
            {
                $this->paginate[] = new PaginationItem('Previous',$this->prev);
            }
        }

        private function next()
        {
            if (($this->next < $this->total) && ($this->next > $this->current))
            {
                $this->paginate[] = new PaginationItem('Next',$this->next);
            }
        }

        private function last()
        {
            if ($this->total > $this->current)
            {
                $this->paginate[] = new PaginationItem('Last',$this->total);
            }
        }

        private function inBetween()
        {
            for($page = 1; $page< $this->total + 1; $page++)
            {
                $lower = $this->current-5;
                $upper = $this->current+5;

                if(($page > $lower && $page < $upper))
                {
                    $this->paginate[] = new PaginationItem($page,$page);
                }
            }
        }

        private function join()
        {
            // first
            $this->first();

            // stop building if only 1 page to show
            if ($this->total == 1)
            {
                return;
            }
            // previous
            $this->previous();

            // 5 on upper and lower sides
            $this->inBetween();

            // next
            $this->next();

            // last
            $this->last();
        }

        public function paginate()
        {
            $this->join();
            return $this->paginate;
        }
    }