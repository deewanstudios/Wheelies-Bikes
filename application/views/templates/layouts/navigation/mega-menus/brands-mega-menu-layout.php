<?php
$this->m_navigation .= "<ul class=\"col-lg-3\">";
$this->m_navigation .= "Shop By Brands";
foreach ($this->m_sub_navigation as $m_sub_navigation) {
    # code...
    $this->m_navigation .= "<li class=\"\">";
    $this->m_navigation .= "<a href=\"";
    $this->m_navigation .= $this->m_base_url;
    $this->m_navigation .= "bikes/";
    $this->m_navigation .= strtolower($m_sub_navigation["brand_cat_name"]);
    $this->m_navigation .= "\">";
    $this->m_navigation .= "<span>";
    $this->m_navigation .= ucwords($m_sub_navigation["brand_cat_name"]);
    $this->m_navigation .= "</span>";
    $this->m_navigation .= "</a>";
}
$this->m_navigation .= "</ul>";
