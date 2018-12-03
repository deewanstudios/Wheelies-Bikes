<?php
/**
 * This is the product enquiry file. This file deals with with all implementations of member variable and methods required for product enquiry by the user to be sent to the owner of the business.
 * PHP version PHP 7.2.1
 *
 * @category Website
 * @package  WheeliesBikes_Product_Enquiry_File
 * @author   Adedayo Adedapo <ade.adedapo9@gmail.com>
 * @license  DeewanstudiosLTD deewanstudios.com
 * @link     http://url.com
 */

// namespace controllers;

/**
 * Product Enquiry class
 * This class deals with retrieving and setting product enquiry information
 *
 * @category Wheelies_Product_Enquiry_Class
 * @package  WheeliesBikes
 * @author   Adedayo Adedapo <ade.adedapo9@gmail.com>
 * @license  DeewanstudiosLTD deewanstudios.com
 * @link     http://url.com
 */

class ProductEnquiry extends Controller
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->m_model = 'AboutModel';
    }

    /**
     * _enquirySummary
     *
     * @return void
     */
    private function _enquirySummary()
    {
        $test_content = "Hello from enquiry summary method";
        include_once VIEWS . 'templates/layouts/product-enquiry-details.php';
        return $this->m_content_builder;
    }

    /**
     * _enquiryFormView
     *
     * @return void
     */
    private function _enquiryFormView()
    {
        include_once VIEWS . 'templates/layouts/forms/product-enquiry-customer-form.php';
        return $this->m_content_builder;
    }

    /**
     * _pageContent
     *
     * @return void
     */
    private function _pageContent()
    {
        return (
            array(
                $this->_enquirySummary(),
                $this->_enquiryFormView(),
            )
        );
    }

    /**
     * _mainContentDiv
     *
     * @return void
     */
    private function _mainContentDiv()
    {
        if (method_exists($this, '_pageContent')) {
            // $this->m_main_content = $this->PageBanners($this->m_page_id);
            $this->m_main_content .= "<main class=\"page-content\">";

            foreach ($this->_pageContent() as $m_page_element) {
                $this->m_main_content .= $m_page_element;
            }
            /*             $this->m_main_content .= $this->ParallaxSectionMaker($this->m_page_id); */

            $this->m_main_content .= "</main>";

            return $this->m_main_content;

        } else {

            $this->m_main_content = "<main class=\"page-content\">";

            $this->m_main_content .= "<section class=\"section-98 section-sm-110\">";
            $this->m_main_content .= "<div class=\"shell\">";
            $this->m_main_content .= "<div class=\"range range-xs-center text-extra-big\">";

            $this->m_main_content .= "There is currently no body content to display";

            $this->m_main_content .= "</div>";
            $this->m_main_content .= "</div>";
            $this->m_main_content .= "</section>";

            $this->m_main_content .= "</main>";
            return $this->m_main_content;
        }

    }

    /**
     * Index method to display page content
     *
     * @return void
     */
    public function index()
    {
        include_once '../application/views/templates/core/header.php';
        include_once '../application/views/enquiry/product-enquiry.php';
        include_once '../application/views/templates/core/footer.php';
    }
}
