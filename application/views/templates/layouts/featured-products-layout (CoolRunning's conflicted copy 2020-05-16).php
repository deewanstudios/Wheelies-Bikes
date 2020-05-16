<?php

$this->m_content_builder = '<!--Section tag starts here-->';
$this->m_content_builder .= '<section class="section-bottom-66 context-light">';

// Section title starts here
$this->m_content_builder .= '<div class="range range-center section-bottom-66">';
$this->m_content_builder .= '<div class="cell-xs-12">';
$this->m_content_builder .= '<h2 class="text-between">';
$this->m_content_builder .= 'Featured Products';
$this->m_content_builder .= '</h2>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
// Section title end here

$this->m_content_builder .= '<!--Carousel wrapper starts here-->';
$this->m_content_builder .= '<div class="owl-carousel owl-carousel-default owl-carousel-arrows owl-carousel-arrows-fullwidth veil-xl-owl-dots veil-owl-nav reveal-xl-owl-nav"';
$this->m_content_builder .= 'data-items="1" data-md-items="2" data-lg-items="4" data-nav="true" data-autoplay="false" data-loop="true" data-dots="true"';
$this->m_content_builder .= 'data-nav-class="[&quot;owl-prev mdi mdi-chevron-left&quot;, &quot;owl-next mdi mdi-chevron-right&quot;]"';
$this->m_content_builder .= '>';
foreach ($this->m_featured_products as $m_featured_product) {
    // Instantiation of member properties
    $this->_m_featured_product_cat_name = $m_featured_product['product_cat_name'];
    $this->_m_featured_product_gender_name = $m_featured_product['gender_cat_name'];
    $this->_m_featured_product_type = $m_featured_product['bike_cat_name'];
    $this->_m_featured_product_brand_name = $m_featured_product['brand_cat_name'];
    $this->_m_featured_product_name = $m_featured_product['product_name'];
    $this->_m_featured_product_model = $m_featured_product['product_model'];
    $this->_m_featured_product_model_year = $m_featured_product['model_year'];
    $this->_m_featured_product_price = $m_featured_product['product_price_value'];
    $this->_m_featured_product_image = $m_featured_product['image_path'];
    // Product Info
    $this->_m_product_info = $this->_m_featured_product_brand_name;
    $this->_m_product_info .= ' ';
    $this->_m_product_info .= $this->_m_featured_product_name;
    $this->_m_product_info .= ' ';
    $this->_m_product_info .= $this->_m_featured_product_model;

    // Product Description
    $this->_m_product_desc = $this->_m_featured_product_gender_name;
    $this->_m_product_desc .= ' ';
    $this->_m_product_desc .= $this->_m_featured_product_brand_name;
    $this->_m_product_desc .= ' ';
    $this->_m_product_desc .=
    preg_replace(
        '/s\b/', '', $this->_m_featured_product_cat_name
    );

    // Product Year
    $this->m_product_model_year = $m_featured_product['model_year'];

    // Product Price
    $this->m_product_price = $m_featured_product['product_price_value'];

    // Product Image
    $this->m_product_image = $m_featured_product['image_path'];

    // Featured product link
    $this->_m_featured_product_link = $this->_m_featured_product_cat_name;
    $this->_m_featured_product_link .= '/';
    $this->_m_featured_product_link .= $this->_m_featured_product_gender_name;
    $this->_m_featured_product_link .= '/';
    $this->_m_featured_product_link .= $this->_m_featured_product_type;
    $this->_m_featured_product_link .= '/';
    $this->_m_featured_product_link .= $this->_m_featured_product_brand_name;
    $this->_m_featured_product_link .= '/';
    $this->_m_featured_product_link .= $this->_m_featured_product_name;
    if ($m_featured_product['product_model'] !== null) {
        $this->_m_featured_product_link .= ' ';
        $this->_m_featured_product_link .= $this->_m_featured_product_model;
    }

    // item display
    $this->m_content_builder .= '<!--Carousel item starts here-->';
    $this->m_content_builder .= '<div>';
    $this->m_content_builder .= '<div class="range range-xs-center">';
    $this->m_content_builder .= '<div class="cell-xs-8 cell-sm-6 cell-md-12">';
    $this->m_content_builder .= '<!-- Featured Product Thumbnail-->';
    $this->m_content_builder .= '<figure class=" thumbnail-border-none">';
    $this->m_content_builder .= '<a class=""';
    $this->m_content_builder .= 'href="';
    $this->m_content_builder .= strtolower(preg_replace('/\s/', '-', $this->_m_featured_product_link));
    $this->m_content_builder .= '"';
    $this->m_content_builder .= '>';
    $this->m_content_builder .= '<div class="thumbnail-featured-product">';

    $this->m_content_builder .= "<img src=\"{$this->m_image_directory}";
    $this->m_content_builder .= "products-images/{$this->m_product_image}.jpg\" alt=\"\"/>";

    $this->m_content_builder .= '</div>';
    $this->m_content_builder .= '</a>';
    $this->m_content_builder .= '<figcaption class="offset-top-24">';
    $this->m_content_builder .= ' <div style="line-height:0.5">';
    $this->m_content_builder .= '<h4 class="thumbnail-title">';
    $this->m_content_builder .= ucwords(
        preg_replace(
            '/\-/', ' ', $this->_m_product_info
        )
    );
    $this->m_content_builder .= '</h4>';
    $this->m_content_builder .= '<p>';
    $this->m_content_builder .= ucwords(
        preg_replace(
            '/\-/', ' ', $this->_m_product_desc
        )
    );
    $this->m_content_builder .= '</p>';
    $this->m_content_builder .= '<p>';
    $this->m_content_builder .= 'Model Year: '.$this->m_product_model_year;
    $this->m_content_builder .= '</p>';
    $this->m_content_builder .= '<p>';
    $this->m_content_builder .= 'Price: £'.$this->m_product_price;
    $this->m_content_builder .= '</p>';
    $this->m_content_builder .= ' </div>';
    $this->m_content_builder .= '<p class="thumbnail-terry-desc offset-top-0">';
    $this->m_content_builder .= ' </p>';
    $this->m_content_builder .= '<a class="btn offset-top-10 offset-md-top-0 btn-wheelies text-white"';
    $this->m_content_builder .= 'href="';
    $this->m_content_builder .= strtolower(preg_replace('/\s/', '-', $this->_m_featured_product_link));
    $this->m_content_builder .= '"';
    $this->m_content_builder .= '>';
    $this->m_content_builder .= 'view product';
    $this->m_content_builder .= '</a>';
    $this->m_content_builder .= '</figcaption>';
    $this->m_content_builder .= '</figure>';
    $this->m_content_builder .= '</div>';
    $this->m_content_builder .= '</div>';
    $this->m_content_builder .= '</div>';
    $this->m_content_builder .= '<!--Carousel item ends here-->';
}

$this->m_content_builder .= '</>';
$this->m_content_builder .= '<!--Carousel wrapper ends-->';
$this->m_content_builder .= ' </section>';
$this->m_content_builder .= '<!--End of section tag-->';
