<?php

	// This is a helper class to make paginating
	// records easy.
	class Pagination
	{

		public $current_page;
		public $per_page;
		public $total_count;
		protected $pagi_link_builder;

		public function __construct  (  $page  =  1  ,  $per_page  =  20  ,  $total_count  =  0  )
		{
			$this  ->  current_page  =  (int)$page;
			$this  ->  per_page  =  (int)$per_page;
			$this  ->  total_count  =  (int)$total_count;
			/*
			 $pager  =  $this  ->  PagingNavigation  (  );
			 var_dump  (  $pager  );*/

		}


		public function offset  (  )
		{
			// Assuming 20 items per page:
			// page 1 has an offset of 0    (1-1) * 20
			// page 2 has an offset of 20   (2-1) * 20
			//   in other words, page 2 starts with item 21
			return ($this  ->  current_page  -  1)  *  $this  ->  per_page;
		}


		public function total_pages  (  )
		{
			return ceil  (  $this  ->  total_count  /  $this  ->  per_page  );
		}


		public function previous_page  (  )
		{
			return $this  ->  current_page  -  1;
		}


		public function next_page  (  )
		{
			return $this  ->  current_page  +  1;
		}


		public function has_previous_page  (  )
		{
			return $this  ->  previous_page  (  )  >=  1  ?  true  :  false;
		}


		public function has_next_page  (  )
		{
			return $this  ->  next_page  (  )  <=  $this  ->  total_pages  (  )  ?  true  :  false;
		}


		public function PagingNavigation  (    )
		{

			$link  =  "<div id=\"pagination\" style=\"clear: both;\">";

			if  (  $this  ->  total_pages  (  )  >  1  )
			{

				if  (  $this  ->  has_previous_page  (  )  )
				{
					$link  .=  "<a href=\"index.php?page=";
					$link  .=  $this  ->  previous_page  (  );
					$link  .=  "\">&laquo; Previous</a> ";
				}

				for  (  $i  =  1  ;  $i  <=  $this  ->  total_pages  (  )  ;  $i  ++  )
				{
					if  (  $i  ==  $page  )
					{
						$link  .=  " <span class=\"selected\">{$i}</span> ";
					}
					else
					{
						$link  .=  " <a href=\"index.php?page={$i}\">{$i}</a> ";
					}
				}

				if  (  $this  ->  has_next_page  (  )  )
				{
					$link  .=  " <a href=\"index.php?page=";
					$link  .=  $this  ->  next_page  (  );
					$link  .=  "\">Next &raquo;</a> ";
				}

			}

			$link  .=  "</div>";


			// $demo  =  "Page navigation function has been clicked and there are {$total} pages all together";
			return $link;
		}


	}
?>