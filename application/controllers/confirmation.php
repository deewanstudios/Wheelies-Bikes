<?php
/**
 * Product enquiry confirmation layout file.
 *
 * This file houses the html mark-up required to render the enquiry
 * form confirmation page.
 *
 * PHP version PHP 7.2.1.
 *
 * @category Helper
 *
 * @package Controller
 * @author  Adedayo Adedapo <ade.adedapo9@gmail.com>
 * @license DeewanstudiosLTD  https://deewanstudios.com
 *
 * @version GIT: 1.0.0
 * @link    https://deewanstudios.com
 */

/**
 * Confirmation class
 *
 * @category Helper
 *
 */
class Confirmation extends Controller
{
    private $_confirmation_type;
    private $_confirmation_message;
    private $_confirmation_name;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        $confirmation_type, $confirmation_message,
        $confirmation_name
    ) {
        parent::__construct();
        $this->m_loaded_model = 'ConfirmationModel';
        $this->_confirmation_type = $confirmation_type;
        $this->_confirmation_message = $confirmation_message;
        $this->_confirmation_name = $confirmation_name;

    }

    /**
     * ModelLoader
     *
     * @return void
     */
    public function modelLoader()
    {
        return $this->LoadModel($this->m_loaded_model);
    }

    /**
     * Get the value of _confirmation_type
     *
     * @return _confirmation_type
     */
    public function getConfirmationType()
    {
        return $this->_confirmation_type;
    }

    /**
     * Set the value of _confirmation_type
     *
     * @return self
     */
    public function setConfirmationType($_confirmation_type)
    {
        $this->_confirmation_type = $_confirmation_type;
        return $this->_confirmation_type;
    }

    /**
     * Get the value of _confirmation_message
     *
     * @return _confirmation_message;
     */
    public function getConfirmationMessage()
    {
        return $this->_confirmation_message;
    }

    /**
     * Set the value of _confirmation_message
     *
     * @return self
     */
    public function setConfirmationMessage($_confirmation_message)
    {
        $this->_confirmation_message = $_confirmation_message;
        return $this->_confirmation_message;
    }

    /**
     * Get the value of _confirmation_name
     */
    /**
     * GetConfirmationName
     *
     * @return void
     */
    public function getConfirmationName()
    {
        return $this->_confirmation_name;
    }

    /**
     * Set the value of _confirmation_name
     *
     * @return _confirmation_name
     */
    public function setConfirmationName($_confirmation_name)
    {
        $this->_confirmation_name = $_confirmation_name;
        return $this->_confirmation_name;
    }

    /**
     * _confirmationView
     *
     * @return void
     */
    private function _confirmationView()
    {
        $redirect = "You will be redirected to the home page in:";
        $countdown = 10;
        include_once VIEWS . 'templates/layouts/confirmation-view-layout.php';
        return $this->m_content_builder;
    }

    /**
     * _pageContent
     *
     * @return void
     */
    private function _pageContent()
    {
        return array($this->_confirmationView());
    }

    /**
     * _mainContentDiv
     *
     * @return void
     */
    private function _mainContentDiv()
    {
        if (method_exists($this, '_pageContent')) {
            $this->m_main_content .= '<main class="page-content page-min-height">';

            foreach ($this->_pageContent() as $m_page_element) {
                $this->m_main_content .= $m_page_element;
            }

            $this->m_main_content .= '</main>';

            return $this->m_main_content;
        } else {
            $this->m_main_content = '<main class="page-content page-min-height">';

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
     * Index
     *
     * @return void
     */
    public function index()
    {
        include_once VIEWS . 'templates/core/header.php';
        include_once VIEWS . 'confirmation/confirmation-view.php';
        include_once VIEWS . 'templates/core/footer.php';

    }

}
