<?php

$this->m_content_builder = "<!-- Shop Grid View-->";
$this->m_content_builder .= "<div class=\"cell-md-9 cell-md-push-1 section-bottom-98\">";
$this->m_content_builder .= $this->m_pager;

$this->m_content_builder .= "<!-- Shop Grid View-->";
$this->m_content_builder .= "<!-- Shop Grid View-->";
$this->m_content_builder .= "<div class=\"range section-66\">";

foreach ($this->m_category_products as $m_product) {
    /*  // $this->m_content_builder .= "<a href=\"{$this->m_bike_product_category}";
    // $this->m_content_builder .= "<a href=\"{$bike_product["gender_cat_name"]}/product/";
    // $this->m_content_builder .= "<a href=\"product/";
    // {$this->m_bike_product_category}/ */
    
    $this->m_content_builder .= "<a href=\"";
    $this->m_content_builder .= $m_product["product_cat_name"];
    $this->m_content_builder .= "/";
    $this->m_content_builder .= $m_product["gender_cat_name"];
    $this->m_content_builder .= "/";
    $this->m_content_builder .= strtolower(str_replace(" ", "-", $m_product["brand_cat_name"])) . "-";
    $this->m_content_builder .= str_replace(" ", "-", $m_product["gender_cat_name"]) . "-";
    $this->m_content_builder .= str_replace(" ", "-", $m_product["product_name"]);
    "\">";

    if (!empty($m_product["product_model"])) {

        $this->m_content_builder .= "-";
        $this->m_content_builder .= str_replace(" ", "-", $m_product["product_model"]);
        // $this  ->  m_content_builder  .=  str_replace  (  " "  ,  "-"  ,  $m_product  [  "product_model"  ]  );
    }

    $this->m_content_builder .= "\">";
    $this->m_content_builder .= "<!--products holder-->";
    $this->m_content_builder .= "<div class=\"cell-xs-6 cell-sm-6 cell-lg-4 section-bottom-98\">";
    $this->m_content_builder .= "<!--Product-->";
    $this->m_content_builder .= "<div class=\"product product-grid product-grid-type-2\">";
    $this->m_content_builder .= "<!--Product Image-->";
    $this->m_content_builder .= "<div class=\"product-image\">";
    $this->m_content_builder .= "<img class=\"img-responsive product-image-area\" src=\"{$this->m_image_directory}products-images/{$m_product["image_path"]}.jpg\" alt=\"\" width=\"\" height=\"\">";

    /*
    Insert ul and li for thumb images here.
     */

    $this->m_content_builder .= "<!-- Product Label-->";

    $this->m_content_builder .= "</div>";
    $this->m_content_builder .= "<!-- Product Title-->";
    $this->m_content_builder .= "<h5 class=\"product-title offset-top-20\">";

/*     $this->m_content_builder .= "<a href=\"{$this->m_m_product_category}/product/";
// $this->m_content_builder .= "<a href=\"product/";
// {$this->m_m_product_category}/

$this->m_content_builder .= strtolower(str_replace(" ", "-", $m_product["brand_cat_name"])) . "-";
$this->m_content_builder .= str_replace(" ", "-", $m_product["gender_cat_name"]) . "-";
$this->m_content_builder .= str_replace(" ", "-", $m_product["product_name"]);
"\">";

if (!empty($m_product["product_model"])) {

$this->m_content_builder .= "-";
$this->m_content_builder .= str_replace(" ", "-", $m_product["product_model"]);
// $this  ->  m_content_builder  .=  str_replace  (  " "  ,  "-"  ,  $m_product  [  "product_model"  ]  );
}

$this->m_content_builder .= "\">"; */

    $this->m_content_builder .= ucwords($m_product["brand_cat_name"]) . " " . ucwords($m_product["product_name"]) . " " . ucwords($m_product["product_model"]);

    // $this->m_content_builder .= "</a>";

    $this->m_content_builder .= "</h5>";
    $this->m_content_builder .= "<!-- Product Brand-->";
    $this->m_content_builder .= "<p class=\"product-brand text-italic text-dark\">";
    // $this  ->  m_content_builder  .=  "Armani Brand";
    $this->m_content_builder .= ucwords("{$m_product["gender_cat_name"]} " . "{$m_product["m_cat_name"]} bike");
    $this->m_content_builder .= "</p>";
    $this->m_content_builder .= "<p class=\"product-brand text-italic text-dark\">";
    // $this  ->  m_content_builder  .=  "Armani Brand";
    $this->m_content_builder .= "Model Year: {$m_product["model_year"]}";
    $this->m_content_builder .= "</p>";
    $this->m_content_builder .= "<!-- Product price-->";
    $this->m_content_builder .= "<div class=\"product-price text-bold\">";

    $this->m_content_builder .= "<span class=\"product-price-new\">";
    $this->m_content_builder .= "£{$m_product["product_price_value"]}";
    $this->m_content_builder .= "</span>";
    $this->m_content_builder .= "</div>";
    $this->m_content_builder .= "<div class=\"product-block-hover\">";
    $this->m_content_builder .= "<!-- Product Add To cart-->";
    /* Replace Anchor with Button */
    $this->m_content_builder .= "<a class=\"btn btn-sm btn-danger btn-view-product btn-icon btn-icon-left product-btn offset-top-20\"";
    /* href=\"{$this->m_m_product_category}/product/";
    $this->m_content_builder .= strtolower(str_replace(" ", "-", $m_product["brand_cat_name"])) . "-";
    $this->m_content_builder .= str_replace(" ", "-", $m_product["gender_cat_name"]) . "-";
    $this->m_content_builder .= str_replace(" ", "-", $m_product["product_name"]);
    // $this->m_content_builder .= "\";
    // >";

    if (!empty($m_product["product_model"])) {

    $this->m_content_builder .= "-";
    $this->m_content_builder .= str_replace(" ", "-", $m_product["product_model"]);
    } */
    $this->m_content_builder .= "\">";

    $this->m_content_builder .= "View Product";
    $this->m_content_builder .= "</a>";
    $this->m_content_builder .= "</div>";
    $this->m_content_builder .= "</div>";
    $this->m_content_builder .= "</div>";
    $this->m_content_builder .= "</a>";
}

$this->m_content_builder .= "</div>";
$this->m_content_builder .= $this->m_pager;
/*
End of shop grid view
 */

$this->m_content_builder .= "</div>";
