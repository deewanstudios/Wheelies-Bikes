<?php

/**
 * Product Enquiry class file.
 *
 * This is the product enquiry file. This file deals with with all implementations of member variable and methods required for product enquiry by the user to be sent to the owner of the business.
 * PHP version PHP 7.2.1.
 *
 * @category Website
 *
 * @author  Adedayo Adedapo <ade.adedapo9@gmail.com>
 * @license DeewanstudiosLTD deewanstudios.com
 *
 * @see http://url.com
 */

// namespace controllers;

/**
 * Product Enquiry class
 * This class deals with retrieving and setting product enquiry information.
 *
 * @category Wheelies_Enquire_Class
 *
 * @author  Adedayo Adedapo <ade.adedapo9@gmail.com>
 * @license DeewanstudiosLTD deewanstudios.com
 *
 * @see http://url.com
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
    private $_m_enquired_product_id;
    private $_m_enquired_product_name;
    private $_m_enquired_product_model;
    private $_m_enquired_product_price;
    private $_m_enquired_product_image;

    /**
     * __construct.
     */
    public function __construct(array $product_info)
    {
        parent::__construct();
        $this->m_model = 'ProductsModel';
        $this->m_loaded_model = $this->modelLoader();
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

                $convert_to_array = explode('-', $this->m_product_info[4]);
                if (5 === $product_info_counter) {
                    // if statement expressions
                    $this->_m_enquired_product_name = $convert_to_array[0] . ' '
                        . $convert_to_array[1] . ' ' . $convert_to_array[2];
                    $this->_m_enquired_product_model = $convert_to_array[3] . ' '
                        . $convert_to_array[4];
                } elseif (4 === $product_info_counter) {
                    $this->_m_enquired_product_name = $convert_to_array[0] . ' '
                        . $convert_to_array[1] . ' ' . $convert_to_array[2];
                    $this->_m_enquired_product_model = $convert_to_array[3];
                } elseif (3 === $product_info_counter) {
                    $this->_m_enquired_product_name = $convert_to_array[0] . ' '
                        . $convert_to_array[1];
                    $this->_m_enquired_product_model = $convert_to_array[2];
                }
            } elseif (2 === $product_info_counter) {
                $convert_to_array = explode('-', $this->m_product_info[4]);
                $this->_m_enquired_product_name = $convert_to_array[0];
                $this->_m_enquired_product_model = $convert_to_array[1];
            } else {
                /* Insert Error message here, when no product name and model is not supplied or valid */
            }
        }
    }

    /**
     * ModelLoader.
     */
    public function modelLoader()
    {
        $m_data = $this->LoadModel($this->m_model);

        return $m_data;
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
     * Get the value of _m_enquired_product_id.
     *
     * @return int _m_enquired_product_id
     */
    public function getEnquiredProductId()
    {
        $this->_m_enquired_product_id = $this->m_loaded_model->getProductId($this->_m_enquired_product_name, $this->_m_enquired_product_model);
        foreach ($this->_m_enquired_product_id as $value) {
            // foreach statement expression
            $this->_m_enquired_product_id = $value['product_id'];
        }
        return $this->_m_enquired_product_id;
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
        $this->_m_enquired_product_price = $this->m_loaded_model->getProductPrice($this->getEnquiredProductId());
        foreach ($this->_m_enquired_product_price as $value) {
            // foreach statement expression
            $this->_m_enquired_product_price = $value['product_price_value'];
        }

        return $this->_m_enquired_product_price;
    }

    /**
     * Get the value of _m_enquired_product_image.
     */
    public function getEnquiredProductImage()
    {
        $this->_m_enquired_product_image = $this->m_loaded_model->getProductMainImage($this->_m_enquired_product_id);

        return $this->_m_enquired_product_image;
    }

    /**
     * _enquirySummary.
     */
    private function _enquirySummary()
    {
        // $this->getEnquiredProductId();
        $brand = $this->getEnquiredProductBrand();
        $product = $this->getEnquiredProductName();
        $model = $this->getEnquiredProductModel();
        $price = $this->getEnquiredProductPrice();
        $image = $this->getEnquiredProductImage();
        foreach ($image as $product_image_prop) {
            if (!null == $product_image_prop['image_name']) {
                // code...
                $image_name = $product_image_prop['image_name'];
            } else {
                // code...
                $image_name = 'image name goes here';
            }
            if (!null == $product_image_prop['image_description']) {
                // code...
                $image_description = $product_image_prop['image_description'];
            } else {
                // code...
                $image_description = 'image description goes here';
            }
            if (!null == $product_image_prop['image_caption']) {
                // code...
                $image_caption = $product_image_prop['image_caption'];
            } else {
                // code...
                $image_caption = 'image caption goes here';
            }
            if (!null == $product_image_prop['image_path']) {
                // code...
                $image_path = $this->_product_image_directory . $product_image_prop['image_path'];
            } else {
                // code...
                $image_path = 'https://via.placeholder.com/570';
            }
        }

        include_once VIEWS . 'templates/layouts/product-enquiry-details.php';

        return $this->m_content_builder;
    }

    /**
     * _enquiryFormView.
     */
    private function _enquiryFormView()
    {
        include_once VIEWS . 'templates/layouts/forms/product-enquiry-customer-form.php';
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
            $this->m_main_content = '<main class="page-content">';

            foreach ($this->_pageContent() as $m_page_element) {
                $this->m_main_content .= $m_page_element;
            }
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
        if (isset($_POST['enquiry-submit'])) {
            // code...
            $this->_enquiryInputProcessor();
        }
        include_once '../application/views/enquiry/product-enquiry.php';
    }

    // Form fields variable
    private $_enquiry_form_first_name;
    private $_enquiry_form_last_name;
    private $_enquiry_form_phone_number;
    private $_enquiry_form_email_address;
    private $_enquiry_form_message;
    // Form fields error variables
    private $_enquiry_form_first_name_error;
    private $_enquiry_form_last_name_error;
    private $_enquiry_form_phone_number_error;
    private $_enquiry_form_email_address_error;
    private $_valid = false;

    /**
     * _enquiryFormProcessor.
     *
     * @return self
     */
    private function _enquiryInputProcessor()
    {
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            /*
             *Check if the server request method is post
             *If so start validating data from the form
             */
            if (empty($_POST['first-name'])) {
                /*
                 * Check if the first name field is empty
                 * If so set the enquiry_form_first_name_error variable
                 */
                $this->_enquiry_form_first_name_error = '* Please enter your first name';
            } else {
                /*
                 * Otherwise set the _enquiry_form_first_name variable
                 * to the value of the posted first-name input field
                 */
                $this->_enquiry_form_first_name = $_POST['first-name'];
                $_SESSION['first-name'] = $this->_enquiry_form_first_name;

            }
            if (empty($_POST['last-name'])) {
                /*
                 * Check if the last name field is empty
                 * If so set the enquiry_form_last_name_error variable
                 */
                $this->_enquiry_form_last_name_error = '* Please enter your last name';
            } else {
                /*
                 * Otherwise set the _enquiry_form_last_name variable
                 * to the value of the posted last-name input field
                 */
                $this->_enquiry_form_last_name = $_POST['last-name'];
            }
            if (empty($_POST['phone-number'])) {
                /*
                 * Check if the last name field is empty
                 * If so set the enquiry_form_phone_number_error variable
                 */
                $this->_enquiry_form_phone_number_error = '* Please provide us your telephone number, so that we can have an alternative way of contacting you.';
            } else {
                /*
                 * Otherwise set the _enquiry_form_phone_number variable
                 * to the value of the posted phone-number input field
                 */
                $this->_enquiry_form_phone_number = $_POST['phone-number'];
            }
            if (empty($_POST['email-address'])) {
                /*
                 * Check if the last name field is empty
                 * If so set the enquiry_form_email_address_error variable
                 */
                $this->_enquiry_form_email_address_error = '* Please provide us with your telephone number, so that we can have an alternative way of contacting you, in order to provide a response to your enquiry.';
            } else {
                /*
                 * Otherwise set the _enquiry_form_email_address variable
                 * to the value of the posted email-address input field
                 */
                $this->_enquiry_form_email_address = $_POST['email-address'];
            }

            if (empty($_POST['additional-message'])) {
                /*
                 * Check if the additional message is empty
                 * If empty, set the the _enquiry_form_message variable to an empty string.
                 */
                $this->_enquiry_form_message = '';
            } else {
                /*
                 * Otherwise set the _enquiry_form_message variable
                 * to the value of the posted additional-message text area field
                 */
                $this->_enquiry_form_message = $_POST['additional-message'];
            }

            $this->_success();
        }
    }

    /**
     * _confirmation
     *
     * @return void
     */
    private function _confirmation()
    {
        $type = 'Enquiry';

        $message = 'Thanks for taking the time to contact us.
        Your enquiry has been sent to the appropriate team.' . BR .
            'We will get back to you as soon as possible with an update on your product enquiry.';

        $confirmation = new Confirmation(
            $type, $message, $this->_enquiry_form_first_name
        );
        return $confirmation->index();
    }

    /**
     * _sendMailToSiteOwner
     *
     * @return void
     */
    private function _sendMailToSiteOwner()
    {
        $brand = $this->getEnquiredProductBrand();
        $product = $this->getEnquiredProductName();
        $model = $this->getEnquiredProductModel();
        $price = $this->getEnquiredProductPrice();
        $image = $this->getEnquiredProductImage();

        foreach ($image as $product_image_prop) {
            if (!null == $product_image_prop['image_name']) {
                // code...
                $image_name = $product_image_prop['image_name'];
            } else {
                // code...
                $image_name = 'image name goes here';
            }
            if (!null == $product_image_prop['image_description']) {
                // code...
                $image_description = $product_image_prop['image_description'];
            } else {
                // code...
                $image_description = 'image description goes here';
            }
            if (!null == $product_image_prop['image_caption']) {
                // code...
                $image_caption = $product_image_prop['image_caption'];
            } else {
                // code...
                $image_caption = 'image caption goes here';
            }
            if (!null == $product_image_prop['image_path']) {
                // code...
                $image_path = $this->_product_image_directory
                    . $product_image_prop['image_path'];
            } else {
                // code...
                $image_path = 'https://via.placeholder.com/570';
            }
        }

        $from = '<' . $this->_enquiry_form_email_address . '>';
        // $to = $this->_enquiry_form_email_address;
        $to = 'info@wheeliesbikes.co.uk';
        $subject = ('New Product Enquiry');
        include 'email/admin-email-layout.php';
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= ("From: $this->_enquiry_form_first_name $this->_enquiry_form_last_name"
            . $from . "\r\n");
        mail($to, $subject, $message, $headers);
    }

    /**
     * _sendMailToCustomer
     *
     * @return void
     */
    private function _sendMailToCustomer()
    {
        $brand = $this->getEnquiredProductBrand();
        $product = $this->getEnquiredProductName();
        $model = $this->getEnquiredProductModel();
        $price = $this->getEnquiredProductPrice();
        $image = $this->getEnquiredProductImage();

        foreach ($image as $product_image_prop) {
            if (!null == $product_image_prop['image_name']) {
                // code...
                $image_name = $product_image_prop['image_name'];
            } else {
                // code...
                $image_name = 'image name goes here';
            }
            if (!null == $product_image_prop['image_description']) {
                // code...
                $image_description = $product_image_prop['image_description'];
            } else {
                // code...
                $image_description = 'image description goes here';
            }
            if (!null == $product_image_prop['image_caption']) {
                // code...
                $image_caption = $product_image_prop['image_caption'];
            } else {
                // code...
                $image_caption = 'image caption goes here';
            }
            if (!null == $product_image_prop['image_path']) {
                // code...
                $image_path = $this->_product_image_directory .
                    $product_image_prop['image_path'];
            } else {
                // code...
                $image_path = 'https://via.placeholder.com/570';
            }
        }

        $from = '<info@wheeliesbike.co.uk>';
        $to = $this->_enquiry_form_email_address;
        $subject = ('Product Enquiry Confirmation');
        include 'email/email-layout.php';
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= ("From: Wheelies Bikes" . $from . "\r\n");
        mail($to, $subject, $message, $headers);
    }

    /**
     * _success
     *
     * @return void
     */
    private function _success()
    {
        if (($this->_enquiry_form_first_name) && ($this->_enquiry_form_last_name) && ($this->_enquiry_form_phone_number) && ($this->_enquiry_form_email_address)) {

            $insert = $this->m_loaded_model->insertEnquiry(
                $this->_enquiry_form_first_name . ' ' . $this->_enquiry_form_last_name, $this->_enquiry_form_phone_number,
                $this->_enquiry_form_email_address, $this->_enquiry_form_message
            );
            $admin_email = $this->_sendMailToSiteOwner();
            $customer_email = $this->_sendMailToCustomer();

            $this->_confirmation();
            exit;
            // All my problems, was because of the omission of the word above
        } else {
            echo '<strong>HELP!!! Something\'s gone horribly wrong...</strong>';
        }

    }
}
