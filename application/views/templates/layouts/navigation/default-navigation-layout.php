<?php


	$this  ->  m_navigation  =  "<header class=\"page-head\">";
	$this  ->  m_navigation  .=  "<!-- RD Navbar Transparent-->";
	$this  ->  m_navigation  .=  "<div class=\"rd-navbar-wrap\">";
	$this  ->  m_navigation  .=  "<nav data-md-device-layout=\"rd-navbar-fixed\"";
	$this  ->  m_navigation  .=  "data-lg-device-layout=\"rd-navbar-static\" data-lg-stick-up-offset=\"110px\"";
	$this  ->  m_navigation  .=  "class=\"rd-navbar rd-navbar-logo-center rd-navbar-light\"";
	$this  ->  m_navigation  .=  "data-lg-auto-height=\"true\" data-md-layout=\"rd-navbar-fixed\"";
	$this  ->  m_navigation  .=  "data-lg-layout=\"rd-navbar-static\" data-lg-stick-up=\"true\">";

	$this  ->  m_navigation  .=  "<div class=\"rd-navbar-inner\">";

// style=\"border: solid 1px red\"
	$this  ->  m_navigation  .=  "<div class=\"container\">";



	$this  ->  m_navigation  .=  "<div class=\"rd-navbar-top-block range \">";
	// range-lg-center range-lg-middle

// style=\"border: solid 1px green; padding:0;\"
	$this  ->  m_navigation  .=  "<div class=\"cell-lg-6\">";
	$this  ->  m_navigation  .=  "<!--Navbar Brand-->";
	$this  ->  m_navigation  .=  "<div class=\"rd-navbar-brand\">";
	$this  ->  m_navigation  .=  "<a href=\"{$this->m_base_url}\">";
	$this  ->  m_navigation  .=  "<img width=\"270\" height=\"44\" src=\"{$this->m_image_directory}logo/wheelies-logo.png\" alt=\"\"/>";
	$this  ->  m_navigation  .=  "</a>";
	$this  ->  m_navigation  .=  "</div>";
	$this  ->  m_navigation  .=  "</div>";



// style=\"border: solid 1px blue; padding:0;\"
	$this  ->  m_navigation  .=  "<div class=\"cell-lg-6 text-right font-size-1-point-750em\">";
	$this  ->  m_navigation  .=  "<p class=\"veil reveal-lg-block\">";
	$this  ->  m_navigation  .=  "Get in touch: ";
	$this  ->  m_navigation  .=  "<span class=\"mdi mdi-phone\"> </span>";
	$this  ->  m_navigation  .=  "<a href=\"callto:#\" class=\"\">";
	$this  ->  m_navigation  .=  " 01322-338625";
	$this  ->  m_navigation  .=  "</a>";
	$this  ->  m_navigation  .=  "</p>";
	$this  ->  m_navigation  .=  "</div>";




/*
	$this  ->  m_navigation  .=  "<div class=\"cell-lg-3\">";
	$this  ->  m_navigation  .=  "<div class=\"form-search-wrap\">";
	$this  ->  m_navigation  .=  "<!-- RD Search Form-->";
	$this  ->  m_navigation  .=  "<form action=\"../search-results.html\" method=\"GET\" class=\"form-search rd-search\">";
	$this  ->  m_navigation  .=  "<div class=\"form-group\">";
	$this  ->  m_navigation  .=  " <label for=\"rd-navbar-form-search-widget\" class=\"form-label form-search-label form-label-sm\"> Search</label>";
	$this  ->  m_navigation  .=  "<input id=\"rd-navbar-form-search-widget\" type=\"text\" name=\"s\" autocomplete=\"off\" class=\"form-search-input input-sm form-control form-control-gray-lightest input-sm\"/>";
	$this  ->  m_navigation  .=  "</div>";


	$this  ->  m_navigation  .=  "<button type=\"submit\" class=\"form-search-submit\">";
	$this  ->  m_navigation  .=  "<span class=\"mdi mdi-magnify\"> </span>";
	$this  ->  m_navigation  .=  "</button>";
	$this  ->  m_navigation  .=  "</form>";
	$this  ->  m_navigation  .=  "</div>";
	$this  ->  m_navigation  .=  "</div>";*/




	$this  ->  m_navigation  .=  " </div>";

	$this  ->  m_navigation  .=  " <!-- RD Navbar Panel-->";
	$this  ->  m_navigation  .=  " <div class=\"rd-navbar-panel\">";
	$this  ->  m_navigation  .=  " <!-- RD Navbar Toggle-->";
	$this  ->  m_navigation  .=  "<button data-rd-navbar-toggle=\".rd-navbar, .rd-navbar-nav-wrap\" class=\"rd-navbar-toggle\"> <span> </span> </button>";

	$this  ->  m_navigation  .=  "<!-- RD Navbar Top Panel Toggle-->";
	$this  ->  m_navigation  .=  "<button data-rd-navbar-toggle=\".rd-navbar, .form-search-wrap\" class=\"rd-navbar-search-toggle\"> <span> </span> </button>";
	$this  ->  m_navigation  .=  "</div>";


	$this  ->  m_navigation  .=  "</div>";



	$this  ->  m_navigation  .=  "<div class=\"rd-navbar-menu-wrap\">";

	$this  ->  m_navigation  .=  "<div class=\"container\">";

	$this  ->  m_navigation  .=  "<div class=\"rd-navbar-nav-wrap\">";

	$this  ->  m_navigation  .=  " <div class=\"rd-navbar-mobile-scroll\">";


	$this  ->  m_navigation  .=  " <!--Navbar Brand Mobile-->";
	$this  ->  m_navigation  .=  "<div class=\"rd-navbar-mobile-brand\">";
	$this  ->  m_navigation  .=  "<a href=\"{$this->m_base_url}\">";
	$this  ->  m_navigation  .=  "<img width=\"270\" height=\"44\" src=\"{$this->m_image_directory}logo/wheelies-logo.png\" alt=\"\"/>";
	$this  ->  m_navigation  .=  "</a>";
	$this  ->  m_navigation  .=  "</div>";

	$this  ->  m_navigation  .=  "<!-- RD Navbar Nav-->";
	$this  ->  m_navigation  .=  " <ul class=\"rd-navbar-nav\">";

	$this  ->  m_navigation  .=  $this  ->  PageLinks  (  );


	$this  ->  m_navigation  .=  "</ul>";

	$this  ->  m_navigation  .=  "</div>";

	$this  ->  m_navigation  .=  "</div>";

	$this  ->  m_navigation  .=  "</div>";

	$this  ->  m_navigation  .=  "</div>";



	$this  ->  m_navigation  .=  "</div>";
	$this  ->  m_navigation  .=  "</nav>";
	$this  ->  m_navigation  .=  "</div>";
	$this  ->  m_navigation  .=  "</header>";
?>