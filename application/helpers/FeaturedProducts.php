<?php
/**
 * This is a DocBlock.
 *
 * @category Description
 *
 * @author Adedayo Adedapo <deewan0984@gmial.com>
 * @license MIT blah.com
 *
 * @see http://url.com
 */

/**
 * Undocumented class.
 */
class FeaturedProducts extends Controller
{
    private $_m_product_name;
    private $_m_product_model_name;
    private $_m_product_info;
    private $_m_product_image;
    private $_m_product_price;
    private $_m_product_model_year;
    private $_m_featured_products;
    private $_m_featured_product_link;
    public $m_loaded_model;

    /**
     * Undocumented function.
     */
    public function __construct()
    {
        $this->m_model = 'ProductsModel';
        $this->m_loaded_model = $this->ModelLoader();
        $this->_m_featured_product_link = 'hello/world';
    }

    /**
     * [getFeaturedProduct description].
     *
     * @return [type] [return description]
     */
    private function getFeaturedProduct()
    {
        $all_featured_products = $this->m_loaded_model->getFeaturedProducts();
        $this->m_debugger = $this->Dumper($all_featured_products);
        $this->m_debugger = $this->Dumper($this->_m_featured_product_link);

        return $all_featured_products;
    }

    /**
     * [ModelLoader description].
     *
     * @return [type] [return description]
     */
    protected function ModelLoader()
    {
        $m_data = $this->LoadModel($this->m_model);

        return $m_data;
    }

    public function featuredProductsView()
    {
        $this->m_featured_products = $this->getFeaturedProduct();
        require_once VIEWS.'templates/layouts/featured-products-layout.php';

        return $this->m_content_builder;
    }
}
