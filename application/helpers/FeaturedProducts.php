<?php
/**
 * This is a DocBlock.
 *
 * @category Description
 *
 * @author  Adedayo Adedapo <deewan0984@gmial.com>
 * @license MIT blah.com
 *
 * @see http://url.com
 */

/**
 * Undocumented class.
 */
class FeaturedProducts extends Controller
{
    public $m_loaded_model;

    private $_m_featured_product_cat_name;
    private $_m_featured_product_brand_name;
    private $_m_featured_product_gender_name;
    private $_m_featured_product_type;
    private $_m_featured_product_name;
    private $_m_featured_product_model_name;
    private $_m_featured_product_model_year;
    private $_m_featured_product_price;
    private $_m_featured_product_image;

    private $_m_product_info;
    private $_m_product_desc;

    private $_m_featured_products;
    private $_m_featured_product_link;


    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->m_model                  = 'ProductsModel';
        $this->m_loaded_model           = $this->ModelLoader();
        $this->_m_featured_product_link = 'hello/world';
    }

    /**
     * [getFeaturedProduct description].
     *
     * @return [type] [return description]
     */
    private function _getFeaturedProduct()
    {
        $all_featured_products = $this->m_loaded_model->getFeaturedProducts();
        return $all_featured_products;
    }

    /**
     * [ModelLoader description].
     *
     * @return [type] [return description]
     */
    protected function modelLoader()
    {
        $m_data = $this->LoadModel($this->m_model);

        return $m_data;
    }
    /**
     * [featuredProductsView description]
     *
     * @return [type]  [return description]
     */
    public function featuredProductsView()
    {
        $this->m_featured_products = $this->_getFeaturedProduct();
        include_once VIEWS . 'templates/layouts/featured-products-layout.php';
        return $this->m_content_builder;
    }
}
