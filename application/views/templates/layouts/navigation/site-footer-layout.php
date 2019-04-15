<?php

$this->m_footer = "<footer class=\"section-relative section-34 page-footer bg-gray-base context-dark bg-footer\">";
$this->m_footer .= "<div class=\"shell\">";
$this->m_footer .= "<div class=\"range range-sm-center text-lg-left\">";
$this->m_footer .= "<div class=\"cell-sm-12\">";
$this->m_footer .= "<div class=\"range range-xs-center\">";
$this->m_footer .= "<div class=\"cell-xs-12 cell-md-8 cell-md-push-2 text-md-right footer\">";

$this->m_footer .= "<div>";
$this->m_footer .= "<ul class=\"list-inline list-inline-dashed p text-darker list-inline-md list-inline-dashed-wide\">";
$this->footerLinks();
$this->m_footer .= "</ul>";
$this->m_footer .= "</div>";

$this->m_footer .= "<ul class=\"list-inline list-inline-white offset-top-10 text-darker\">";
$this->m_footer .= "<li><a href=\"https://www.facebook.com/wheelieserith/\" target=\"_blank\" class=\"fa fa-facebook\"></a></li>";
$this->m_footer .= "<li><a href=\"https://www.instagram.com/wheelies_bikes/\" target=\"_blank\" class=\"fa fa-instagram\"></a></li>";
/* $this->m_footer .= "<li><a href=\"#\" class=\"fa fa-youtube\"></a></li>";
$this->m_footer .= "<li><a href=\"#\" class=\"fa fa-linkedin\"></a></li>"; */

$this->m_footer .= "</ul>";
$this->m_footer .= "</div>";
$this->m_footer .= "<div class=\"cell-xs-12 cell-md-4 cell-md-push-1 offset-top-34 offset-md-top-0\">";
$this->m_footer .= "<!-- Footer brand-->";
$this->m_footer .= "<div class=\"footer-brand\">";
$this->m_footer .= "<a href=\"{$this->m_base_url}\">";
$this->m_footer .= "<img width=\"270\" height=\"44\" style=\"margin-left: -6px;\" src=\"{$this->m_image_directory}logo/wheelies-logo.png\" alt=\"\" />";
$this->m_footer .= "</a>";

$this->m_footer .= "</div>";
$this->m_footer .= "</div>";
$this->m_footer .= "</div>";
$this->m_footer .= "</div>";
$this->m_footer .= "</footer>";
