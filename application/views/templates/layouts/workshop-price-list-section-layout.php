<?php
// $this  ->  m_content_builder  =  "<div class=\"divider bg-mantis\"></div>";
$this->m_content_builder = "<div class=\"range range-xs-center range-xs-bottom offset-top-66\">";
$this->m_content_builder .= "<div class=\"cell-xs-12 cell-md-10 text-left\">";
// $this  ->  m_content_builder  .=  $para;
$this->m_content_builder .= $this->_pricingClarification()[0];
$this->m_content_builder .= "<!-- Pricing Box type 1-->";
$this->m_content_builder .= "<ul class=\"box-pricing box-pricing-type-1 list-unstyled\">";

foreach ($this->m_prices as $m_service) {

    $this->m_content_builder .= "<li class=\"box-pricing-item\">";
    $this->m_content_builder .= "<div class=\"box-pricing-title text-uppercase text-spacing-120\">";
    $this->m_content_builder .= "<div class=\"box-pricing-name text-bold\">";
    $this->m_content_builder .= $m_service["service_name"];
    $this->m_content_builder .= "</div>";
    $this->m_content_builder .= "<div class=\"box-pricing-dots\"></div>";
    $this->m_content_builder .= "<div class=\"box-pricing-price text-bold\">";
    $this->m_content_builder .= strtolower("from") . " £" . number_format($m_service["product_price_value"], 2);
    if ($m_service["service_name"] == "wheel builds" || $m_service["service_name"] == "wheel trueing") {
        $this->m_content_builder .= "<span class=\"text-italic\">";
        $this->m_content_builder .= strtolower(" per wheel");
        $this->m_content_builder .= "</span>";
    }
    $this->m_content_builder .= "</div>";
    $this->m_content_builder .= "</li>";
}

$this->m_content_builder .= "</ul>";

foreach ($this->m_section_text as $para) {
    $this->m_content_builder .= "<p class=\"text-small\">";
    $this->m_content_builder .= $para["context"];
    $this->m_content_builder .= "</p>";
}
$this->m_content_builder .= "</div>";
$this->m_content_builder .= "</div>";
