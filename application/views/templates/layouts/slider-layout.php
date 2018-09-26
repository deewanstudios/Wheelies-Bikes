<?php


	$this  ->  m_slider  =  "<!--  Slider Layout -->";
	$this  ->  m_slider  .=  "<section class=\"section-relative\">";

	$this  ->  m_slider  .=  "<div data-loop=\"true\" data-autoplay=\"true\" data-slide-effect=\"fade\" data-height=\"33%\" data-dragable=\"false\" data-min-height=\"787px\" data-dots=\"true\" class=\"swiper-container swiper-slider\">";



	$this  ->  m_slider  .=  "<div class=\"swiper-wrapper\">";


	foreach  (  $m_slider_images AS $slider_image  )
	{

		$this  ->  m_slider  .=  "<div
		  data-slide-bg=\"{$this->m_image_directory}{$slider_image["image_path"]}.jpg\" class=\"swiper-slide
		  swiper-slide-overlay-disable swiper-slide-center\"></div>";
	}



	$this  ->  m_slider  .=  "</div>";


	$this  ->  m_slider  .=  "<!-- Swiper Pagination-->";
	$this  ->  m_slider  .=  "<div class=\"swiper-pagination swiper-pagination-type-2\"></div>";
	$this  ->  m_slider  .=  "</div>";


	$this  ->  m_slider  .=  "</section>";
?>
