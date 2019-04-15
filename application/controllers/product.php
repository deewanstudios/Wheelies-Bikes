<?php

class Product extends Controller
{
    private $m_product_id;
    private $m_product_name;
    private $m_product_model;
    private $m_product_description;
    private $m_product_images;
    private $m_main_product_image;
    private $m_product_price;
    protected $m_product_image_directory = PRODUCTIMAGES;
    private $m_product_array;
    private $m_product_brand;
    private $m_product_gender;
    protected $m_tags_length;
    private $m_url_parts;
    private $_untouched;

    public function __construct(array $tags)
    {
        parent::__construct();
        $this->m_model = 'ProductsModel';
        $this->m_loaded_model = $this->ModelLoader();
        $this->m_tags = $tags;
        $this->_untouched = $tags;

        if (isset($this->m_tags)) {
            $this->m_tags = array_filter($this->m_tags);
            $this->m_tags_length = count($this->m_tags);
        }

        /* if (isset($this->_untouched) && in_array('enquire', $this->_untouched)) {
        $this->enquire($this->_untouched);
        } */

        // var_dump($this->_untouched);
        // var_dump($this->m_tags);
        // var_dump($this->m_tags_length);
    }

    public function ModelLoader()
    {
        $m_data = $this->LoadModel($this->m_model);

        return $m_data;
    }

    private function getProduct()
    {
        if (isset($this->m_tags) && $this->m_tags_length > 3 && !in_array('enquire', $this->m_tags)) {
            // var_dump($this->m_tags);
            $this->m_product_gender = $this->m_tags[1];
            $this->m_url_parts = $this->m_tags = array_slice($this->m_tags, -2);
            // var_dump($this->m_url_parts);
            $this->m_tags_length = count($this->m_url_parts);
            /*
            Extrapolate included parts of the url to properly set the member variables for the product, i.e brand, name and model etc.
             */
            if (2 === $this->m_tags_length) {
                /* Extracting product model information by setting it to the value of the first indexed element in the url parts array */
                // var_dump($this->m_tags);
                if (strpos($this->m_url_parts[0], '-') !== false) {
                    // Stripping the value of the product brand of the hyphen character and replacing it with a space.
                    $this->m_product_brand = str_replace('-', ' ', $this->m_url_parts[0]);
                } else {
                    // Simply setting the brand to the value of url parts first element
                    $this->m_product_brand = $this->m_url_parts[0];
                }

                // Checking if the second element in the url parts array has an hyphen in it
                if (strpos($this->m_url_parts[1], '-') !== false) {
                    // If the value does have an hyphen in it. Explode it using the hyphens and store the result as an array called product array.
                    $this->m_product_array = explode('-', $this->m_url_parts[1]);

                    // Count the number of array elements produced from the explosion of the second element of the url parts array
                    $this->m_tags_length = count($this->m_product_array);

                    if (2 === $this->m_tags_length) {
                        // code...
                        // $this->m_debugger = $this->Dumper("Product array tags length is : " . $this->m_tags_length);

                        $this->m_product_name = $this->m_product_array[0];
                        $this->m_product_model = $this->m_product_array[1];
                    } elseif (3 === $this->m_tags_length) {
                        // code...
                        // $this->m_debugger = $this->Dumper("Product array tags length is : " . $this->m_tags_length);

                        $this->m_product_name = $this->m_product_array[0];
                        $this->m_product_name .= ' ';
                        $this->m_product_name .= $this->m_product_array[1];
                        $this->m_product_model = $this->m_product_array[2];
                    } elseif (4 === $this->m_tags_length) {
                        // code...
                        // $this->m_debugger = $this->Dumper("Product array tags length is : " . $this->m_tags_length);

                        $this->m_product_name = $this->m_product_array[0];
                        $this->m_product_name .= ' ';
                        $this->m_product_name .= $this->m_product_array[1];
                        $this->m_product_name .= ' ';
                        $this->m_product_name .= $this->m_product_array[2];
                        $this->m_product_model = $this->m_product_array[3];
                    } elseif (5 === $this->m_tags_length) {
                        $this->m_product_name = $this->m_product_array[0];
                        $this->m_product_name .= ' ';
                        $this->m_product_name .= $this->m_product_array[1];
                        $this->m_product_name .= ' ';
                        $this->m_product_name .= $this->m_product_array[2];
                        $this->m_product_model = $this->m_product_array[3];
                        $this->m_product_model .= ' ';
                        $this->m_product_model .= $this->m_product_array[4];
                    }
                } else {
                    $this->m_product_name = $this->m_url_parts[1];
                }
            } else {
                // What happens, if length of tags is not equals to 2
                // Throw an Exception of invalid product parameters
                // This else statement is currently not been reached. Maybe it's not needed.
                // Since I'm already checking if the number of tags supplied is greater than 3.
            }
        } else {
            // Throw an Exception of invalid product parameters
            // Change this to a proper exception and load a 404 or something like that.

            if (isset($this->_untouched) && in_array('enquire', $this->_untouched)) {
                $enquire = new Enquire($this->_untouched);
                return $enquire->index();
            } else {
                echo 'Invalid URL supplied from this node';
            }
        }
        $this->m_product_array = $this->m_loaded_model->GetSingleProducts(str_replace(' ', '-', $this->m_product_brand), $this->m_product_name, $this->m_product_model, $this->m_product_gender);

        foreach ($this->m_product_array as $this->m_product) {
            $this->m_product_id = $this->m_product['product_id'];
            // var_dump($this->m_product_array);
            $this->m_product_description = $this->m_product['product_description'];
            $this->m_product_price = $this->m_product['product_price_value'];
        }
        $this->m_product_images = $this->m_loaded_model->AllProductsImages($this->m_product_id);
        $this->m_main_product_image = $this->m_loaded_model->GetSingleProductImage($this->m_product_id);
        foreach ($this->m_main_product_image as $m_single_image) {
            $image_name = $m_single_image['image_name'];
            $image_desc = $m_single_image['image_description'];
            $image_caption = $m_single_image['image_caption'];
            $image_path = $m_single_image['image_path'];
        }
        $specs = $this->productSpecification($this->m_product_id);
        foreach ($specs[0] as $spec_heading => $product_specification) {
            $parts = str_replace('_', ' ', $spec_heading);
        }
        include_once VIEWS . 'templates/layouts/single-product-view-layout.php';

        return $this->m_content_builder;
    }

    private function productSpecification($m_product_id)
    {
        return $this->m_loaded_model->getProductSpecification($m_product_id);
    }

    private function pageContent()
    {
        return array($this->getProduct());
    }

    /**
     * _mainContentDiv.
     */
    private function _mainContentDiv()
    {
        if (method_exists($this, 'pageContent')) {
            // $this->m_main_content = $this->PageBanners($this->m_page_id);
            $this->m_main_content = '<main class="page-content">';
            // page-min-height
            $this->m_main_content .= '<section class="section-50 section-sm-top-30 text-left">';
            $this->m_main_content .= '<div class="shell">';
            foreach ($this->pageContent() as $m_page_element) {
                $this->m_main_content .= $m_page_element;
            }
            $this->m_main_content .= '</div>';
            $this->m_main_content .= '</section>';
            $this->m_main_content .= '</main>';

            return $this->m_main_content;
        } else {
            // $this->m_main_content = $this->PageBanners($this->m_page_id);
            $this->m_main_content = '<main class="page-content page-min-height">';

            $this->m_main_content .= '<section class="section-50 section-sm-top-30 section-sm-bottom-98 text-left">';
            $this->m_main_content .= '<div class="shell text-center text-ubold text-size-2 text-italic section-50">';
            $this->m_main_content .= '<h1>';
            $this->m_main_content .= 'There is currently no body content to display';
            $this->m_main_content .= '</h1>';
            $this->m_main_content .= '</div>';
            $this->m_main_content .= '</section>';
            $this->m_main_content .= '</main>';

            return $this->m_main_content;
        }
    }

    /**
     * _enquiryLink.
     */
    private function _enquiryLink()
    {
        foreach ($this->m_product_array as $product_prop) {
            $this->m_product_category = $product_prop['product_cat_name'];
            $this->m_bike_cat = $product_prop['bike_cat_name'];
        }
        $link_part = $this->m_product_category;
        $link_part .= '/';
        $link_part .= $this->m_product_gender;
        $link_part .= '/';
        $link_part .= $this->m_bike_cat;
        $link_part .= '/';
        $link_part .= $this->m_product_brand;
        $link_part .= '/';
        $link_part .= $this->m_product_name;
        $link_part .= ' ';
        $link_part .= $this->m_product_model;
        return $link_part;

    }

    /**
     * Index.
     */
    public function index()
    {
        include_once VIEWS . 'templates/core/header.php';
        include_once VIEWS . 'products/products-list.php';
        // include_once VIEWS.'templates/core/footer.php';
    }
}
