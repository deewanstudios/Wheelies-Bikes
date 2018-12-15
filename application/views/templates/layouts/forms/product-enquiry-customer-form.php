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
$this->m_content_builder = '<section class="section-34">';
// class="section-110"
// $this->m_content_builder .= '<section class="range range-xs-center">';
$this->m_content_builder .= '<div class="shell">';
// $this->m_content_builder .= '<div class="cell-sm-8">';
$this->m_content_builder .= '<form data-form-output="form-enquiry" data-form-type="enquiry" method="post" class=" text-left" action="">';
// rd-mailform
$this->m_content_builder .= '<div class="range offset-top-0">';
$this->m_content_builder .= '<div class="cell-sm-6">';
$this->m_content_builder .= '<div class="form-group">';
$this->m_content_builder .= '<label for="enquiry-first-name" class="form-label ;form-label-outside form-label-sm">First Name</label>';

$this->m_content_builder .= '<input id="enquiry-first-name" type="text" name="first-name" data-constraints="@Required" class="form-control form-control-impressed input-sm">';
if ($this->_error && null !== $this->_error_msg) {
    // code...
    $this->m_content_builder .= '<span class="text-danger">* ';
    // $this->m_content_builder .= $first_name_error;
    $this->m_content_builder .= $this->_error_msg['first_name_error'];
    $this->m_content_builder .= '</span>';
}
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '<div class="cell-sm-6 offset-top-0">';
$this->m_content_builder .= '<div class="form-group offset-top-24 offset-sm-top-0">';

$this->m_content_builder .= '<label for="enquiry-last-name" class="form-label ;form-label-outside form-label-sm">Last Name</label>';
$this->m_content_builder .= '<input id="enquiry-last-name" type="text" name="last-name" data-constraints="@Required" class="form-control form-control-impressed input-sm">';
if ($this->_error && null !== $this->_error_msg) {
    $this->m_content_builder .= '<span class="text-danger">* ';
    $this->m_content_builder .= $this->_error_msg['last_name_error'];
    $this->m_content_builder .= '</span>';
}
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= ' </div>';

$this->m_content_builder .= '<div class="range offset-top-0">';

$this->m_content_builder .= '<div class="cell-sm-6 offset-top-0">';
$this->m_content_builder .= '<div class="form-group offset-top-24">';

$this->m_content_builder .= '<label for="enquiry-phone" class="form-label form-label-outside form-label-sm">Phone</label>';
$this->m_content_builder .= '<input id="enquiry-phone" type="text" name="phone-number" data-constraints="@Required" class="form-control form-control-impressed input-sm"';
$this->m_content_builder .= 'value="">';
// $this->m_content_builder .= 'value="'.$_SESSION['phone-number'].'">';
if ($this->_error && null != $this->_error_msg) {
    $this->m_content_builder .= '<span class="text-danger">* ';
    $this->m_content_builder .= $this->_error_msg['telephone_number_error'];
    $this->m_content_builder .= '</span>';
    // exit();
}
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '<div class="cell-sm-6">';
$this->m_content_builder .= ' <div class="form-group offset-top-24">';

$this->m_content_builder .= ' <label for="enquiry-email" class="form-label form-label-outside form-label-sm">E-Mail</label>';

$this->m_content_builder .= '<input id="enquiry-email" type="email" name="email-address" data-constraints="@Required @Email" class="form-control form-control-impressed input-sm">';

if ($this->_error && null !== $this->_error_msg) {
    $this->m_content_builder .= '<span class="text-danger">* ';
    $this->m_content_builder .= $this->_error_msg['email_address_error'];
    $this->m_content_builder .= '</span>';
}
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';

$this->m_content_builder .= '<div class="range offset-top-0">';
$this->m_content_builder .= '<div class="cell-sm-12">';
$this->m_content_builder .= ' <div class="form-group offset-top-24">';

$this->m_content_builder .= '<label for="enquiry-text-area" class=" form-label-outside form-label-sm">';
$this->m_content_builder .= 'Additional information';
$this->m_content_builder .= '</label>';
$this->m_content_builder .= '<textarea wrap="hard" cols="100" id="enquiry-message" name="additional-message" class="form-control form-control-impressed">';
$this->m_content_builder .= '</textarea>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';

$this->m_content_builder .= '<div class="offset-top-24 text-right">';
$this->m_content_builder .= '<button class="btn btn-wheelies btn-icon btn-icon-right offset-top-24 text-white" type="submit" name="enquiry-submit">';
$this->m_content_builder .= '<span class="icon mdi mdi-chevron-double-right"></span>';
$this->m_content_builder .= 'Submit';
$this->m_content_builder .= '</button>';
$this->m_content_builder .= '</div>';

$this->m_content_builder .= ' </form>';

$this->m_content_builder .= '</div>';
// $this->m_content_builder .= '</div>';
$this->m_content_builder .= '</section>';
