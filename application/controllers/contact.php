<?php
/**
 * Contact class file.
 *
 * This is the contact controller file. This file deals with
 * all implementations of member variable and methods required for contact controller to adequately collate and display the necessary information for the contact page.
 * PHP version PHP 7.2.1.
 *
 * @category Website
 *
 * @author  Adedayo Adedapo <ade.adedapo9@gmail.com>
 * @license DeewanstudiosLTD deewanstudios.com
 *
 * @see http://url.com
 */

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
class Contact extends Controller
{
    private $_sanitiser;
    private $_confirmation;
    private $_confirmation_type;
    private $_confirmation_message;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->m_model = 'ContactModel';
        $this->m_page_id = 5;
    }

    /**
     * ModelLoader
     *
     * @return void
     */
    protected function modelLoader()
    {
        $m_data = $this->loadModel($this->m_model);

        return $m_data;
    }

    /**
     * BusinessInformationSection
     *
     * @return void
     */
    private function _businessInformationSection()
    {
        $m_business_information = $this->m_loaded_model->GetBusinessInfo();
        foreach ($m_business_information as $m_wheelies_information) {
            $m_wheelies_phone_number = $m_wheelies_information['business_telephone'];
            $m_wheelies_email = $m_wheelies_information['business_email'];
            $m_wheelies_address = $m_wheelies_information['building_number'] . ', ';
            $m_wheelies_address .= ucwords($m_wheelies_information['street_name']) . BR;
            $m_wheelies_address .= ucwords($m_wheelies_information['town_name']) . ', ';
            $m_wheelies_address .= ucwords($m_wheelies_information['county_name']) . BR;
            $m_wheelies_address .= strtoupper($m_wheelies_information['business_postcode']);
        }

        include_once '../application/views/templates/layouts/contact-information-section-layout.php';

        return $this->m_content_builder;
    }

    /**
     * FormSection
     *
     * @return void
     */
    private function _formSection()
    {
        include_once TEMPLATES . 'layouts/contact-form-section-layout.php';
        return array($this->m_content_builder);
    }

    /**
     * MapSection
     *
     * @return void
     */
    private function _mapSection()
    {
        include_once VIEWS . 'templates/layouts/map-section-layout.php';
        return $this->m_content_builder;
    }

    /**
     * SectionedContentHolder
     *
     * @return void
     */
    private function _sectionedContentHolder()
    {
        $this->m_section_content = array();
        $this->m_section_content[] = $this->_formSection();
        $m_section_regions = array_merge($this->m_section_content);
        $views = $this->CenteredSectionViewBuilder($m_section_regions);
        return $views;
    }

    /**
     * PageContent
     *
     * @return void
     */
    private function _pageContent()
    {
        return array($this->_sectionedContentHolder());
    }

    /**
     * MainContentDiv
     *
     * @return void
     */
    private function _mainContentDiv()
    {
        if (method_exists($this, '_pageContent')) {
            // $this  ->  m_main_content  =  $this  ->  PageBanners  (  $this  ->  m_page_id  );
            $this->m_main_content .= $this->_businessInformationSection();
            $this->m_main_content .= $this->_mapSection();
            $this->m_main_content .= '<main class="page-content">';

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
            $this->m_main_content .= 'There is currently no body content to dispay';
            $this->m_main_content .= '</div>';
            $this->m_main_content .= '</div>';
            $this->m_main_content .= '</section>';
            $this->m_main_content .= '</main>';
            return $this->m_main_content;
        }
    }

    /**
     * Index
     *
     * @return void
     */
    public function index()
    {
        $this->PageMetaData($this->m_page_id);

        if (isset($_POST['contact-submit'])) {
            $this->_contactFormProcessor(new FormProcessor());
        }
        include_once TEMPLATES . 'core/header.php';
        include_once VIEWS . 'contact/contact-us.php';
        include_once TEMPLATES . 'core/footer.php';
    }

    /**
     * _confirmation
     *
     * @return void
     */
    private function _confirmation()
    {
        $type = 'Contact';
        $message = 'thanks for taking the time to contact us.' . BR .
            'We will get back to you as soon as possible.';

        $this->_confirmation_type = $type;
        $this->_confirmation_message = $message;

        $this->_confirmation = new Confirmation($this->_confirmation_type, $this->_confirmation_message, $this->_contact_form_first_name);
        return $this->_confirmation->index();

    }

    /**
     * ConfirmationPageContent
     *
     * @return void
     */
    private function _confirmationPageContent()
    {
        $name = $_SESSION['firstname'];
        $this->m_section_heading = 'Confirmation Notification';
        $this->m_section_body = 'Hi ' . $name . ', thanks for taking the time to contact us.' . BR . 'We will get back to you as soon as possible.';
        $redirect = '<p> You will be redirected to the home page in:</p>';
        $countdown = 100;
        $this->m_section_text = array();
        $this->m_section_text[] = $this->m_section_heading;
        $this->m_section_text[] = $this->m_section_body;
        $this->m_section_text[] = $redirect;
        $this->m_section_text[] = '<div id="counter">' . $countdown . '</div>';

        return $this->m_section_text;
    }

    /**
     * ConfirmationView
     *
     * @return void
     */
    private function _confirmationView()
    {
        $this->m_section_text = $this->_confirmationPageContent();
        return $this->m_section_text;
    }

    private $_contact_form_first_name;
    private $_contact_form_last_name;
    private $_contact_form_email;
    private $_contact_form_phone_number;
    private $_contact_form_message;
    // Error variables
    private $_contact_form_first_name_error;
    private $_contact_form_last_name_error;
    private $_contact_form_email_error;
    private $_contact_form_phone_number_error;

    /*
    Contact Form Processing
     */

    /**
     * _contactFormProcessor
     *
     * @return void
     */
    private function _contactFormProcessor(FormProcessor $sanitiser)
    {
        $this->_sanitiser = $sanitiser;
        $this->m_valid = true;
        if ('POST' == $_SERVER['REQUEST_METHOD']) {

            if (empty($_POST['firstname'])) {
                $this->_contact_form_first_name_error = '* Pleases enter your first name';
            } else {
                // code...
                $this->_contact_form_first_name = $this->_sanitiser->safe_input($_POST['firstname']);

                $_SESSION['firstname'] = $this->_contact_form_first_name;
            }

            if (empty($_POST['lastname'])) {
                $this->_contact_form_last_name_error = '* Please enter your last name';
            } else {
                // code...
                $this->_contact_form_last_name = $this->_sanitiser->safe_input($_POST['lastname']);
            }

            if (empty($_POST['email'])) {
                $this->_contact_form_email_error = '* Please enter your email address, as it\'s required for us to be able to respond to your enquiry.';
            } else {
                // code...
                $this->_contact_form_email = $this->_sanitiser->safe_input($_POST['email']);
            }

            if (empty($_POST['phone'])) {
                $this->_contact_form_phone_number_error = '* Please provide us with your telephone number, so that we can have an alternative way of contacting you,
                in order to provide a response to your enquiry.';
            } else {
                // code...
                $this->_contact_form_phone_number = $this->_sanitiser->safe_input($_POST['phone']);
            }

            if (empty($_POST['message'])) {
                $this->_contact_form_message = '';
            } else {
                // code...
                $this->_contact_form_message = $this->_sanitiser->safe_input($_POST['message']);
            }

            $this->_success();
        }
    }

    /**
     * _success
     *
     * @return void
     */
    private function _success()
    {
        if ($this->_contact_form_first_name && $this->_contact_form_last_name && $this->_contact_form_email && $this->_contact_form_phone_number) {

            $insert = $this->m_loaded_model->insertContactFormDetails($this->_contact_form_first_name, $this->_contact_form_last_name, $this->_contact_form_email, $this->_contact_form_phone_number, $this->_contact_form_message);
            // code...

            $send_mail = $this->_mailSender($this->_contact_form_first_name . ' ' . $this->_contact_form_last_name, $this->_contact_form_email, $this->_contact_form_message);

            /* $to = ('info@deewanstudios.com');
            $subject = ('Contact Form Tester');
            $message = ('Your true success in life begins only when you make the commitment to become excellent at what you do');
            // $header = ("From:" . $from . "\r\n");
            mail($to, $subject, $message); */
            $this->_confirmation();
            // header('Location: ' . URL . 'contact/confirmation');
            exit;
        } else {
            // code...
            echo '<strong>HELP!!! Something\'s gone horribly wrong...</strong>';
        }
    }
    // end form processing

    /**
     * _mailSender
     *
     * @param  mixed $fullname
     * @param  mixed $email
     * @param  mixed $message
     *
     * @return void
     */
    private function _mailSender($fullname, $email, $message)
    {
        $to = 'info@wheeliesbikes.co.uk';
        $from = '<' . $email . '>';

        $emailSubject = 'A message from your site visitor';

        $trimmedMessage = (($message));
        $wrapped = wordwrap($trimmedMessage, 70);

        include 'email/contact-email-layout.php';

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: $fullname" . $from . "\r\n";

        // Mail it
        mail($to, $emailSubject, $message, $headers);
    }
}
