<?php
	$this  ->  m_pagination_builder  =  "<section class=\"text-center\">";
	$this  ->  m_pagination_builder  .=  "<div class=\"shell\">";
	$this  ->  m_pagination_builder  .=  "<div class=\"\">";

	$this  ->  m_pagination_builder  .=  "<!-- Bootstrap Pagination-->";
	$this  ->  m_pagination_builder  .=  "<nav>";

	$this  ->  m_pagination_builder  .=  "<ul class=\"pagination pagination-lg\">";

	if  (  $this  ->  m_current_page  >  $this  ->  m_start_page  )
	{
		$this  ->  m_pagination_builder  .=  "<li class=\"\">";
		$this  ->  m_pagination_builder  .=  "<a href=\"{$pagination_url}\" aria-label=\"Start\">";
		$this  ->  m_pagination_builder  .=  "<span class=\"mdi mdi-chevron-double-left\" aria-hidden=\"true\"></span>";
		$this  ->  m_pagination_builder  .=  "</a>";
		$this  ->  m_pagination_builder  .=  "</li>";
	}

	if  (  $this  ->  m_current_page  >=  2  )
	{
		$this  ->  m_pagination_builder  .=  "<li>";
		$this  ->  m_pagination_builder  .=  "<a href=\"{$pagination_url}?product-page={$this->m_previous_button}\" aria-label=\"Previous\">";
		$this  ->  m_pagination_builder  .=  "<span class=\"mdi mdi-chevron-left\" aria-hidden=\"true\"></span>";
		$this  ->  m_pagination_builder  .=  "</a>";
		$this  ->  m_pagination_builder  .=  "</li>";
	}

	for  (  $this  ->  m_start_page  ;  $this  ->  m_start_page  <=  $this  ->  m_end_page  ;  $this  ->  m_start_page  ++  )
	{
		if  (  $this  ->  m_current_page  ==  $this  ->  m_start_page  )
		{
			$this  ->  m_pagination_builder  .=  "<li class=\"active\" >";
			$this  ->  m_pagination_builder  .=  "<a href=\"\">";
			$this  ->  m_pagination_builder  .=  $this  ->  m_start_page;
			$this  ->  m_pagination_builder  .=  "</a>";
			$this  ->  m_pagination_builder  .=  "</li>";
		}
		else
		{

			$this  ->  m_pagination_builder  .=  "<li class=\"\" >";
			$this  ->  m_pagination_builder  .=  "<a href=\"{$pagination_url}?product-page={$this->m_start_page}\">";
			$this  ->  m_pagination_builder  .=  $this  ->  m_start_page;
			$this  ->  m_pagination_builder  .=  "</a>";
			$this  ->  m_pagination_builder  .=  "</li>";
		}
	}

	if  (  $this  ->  m_current_page  <  $this  ->  m_total_pages  )
	{

		$this  ->  m_pagination_builder  .=  "<li>";
		$this  ->  m_pagination_builder  .=  "<a href=\"{$pagination_url}?product-page={$this->m_next_button}\" aria-label=\"Next\">";
		$this  ->  m_pagination_builder  .=  "<span class=\"mdi mdi-chevron-right\" aria-hidden=\"true\"></span>";
		$this  ->  m_pagination_builder  .=  "</a>";
		$this  ->  m_pagination_builder  .=  "</li>";


		$this  ->  m_pagination_builder  .=  "<li class=\"\">";
		$this  ->  m_pagination_builder  .=  "<a href=\"{$pagination_url}?product-page={$this->m_total_pages}\" aria-label=\"End\">";
		$this  ->  m_pagination_builder  .=  "<span class=\"mdi mdi-chevron-double-right\" aria-hidden=\"true\"></span>";
		$this  ->  m_pagination_builder  .=  "</a>";
		$this  ->  m_pagination_builder  .=  "</li>";
	}



	$this  ->  m_pagination_builder  .=  "</ul>";
	$this  ->  m_pagination_builder  .=  "</nav>";
	$this  ->  m_pagination_builder  .=  "</div>";
	$this  ->  m_pagination_builder  .=  "</div>";
	$this  ->  m_pagination_builder  .=  "</section>";
?>