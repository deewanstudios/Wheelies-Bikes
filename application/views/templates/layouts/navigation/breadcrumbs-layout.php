<?php

$this->m_page_header_banner = "<!-- Modern Breadcrumbs-->";
$this->m_page_header_banner .= "<section class=\"breadcrumb-modern rd-parallax bg-gray-darkest context-dark\">";
$this->m_page_header_banner .= "<div data-speed=\"0.2\" data-type=\"media\"";
$this->m_page_header_banner .= "data-url=\"{$this->m_image_directory}{$this->m_page_banners[0]["image_path"]}.jpg\"";
$this->m_page_header_banner .= "class=\"rd-parallax-layer\"></div>";
$this->m_page_header_banner .= "<div data-speed=\"0\" data-type=\"html\" class=\"rd-parallax-layer\">";
$this->m_page_header_banner .= "<div class=\"bg-overlay-gray-darkest\">";
$this->m_page_header_banner .= "<div class=\"shell section-34 section-sm-50 section-md-110\">";
$this->m_page_header_banner .= "<div class=\"text-extra-big font-accent veil reveal-md-block\">";
$this->m_page_header_banner .= "<span class=\"big\">";
$this->m_page_header_banner .= ucwords($main_page_name);
$this->m_page_header_banner .= "</span>";
$this->m_page_header_banner .= "</div>";
$this->m_page_header_banner .= "<ul class=\"list-inline list-inline-dashed p offset-top-0\">";
$this->m_page_header_banner .= "<li>";
$this->m_page_header_banner .= "<a href=\"{$this->m_base_url}\" class=\"small\">";
$this->m_page_header_banner .= "Home";
$this->m_page_header_banner .= "</a>";
$this->m_page_header_banner .= "</li>";
$this->m_page_header_banner .= "<li>";
$this  ->  m_page_header_banner  .=  ucwords($f_breadcrumbs["name"]);
$this->m_page_header_banner .= "</li>";
$this->m_page_header_banner .= "</ul>";
$this->m_page_header_banner .= "</div>";
$this->m_page_header_banner .= "</div>";
$this->m_page_header_banner .= "</div>";
$this->m_page_header_banner .= "</section>";
