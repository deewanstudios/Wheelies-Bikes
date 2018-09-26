<?php
	$this  ->  m_navigation  =  "<header class=\"page-head slider-menu-position\">";
	$this  ->  m_navigation  .=  "<!-- RD Navbar Transparent-->";
	$this  ->  m_navigation  .=  "<div class=\"rd-navbar-wrap\">";
	$this  ->  m_navigation  .=  "<nav class=\"rd-navbar rd-navbar-default rd-navbar-transparent\"";
	$this  ->  m_navigation  .=  "data-md-device-layout=\"rd-navbar-fixed\"";
	$this  ->  m_navigation  .=  "data-lg-device-layout=\"rd-navbar-static\"";
	$this  ->  m_navigation  .=  "data-lg-auto-height=\"true\" data-md-layout=\"rd-navbar-fixed\" data-lg-layout=\"rd-navbar-static\" data-lg-stick-up=\"true\">";
	$this  ->  m_navigation  .=  "<div class=\"rd-navbar-inner\">";
	$this  ->  m_navigation  .=  "<!-- RD Navbar Panel-->";
	$this  ->  m_navigation  .=  "<div class=\"rd-navbar-panel\">";
	$this  ->  m_navigation  .=  "<!-- RD Navbar Toggle-->";
	$this  ->  m_navigation  .=  "<button class=\"rd-navbar-toggle\"";
	$this  ->  m_navigation  .=  "data-rd-navbar-toggle=\".rd-navbar, .rd-navbar-nav-wrap\">";
	$this  ->  m_navigation  .=  "<span></span></button>";
	$this  ->  m_navigation  .=  "<!--Navbar Brand-->";
	$this  ->  m_navigation  .=  "<div class=\"rd-navbar-brand\">";
	$this  ->  m_navigation  .=  "<a href=\"{$this->m_base_url}\">";
	$this  ->  m_navigation  .=  "<img style=\"margin-top: -5px;margin-left: -15px;\" width=\"130\" height=\"31\" src=\"{$this->m_image_directory}logo/wheelies-logo.png\" alt=\"\"/>";
	$this  ->  m_navigation  .=  "</a>";
	$this  ->  m_navigation  .=  "</div>";
	$this  ->  m_navigation  .=  "</div>";
	$this  ->  m_navigation  .=  "<div class=\"rd-navbar-menu-wrap\">";
	$this  ->  m_navigation  .=  "<div class=\"rd-navbar-nav-wrap\">";
	$this  ->  m_navigation  .=  "<div class=\"rd-navbar-mobile-scroll\">";
	$this  ->  m_navigation  .=  "<!--Navbar Brand Mobile-->";
	$this  ->  m_navigation  .=  "<div class=\"rd-navbar-mobile-brand\">";
	$this  ->  m_navigation  .=  "<a href=\"{$this->m_base_url}\">";
	$this  ->  m_navigation  .=  "<img style=\"margin-top: -5px;margin-left: -15px;\" width=\"130\" height=\"31\" src=\"{$this->m_image_directory}logo/wheelies-logo.png\" alt=\"\"/>";
	$this  ->  m_navigation  .=  "</a>";
	$this  ->  m_navigation  .=  "</div>";

	$this  ->  m_navigation  .=  "<!-- RD Navbar Nav-->";
	$this  ->  m_navigation  .=  "<ul class=\"rd-navbar-nav\">";

	$this  ->  m_navigation  .=  $this  ->  PageLinks  (  );

	$this  ->  m_navigation  .=  "</ul>";
	$this  ->  m_navigation  .=  "</div>";
	$this  ->  m_navigation  .=  "</div>";
	$this  ->  m_navigation  .=  "</div>";
	$this  ->  m_navigation  .=  "</div>";
	$this  ->  m_navigation  .=  "</nav>";
	$this  ->  m_navigation  .=  "</div>";
	$this  ->  m_navigation  .=  "</header>";
?>