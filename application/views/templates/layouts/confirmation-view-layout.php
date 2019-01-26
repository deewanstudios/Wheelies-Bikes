<?php
/**
 * Enquiry confirmation layout file.
 *
 * This file houses the html mark-up required to render the enquiry form confirmation page.
 *
 * PHP version PHP 7.2.1.
 *
 * @category Helper
 *
 * @author Adedayo Adedapo <ade.adedapo9@gmail.com>
 *
 * @see   https://yoursite.com
 * @since 1.0.0
 */
// echo 'We have made it to the product enquiry confirmation page';
$this->m_content_builder = '<section class="section-sm-110">';
$this->m_content_builder .= '<div class="shell">';
$this->m_content_builder .= '<h1 class="text-between">';
$this->m_content_builder .= $this->_confirmation_type . ' Confirmation';
$this->m_content_builder .= '</h1>';
$this->m_content_builder .= '<p>';
$this->m_content_builder .= '</p>';
$this->m_content_builder .= '<div class="offset-top-66">';
$this->m_content_builder .= '<div class="range range-xs-center">';
$this->m_content_builder .= '<div class="cell-xs-10">';
$this->m_content_builder .= '<!--Bootstrap jumbotron-->';
$this->m_content_builder .= '<div class="jumbotron shadow-drop-lg context-dark text-left">';
$this->m_content_builder .= ' <h2><span class="big">Hello, ' . $this->_confirmation_name . '!</span></h2>';
$this->m_content_builder .= '<p>';
$this->m_content_builder .= $this->_confirmation_message;
$this->m_content_builder .= '</p>';
$this->m_content_builder .= '<p>';
$this->m_content_builder .= $redirect;
$this->m_content_builder .= ' ';
$this->m_content_builder .= '<span id="counter" class="text-extra-big">' . $countdown . '</span>';
$this->m_content_builder .= '</p>';
$this->m_content_builder .= '<a class="btn-primary btn btn-success offset-top-14" href="' . $this->m_base_url . '">';
$this->m_content_builder .= '<span class="icon"></span>';
$this->m_content_builder .= ' Return Home';
$this->m_content_builder .= '</a>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</section>';
