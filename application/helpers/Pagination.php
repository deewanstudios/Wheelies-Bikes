<?php
	/**
	 *
	 */
	class Pagination
	{

		protected $m_pagination_url;
		protected $m_total_records;
		protected $m_records_per_page;
		protected $m_total_pages;
		protected $m_current_page;
		protected $m_start_record;
		protected $m_start_page;
		protected $m_end_page;
		protected $m_previous_button;
		protected $m_next_button;


		public function __construct  (  $data  )
		{
			$this  ->  m_pagination_url  =  $data  [  'pagination_url'  ];
			$this  ->  m_total_records  =  $data  [  'total_records'  ];
			$this  ->  m_records_per_page  =  $data  [  'records_per_page'  ];
		}


		public function PaginationDisplay  (  $data  )
		{
			if  (  isset  (  $data  [  'pagination_url'  ]  )  &&  !  empty  (  $data  [  'pagination_url'  ]  )  )
			{
				// $pagination_url  =  $data  [  'pagination_url'  ];
				$this  ->  m_pagination_url;
			}
			else
			{
				echo "ERROR: No Pagination URL has been set here...";
				return FALSE;
			}

			if  (  isset  (  $data  [  'total_records'  ]  )  &&  !  empty  (  $data  [  'total_records'  ]  )  )
			{
				// $total_records  =  $data  [  'total_records'  ];
				$this  ->  m_total_records;
			}
			else
			{
				// echo "ERROR: Total records variable does not exist...";
				return FALSE;
			}

			if  (  isset  (  $data  [  'records_per_page'  ]  )  &&  !  empty  (  $data  [  'records_per_page'  ]  )  )
			{
				// $records_per_page  =  $data  [  'records_per_page'  ];
				$this  ->  m_records_per_page;
			}
			else
			{
				echo "ERROR: Records per page variable does not exist...";
				return FALSE;
			}

			$this  ->  m_total_pages  =  $this  ->  TotalPages  (  $data  );
			if  (  isset  (  $_GET  [  'product-page'  ]  )  )
			{
				$this  ->  m_current_page  =  $_GET  [  'product-page'  ];
			}
			else
			{
				$this  ->  m_current_page  =  '';
			}

			if  (  $this  ->  m_current_page  ==  ''  ||  $this  ->  m_current_page  <  1  ||  $this  ->  m_current_page  >  $this  ->  m_total_pages  )
			{
				$this  ->  m_current_page  =  1;
				$this  ->  m_start_record  =  0;
			}
			else
			{
				$this  ->  m_start_record  =  ($this  ->  m_current_page  *  $this  ->  m_records_per_page)  -  $this  ->  m_records_per_page;
			}

			$this  ->  m_pagination_controls  =  $this  ->  PaginationControls  (  $this  ->  m_current_page  ,  $this  ->  m_total_pages  ,  $this  ->  m_pagination_url  );
			// echo $this  ->  m_total_pages;

			return $this->m_pagination_controls;

		}


		private function TotalPages  (  $data  )
		{
			$this  ->  m_total_pages  =  ceil  (  $this  ->  m_total_records  /  $this  ->  m_records_per_page  );
			return $this  ->  m_total_pages;

		}


		private function PaginationControls  (  $current_page  ,  $total_pages  ,  $pagination_url  )
		{
			$this  ->  m_start_page  =  1;
			$this  ->  m_previous_button  =  $this  ->  m_current_page  -  1;
			$this  ->  m_next_button  =  $this  ->  m_current_page  +  1;
			
			
			if  (  $this  ->  m_current_page  <=  $this  ->  m_total_pages  &&  $this  ->  m_current_page  >  $this  ->  m_start_page  +  2  )
	{

		$this  ->  m_start_page  =  $this  ->  m_current_page  -  2;

	}
	if  (  $this  ->  m_current_page  >=  $this  ->  m_total_pages  &&  $this  ->  m_current_page  <  $this  ->  m_start_page  -  2  )
	{

		$this  ->  m_end_page  =  $this  ->  m_current_page  +  2;

	}
	else
	{
		$this  ->  m_end_page  =  $this  ->  m_total_pages;
	}

			require_once VIEWS  .  'templates/layouts/pagination.php';

			/*
			 echo "<pre>";
			 var_dump($this  ->  m_pagination_builder);
			 echo "</pre>";*/


			return $this  ->  m_pagination_builder;
			/*
			 echo "<a href=\"{$pagination_url}?product-page=1\" class=\"btn
			 btn-wheelies\"><<</a>";
			 if  (  $this  ->  m_current_page  >=  2  )
			 {
			 echo "<a href=\"{$pagination_url}?product-page={$this->m_previous_button}\"
			 class=\"btn btn-wheelies\"><</a>";

			 }

			 $this  ->  m_start_page  =  1;

			 if  (  $this  ->  m_current_page  <=  $this  ->  m_total_pages  &&  $this  ->
			 m_current_page  >  $this  ->  m_start_page  +  2  )
			 {

			 $this  ->  m_start_page  =  $this  ->  m_current_page  -  2;

			 }
			 if  (  $this  ->  m_current_page  >=  $this  ->  m_total_pages  &&  $this  ->
			 m_current_page  <  $this  ->  m_start_page  -  2  )
			 {

			 $this  ->  m_end_page  =  $this  ->  m_current_page  +  2;

			 }
			 else
			 {
			 $this  ->  m_end_page  =  $this  ->  m_total_pages;
			 }


			 for  (  $this  ->  m_start_page  ;  $this  ->  m_start_page  <=  $this  ->
			 m_end_page  ;  $this  ->  m_start_page  ++  )
			 {
			 if  (  $this  ->  m_current_page  ==  $this  ->  m_start_page  )
			 {
			 echo "<span class=\"btn btn-wheelies\"><b>{$this->m_start_page}</b></span>";
			 }
			 else
			 {
			 echo "<a href=\"{$pagination_url}?product-page={$this->m_start_page}\"
			 class=\"btn btn-wheelies\">{$this->m_start_page}</a>";
			 }
			 }


			 if  (  $this  ->  m_current_page  <  $this  ->  m_total_pages  )
			 {
			 echo "<a href=\"{$pagination_url}?product-page={$this->m_next_button}\"
			 class=\"btn btn-wheelies\">></a>";

			 }


			 echo "<a href=\"{$pagination_url}?product-page={$this->m_total_pages}\"
			 class=\"btn btn-wheelies\">>></a>";


			 if  (  $this  ->  m_current_page  ==  $this  ->  m_total_pages  )
			 {
			 echo "You have reached the end of page";
			 }*/

		}


		public function StartRecord  (  $data  )
		{
			if  (  isset  (  $_GET  [  'product-page'  ]  )  )
			{
				$this  ->  m_current_page  =  $_GET  [  'product-page'  ];
			}
			else
			{
				$this  ->  m_current_page  =  '';
			}

			$this  ->  f_total_pages  =  $this  ->  TotalPages  (  $data  );

			if  (  isset  (  $data  [  'records_per_page'  ]  )  &&  !  empty  (  $data  [  'records_per_page'  ]  )  )
			{
				// $records_per_page  =  $data  [  'records_per_page'  ];
				$this  ->  m_records_per_page;
			}
			else
			{
				echo "ERROR: Records per page variable does not exist...";
				// return FALSE;
			}

			if  (  $this  ->  m_current_page  ==  ""  ||  $this  ->  m_current_page  <  1  ||  $this  ->  m_current_page  >  $this  ->  f_total_pages  )
			{
				$this  ->  m_start_record  =  0;
				return $this  ->  m_start_record;

			}
			else
			{
				$this  ->  m_start_record  =  ($this  ->  m_current_page  *  $this  ->  m_records_per_page)  -  $this  ->  m_records_per_page;
				return $this  ->  m_start_record;
			}



		}


	}
?>