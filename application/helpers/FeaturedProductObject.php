<?php
/**
 * This is a DocBlock.
 *
 * @category Description
 *
 * @author  Adedayo Adedapo <deewan0984@gmial.com>
 * @license I Don't Have One Yet blah.com
 *
 * @see http://url.com
 * @see  http://url.com
 */

/**
 * Undocumented class.
 */
class FeaturedProduct extends Controller
{
    /**
     * Undocumented variable.
     *
     * @var [type]
     */
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
    public $m_loaded_model;

    private $_m_featured_products;
    private $_m_featured_product_link;


    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->m_model = 'ProductsModel';
        $this->m_loaded_model = $this->ModelLoader();
        $this->_m_featured_product_link = 'hello/world';
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
     * [_getFeaturedProduct description].
     *
     * @return [type] [return description]
     */
    private function _getFeaturedProduct()
    {
        $all_featured_products = $this->m_loaded_model->getFeaturedProducts();

        return $all_featured_products;
    }

    /**
     * [_productCategory description].
     *
     * @return string [return description]
     */
    private function _productCategory()
    {
        return $this->_m_featured_product_cat_name;
    }

    /**
     * [_productBrandName description].
     *
     * @return string [return description]
     */
    private function _productBrandName()
    {
        // $this->_m_featured_product_brand_name = $brandName;
        if (strpos($this->_m_featured_product_brand_name, '-') !== false) {
            $this->_m_featured_product_brand_name = explode('-', $this->_m_featured_product_brand_name);
            $this->_m_featured_product_brand_name = strtoupper($this->_m_featured_product_brand_name[0] . ' ' . $this->_m_featured_product_brand_name[1]);
        }

        return $this->_m_featured_product_brand_name;
    }

    /**
     * [_productCategoryType description]
     *
     * @return  [type]  [return description]
     */
    private function _productCategoryType()
    {
        return $this->_m_featured_product_type;
    }

    /**
     * [_productGender description].
     *
     * @return string [return description]
     */
    private function _productGender()
    {
        return $this->_m_featured_product_gender_name;
    }

    /**
     * [_productName description].
     *
     * @return string [return description]
     */
    private function _productName()
    {
        return $this->_m_featured_product_name;
    }

    /**
     * [_productModel description].
     *
     * @return [type] [return description]
     */
    private function _productModel()
    {

        return $this->_m_featured_product_model_name;
    }

    /**
     * [_productModelYear description].
     *
     * @return [type] [return description]
     */
    private function _productModelYear()
    {
        return $this->_m_featured_product_model_year;
    }

    /**
     * [_productPrice description].
     *
     * @return [type] [return description]
     */
    private function _productPrice()
    {
        return $this->_m_featured_product_price;
    }

    /**
     * [_productImage description].
     *
     * @return [type] [return description]
     */
    private function _productImage()
    {
        return $this->_m_featured_product_image;
    }

    /**
     * [_productInfo description].
     *
     * @return string [return description]
     */
    private function _productInfo()
    {
        $this->_m_product_info = '';
        $this->_m_product_info = $this->_productBrandName();
        $this->_m_product_info .= ' ';
        $this->_m_product_info .= $this->_productName();
        $this->_m_product_info .= ' ';
        $this->_m_product_info .= $this->_productModel();

        return $this->_m_product_info;
    }

    /**
     * [_productDescription description].
     *
     * @return [type] [return description]
     */
    private function _productDescription()
    {
        $this->_m_product_desc = '';
        $this->_m_product_desc = $this->_productGender();
        $this->_m_product_desc .= ' ';
        $this->_m_product_desc .= $this->_productBrandName();
        $this->_m_product_desc .= ' ';
        $this->_m_product_desc .= $this->_productCategory();

        return $this->_m_product_desc;
    }

    /**
     * [_makeFeaturedProductLink description].
     *
     * @param [mixed] $all_featured_products [$all_featured_products description]
     *
     * @return [type] [return description]
     */
    private function _featuredProductLink()
    {
        $this->_m_featured_product_link = "";
        $this->_m_featured_product_link .= $this->_productCategory();
        $this->_m_featured_product_link .= "/";
        $this->_m_featured_product_link .= $this->_productGender();
        $this->_m_featured_product_link .= "/";
        $this->_m_featured_product_link .= $this->_productCategoryType();
        $this->_m_featured_product_link .= "/";
        $this->_m_featured_product_link .= $this->_productBrandName();
        $this->_m_featured_product_link .= "/";
        $this->_m_featured_product_link .= $this->_productName();
        if ($this->_productModel() !== null) {
            $this->_m_featured_product_link .= " ";
            $this->_m_featured_product_link .= $this->_productModel();
        }
        return $this->_m_featured_product_link;
    }

    /**
     * [featuredProductsView description].
     *
     * @return [type] [return description]
     */
    public function featuredProductsView()
    {
        $this->_m_featured_products = count($this->_getFeaturedProduct());
        $counter = 0;
        $year = $this->_productModelYear();
        $price = $this->_productPrice();
        $link = $this->_featuredProductLink();

        include_once VIEWS . 'templates/layouts/featured-products-layout.php';

        return $this->m_content_builder;
    }
}
