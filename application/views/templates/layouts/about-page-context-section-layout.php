<?php



	$this  ->  m_content_builder  =  "<!--Page Content Wrapper Begins-->";
	$this  ->  m_content_builder  .=  "<section class=\"section-0 section-sm-34 text-left\">";
	$this  ->  m_content_builder  .=  "<div class=\"shell\">";



	foreach  (  $this->m_section_text AS $m_section_text  =>  $values  )
	{
		foreach  (  $values AS $para  )
		{
			$this  ->  m_content_builder  .=  "<p class=\"text-small\">";
			$this  ->  m_content_builder  .=  $para;

			$this  ->  m_content_builder  .=  "</p>";
		}


	}


	$this  ->  m_content_builder  .=  "</div>";
	$this  ->  m_content_builder  .=  "</section>";
	$this  ->  m_content_builder  .=  "<!--Page Content Wrapper Ends-->";
?>