<?php



	foreach  (  $m_section_text AS $context  =>  $values  )
	{
		foreach  (  $values AS $para  )
		{
			$this  ->  m_multiple_paragraph_section  =  "<p class=\"text-small offset-top-30
	 offset-sm-top-66\">";

			$this  ->  m_multiple_paragraph_section  .=  $para;
			$this  ->  m_multiple_paragraph_section  .=  "</p>";
		}



	}
?>


<!--
$this  ->  m_multiple_paragraph_section  =  "
<p class=\"text-small offset-top-30
offset-sm-top-66\">";

$this  ->
m_multiple_paragraph_section  .=  $array_length;
$this  ->  m_multiple_paragraph_section  .=  $context["context"];
$this  ->  m_multiple_paragraph_section  .="
</p>";-->
