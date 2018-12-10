<?php
/**
 * This is the product enquiry file. This file deals with with all implementations of member variable and methods required for product enquiry by the user to be sent to the owner of the business.
 * PHP version PHP 7.2.1.
 *
 * @category Website
 *
 * @author   Adedayo Adedapo <ade.adedapo9@gmail.com>
 * @license  DeewanstudiosLTD deewanstudios.com
 *
 * @see     http://url.com
 */

// namespace controllers;

/**
 * Product Enquiry class
 * This class deals with retrieving and setting product enquiry information.
 *
 * @category Wheelies_Enquire_Class
 *
 * @author   Adedayo Adedapo <ade.adedapo9@gmail.com>
 * @license  DeewanstudiosLTD deewanstudios.com
 *
 * @see     http://url.com
 */
class Enquire extends Controller
{
    private $_product_image_directory = null;
    protected $m_tags;
    protected $m_product_info = array();
    private $_m_enquired_product_cat_name;
    private $_m_enquired_product_gender;
    private $_m_enquired_product_cat_type;
    private $_m_enquired_product_brand;
    private $_m_enquired_product_name;
    private $_m_enquired_product_model;
    private $_m_enquired_product_price;

    /**
     * __construct.
     */
    public function __construct(array $product_info)
    {
        parent::__construct();
        $this->_product_image_directory = PRODUCTIMAGES;
        $this->m_product_info = $product_info;
        if (isset($this->m_product_info) && !null == ($this->m_product_info)) {
            array_shift($this->m_product_info);
            $this->_m_enquired_product_cat_name = $this->m_product_info[0];
            $this->_m_enquired_product_gender = $this->m_product_info[1];
            $this->_m_enquired_product_cat_type = $this->m_product_info[2];
            $this->_m_enquired_product_brand = $this->m_product_info[3];
            $product_info_counter = count(explode('-', $this->m_product_info[4]));
            if ($product_info_counter > 2) {
                // var_dump(true);
                $convert_to_array = explode('-', $this->m_product_info[4]);
                if (5 === $product_info_counter) {
                    // code...
                    // var_dump($convert_to_array);
                    $this->_m_enquired_product_name = $convert_to_array[0].' '.$convert_to_array[1].' '.$convert_to_array[2];
                    $this->_m_enquired_product_model = $convert_to_array[3].' '.$convert_to_array[4];
                } elseif (4 === $product_info_counter) {
                    // var_dump($convert_to_array);
                    $this->_m_enquired_product_name = $convert_to_array[0].' '.$convert_to_array[1].' '.$convert_to_array[2];
                    $this->_m_enquired_product_model = $convert_to_array[3];
                } elseif (3 === $product_info_counter) {
                    // var_dump($convert_to_array);
                    $this->_m_enquired_product_name = $convert_to_array[0].' '.$convert_to_array[1];
                    $this->_m_enquired_product_model = $convert_to_array[2];
                }
            } else {
                // var_dump(false);
                if ($product_info_counter < 2) {
                    // code...
                    // var_dump(wordwrap('Not enough parameters supplied to make the enquiry. There is currently '.$product_info_counter.' parameter(s) supplied', 55));
                    // var_dump(wordwrap('The product you are trying to enquire for does not exist on this site', 55));
                } else {
                    // code...
                    $convert_to_array = explode('-', $this->m_product_info[4]);
                    // var_dump($convert_to_array);
                    $this->_m_enquired_product_name = $convert_to_array[0];
                    if (!null == $convert_to_array[1]) {
                        // code...
                        $this->_m_enquired_product_model = $convert_to_array[1];
                    }
                }
            }
            // $this->_m_enquired_product_name = (explode('-', $this->m_product_info[4])[0]);
            // $this->_m_enquired_product_model = (explode('-', $this->m_product_info[4])[1]);
        }
    }

    /**
     * Get the value of _m_enquired_product_cat_name.
     *
     * @return self
     */
    public function getEnquiredProductCatName()
    {
        return $this->_m_enquired_product_cat_name;
    }

    /**
     * Get the value of _m_enquired_product_gender.
     *
     * @return self
     */
    public function getEnquiredProductGender()
    {
        return $this->_m_enquired_product_gender;
    }

    /**
     * Get the value of _m_enquired_product_cat_type.
     *
     * @return self
     */
    public function getEnquiredProductCatType()
    {
        return $this->_m_enquired_product_cat_type;
    }

    /**
     * Get the value of _m_enquired_product_brand.
     *
     * @return self
     */
    public function getEnquiredProductBrand()
    {
        return $this->_m_enquired_product_brand;
    }

    /**
     * Get the value of _m_enquired_product_name.
     *
     * @return self
     */
    public function getEnquiredProductName()
    {
        return $this->_m_enquired_product_name;
    }

    /**
     * Get the value of _m_enquired_product_model.
     *
     * @return self
     */
    public function getEnquiredProductModel()
    {
        return $this->_m_enquired_product_model;
    }

    /**
     * Get the value of _m_enquired_product_price.
     *
     * @return self
     */
    public function getEnquiredProductPrice()
    {
        return $this->_m_enquired_product_price;
    }

    /**
     * _enquirySummary.
     */
    private function _enquirySummary()
    {
        include_once VIEWS.'templates/layouts/product-enquiry-details.php';

        return $this->m_content_builder;
    }

    /**
     * _enquiryFormView.
     */
    private function _enquiryFormView()
    {
        include_once VIEWS.'templates/layouts/forms/product-enquiry-customer-form.php';

        return $this->m_content_builder;
    }

    /**
     * _pageContent.
     */
    private function _pageContent()
    {
        return
        array(
            $this->_enquirySummary(),
            $this->_enquiryFormView(),
        )
        ;
    }

    /**
     * _mainContentDiv.
     */
    private function _mainContentDiv()
    {
        if (method_exists($this, '_pageContent')) {
            // $this->m_main_content = $this->PageBanners($this->m_page_id);
            $this->m_main_content .= '<main class="page-content">';

            foreach ($this->_pageContent() as $m_page_element) {
                $this->m_main_content .= $m_page_element;
            }
            /*             $this->m_main_content .= $this->ParallaxSectionMaker($this->m_page_id); */

            $this->m_main_content .= '</main>';

            return $this->m_main_content;
        } else {
            $this->m_main_content = '<main class="page-content">';

            $this->m_main_content .= '<section class="section-98 section-sm-110">';
            $this->m_main_content .= '<div class="shell">';
            $this->m_main_content .= '<div class="range range-xs-center text-extra-big">';

            $this->m_main_content .= 'There is currently no body content to display';

            $this->m_main_content .= '</div>';
            $this->m_main_content .= '</div>';
            $this->m_main_content .= '</section>';

            $this->m_main_content .= '</main>';

            return $this->m_main_content;
        }
    }

    /**
     * Index method to display page content.
     */
    public function index()
    {
        include_once '../application/views/enquiry/product-enquiry.php';
    }
}
