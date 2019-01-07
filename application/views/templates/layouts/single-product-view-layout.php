<?php

$this->m_content_builder = '<div class="product product-single">';

$this->m_content_builder .= '<div class="range">';

$this->m_content_builder .= '<div class="cell-sm-8 cell-md-5">';
$this->m_content_builder .= "<div class=\"product-image\"><img class=\"img-responsive product-image-area\" src=\"{$this->m_product_image_directory}{$image_path}.jpg\" alt=\"$image_caption\">";
// $this->m_content_builder .= "</div>";
$this->m_content_builder .= '<ul class="product-thumbnails">';

foreach ($this->m_product_images as $m_product_image) {
    $this->m_content_builder .= '<li class="active"';
    $this->m_content_builder .= "data-large-image=\"{$this->m_product_image_directory}{$m_product_image['image_path']}.jpg\">";
    $this->m_content_builder .= '<img class="img-responsive" ';
    $this->m_content_builder .= "src=\"{$this->m_product_image_directory}{$m_product_image['image_path']}.jpg\"";
    $this->m_content_builder .= "alt=\"{$m_product_image['image_caption']}\"";
    $this->m_content_builder .= 'width="84" height="84"';
    $this->m_content_builder .= '>';
    $this->m_content_builder .= '</li>';
}

$this->m_content_builder .= '</ul>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';

$this->m_content_builder .= '<div class="cell-sm-12 cell-md-7 text-left offset-top-41 offset-md-top-0">';
$this->m_content_builder .= '<!-- Product Brand-->';

$this->m_content_builder .= '<!-- Product Title-->';
$this->m_content_builder .= '<h5 class="product-title offset-top-0">';
$this->m_content_builder .= strtoupper($this->m_product_brand) . ' ';
$this->m_content_builder .= strtoupper($this->m_product_name) . ' ';
if (!empty($this->m_product_model)) {
    $this->m_content_builder .= strtoupper($this->m_product_model);
}
$this->m_content_builder .= '</h5>';

$this->m_content_builder .= '<!-- Classic Accordion-->';
$this->m_content_builder .= '<div class="responsive-tabs responsive-tabs-classic" data-type="accordion" >';
// style=\"border: 1px solid red\"
$this->m_content_builder .= '<ul class="resp-tabs-list tabs-group-default" data-group="tabs-group-default">';
$this->m_content_builder .= '<li>Description</li>';

$this->m_content_builder .= '<li>Specifications</li>';
$this->m_content_builder .= '</ul>';

$this->m_content_builder .= '<div class="resp-tabs-container tabs-group-default" data-group="tabs-group-default">';

$this->m_content_builder .= '<div>';

$this->m_content_builder .= '<h6>';
$this->m_content_builder .= $this->m_product_description;
$this->m_content_builder .= '</h6>';

$this->m_content_builder .= '</div>';

$this->m_content_builder .= '<div>';

$this->m_content_builder .= '<div class="table-responsive-sm clearfix">';
$this->m_content_builder .= '<table class="table">';

foreach ($specs[0] as $spec_heading => $product_specification) {
    $this->m_content_builder .= '<tr>';
    $parts = str_replace('_', ' ', $spec_heading);
    $this->m_content_builder .= '<th>';
    $this->m_content_builder .= ucwords($parts);
    $this->m_content_builder .= '</th>';

    $this->m_content_builder .= '<td>';
    $this->m_content_builder .= ucwords($product_specification);
    $this->m_content_builder .= '</td>';

    $this->m_content_builder .= '</tr>';
}

$this->m_content_builder .= '</table>';
$this->m_content_builder .= '</div>';

$this->m_content_builder .= '</div>';

$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '<!-- Accordion Ends -->';

$this->m_content_builder .= '<!-- Product price-->';
$this->m_content_builder .= '<div class="product-price text-bold h5 offset-top-34">';
$this->m_content_builder .= '<span class="product-price-new">';

$this->m_content_builder .= '£';
$this->m_content_builder .= number_format($this->m_product_price, 2);

$this->m_content_builder .= '</span>';
$this->m_content_builder .= '</div>';

// Enquiry Button Section Starts Here
$this->m_content_builder .= '<div class="offset-top-34">';
$this->m_content_builder .= '<!--Enquiry Button-->';
$this->m_content_builder .= '<a href="';
$this->m_content_builder .= $this->m_base_url;
$this->m_content_builder .= 'enquire/';
$this->m_content_builder .= strtolower(preg_replace('/\s/', '-', $this->_enquiryLink()));

$this->m_content_builder .= '"';
$this->m_content_builder .= 'class="btn btn-sm btn-icon btn-icon-left product-btn offset-top-20 offset-xs-top-0 btn-view-product"';
$this->m_content_builder .= '>';
$this->m_content_builder .= '<span class="icon mdi mdi-shopping"></span>';
$this->m_content_builder .= 'Enquire';
$this->m_content_builder .= '</a>';
$this->m_content_builder .= '</div>';
// End of Enquiry Button Section
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
