<?php
/**
 * This is a DocBlock.
 *
 * @category Description
 *
 * @author  Adedayo Adedapo <deewan0984@gmial.com>
 * @license MIT blah.com
 *
 * @see http://blah.com
 * @see http://url.com
 */
foreach ($this->_m_featured_products as $featured_product) {
    // Instantiation of member properties
    $this->_m_featured_product_cat_name = $featured_product['product_cat_name'];
    $this->_m_featured_product_gender_name = $featured_product['gender_cat_name'];
    $this->_m_featured_product_type = $featured_product['bike_cat_name'];
    $this->_m_featured_product_brand_name = $featured_product['brand_cat_name'];
    $this->_m_featured_product_name = $featured_product['product_name'];
    $this->_m_featured_product_model = $featured_product['product_model'];
    $this->_m_featured_product_model_year = $featured_product['model_year'];
    $this->_m_featured_product_price = $featured_product['product_price_value'];
    $this->_m_featured_product_image = $featured_product['image_path'];

    // product link
    $this->_m_featured_product_link = $this->_m_featured_product_cat_name;
    $this->_m_featured_product_link .= '/';
    $this->_m_featured_product_link .= $this->_m_featured_product_gender_name;
    $this->_m_featured_product_link .= '/';
    $this->_m_featured_product_link .= $this->_m_featured_product_type;
    $this->_m_featured_product_link .= '/';
    $this->_m_featured_product_link .= $this->_m_featured_product_brand_name;
    $this->_m_featured_product_link .= '/';
    $this->_m_featured_product_link .= $this->_m_featured_product_name;
    if ($featured_product['product_model'] !== null) {
        $this->_m_featured_product_link .= ' ';
        $this->_m_featured_product_link .= $this->_m_featured_product_model;
    }

    /*     var_dump(
            strtolower(
                preg_replace(
                    '/\s/', '-', $this->_m_featured_product_link
                )
            )
        ); */
    // product info
    $this->_m_product_info = $this->_m_featured_product_brand_name;

    $this->m_content_builder .= '<!--Carousel item starts here-->';
    $this->m_content_builder .= '<div>';
    $this->m_content_builder .= '<div class="range range-xs-center">';
    $this->m_content_builder .= '<div class="cell-xs-8 cell-sm-6 cell-md-12">';
    $this->m_content_builder .= '<!-- Featured Product Thumbnail-->';
    $this->m_content_builder .= '<figure class=" thumbnail-border-none">';
    $this->m_content_builder .= '<a ';
    $this->m_content_builder .= 'href="';
    $this->m_content_builder .= strtolower(preg_replace('/\s/', '-', $this->_m_featured_product_link));
    $this->m_content_builder .= '"';
    $this->m_content_builder .= '>';

    $this->m_content_builder .= '<div class="thumbnail-featured-product">';
    $this->m_content_builder .= '<img width="100%" height="auto"';
    $this->m_content_builder .= "src=\"{$this->m_image_directory}";
    $this->m_content_builder .= 'products-images/';
    $this->m_content_builder .= $this->_m_featured_product_image.'.jpg" alt=""/>';
    // $this->m_content_builder .= 'products-images/$this->_m_featured_product_image.jpg" alt=""/>';
    $this->m_content_builder .= '</div>';
    $this->m_content_builder .= '</a>';
    $this->m_content_builder .= '<figcaption class="offset-top-24">';
    $this->m_content_builder .= ' <div style="line-height:0.5">';
    $this->m_content_builder .= '<h4 class="thumbnail-title">';
    $this->m_content_builder .= ucwords($this->_m_product_info);
    $this->m_content_builder .= '</h4>';
    $this->m_content_builder .= '<p>';
    // $this->m_content_builder .= ucwords($this->_productDescription());
    $this->m_content_builder .= '</p>';
    $this->m_content_builder .= '<p>';
    // $this->m_content_builder .= 'Model Year: '.$year;
    $this->m_content_builder .= '</p>';
    $this->m_content_builder .= '<p>';
    // $this->m_content_builder .= 'Price: Â£'.$price;
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
// Iteration of available featured products ends here
