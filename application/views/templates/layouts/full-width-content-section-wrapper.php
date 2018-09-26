<?php

	$this  ->  m_page_content_wrapper  =  "<!--Page Content Wrapper Begins-->";
	$this  ->  m_page_content_wrapper  .=  "<section class=\"section-98 section-sm-110\">";
	$this  ->  m_page_content_wrapper  .=  "<div class=\"shell\">";

	foreach  (  $sections AS $m_section_view  )
	{
		$this  ->  m_page_content_wrapper  .=  $m_section_view;
	}

	$this  ->  m_page_content_wrapper  .=  "</div>";
	$this  ->  m_page_content_wrapper  .=  "</section>";
	$this  ->  m_page_content_wrapper  .=  "<!--Page Content Wrapper Ends-->";
?>