<?php
$this->m_content_builder = '<section class="section-98 section-sm-110">';
$this->m_content_builder .= '<div class="shell">';
$this->m_content_builder .= '<h2 class="text-bold">';
$this->m_content_builder .= 'Get In Touch';
$this->m_content_builder .= '</h2>';
$this->m_content_builder .= '<hr class="divider bg-mantis bg-wheelies">';
$this->m_content_builder .= '<div class="offset-sm-top-66">';
$this->m_content_builder .= '<div class="range range-xs-center">';
$this->m_content_builder .= '<div class="cell-xs-10 cell-md-8">';
$this->m_content_builder .= '<!-- RD Mailform-->';
$this->m_content_builder .= '<form class=" text-left" ';
// rd-mailform
// data-form-output="form-output-global"
$this->m_content_builder .= 'data-form-type="" method="post" action="">';
$this->m_content_builder .= '<div class="range range-xs-center">';
$this->m_content_builder .= '<div class="cell-sm-6">';
$this->m_content_builder .= ' <div class="form-group">';
$this->m_content_builder .= '<label class="form-label form-label-outside form-label-sm" for="contact-first-name">First Name</label>';
$this->m_content_builder .= '<input class="form-control form-control-impressed input-sm" id="contact-first-name" type="text" name="firstname" data-constraints="@Required" value="' . $this->_contact_form_first_name . '">';
$this->m_content_builder .= '<span class="text-danger">';
$this->m_content_builder .= $this->_contact_form_first_name_error;
$this->m_content_builder .= '</span>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '<div class="cell-sm-6">';
$this->m_content_builder .= '<div class="form-group">';
$this->m_content_builder .= '<label class="form-label form-label-outside form-label-sm" for="git-3-mailform-last-name">Last name</label>';
$this->m_content_builder .= '<input class="form-control form-control-impressed input-sm" id="git-3-mailform-last-name" type="text" name="lastname" data-constraints="@Required" value="' . $this->_contact_form_last_name . '">';
$this->m_content_builder .= '<span class="text-danger">';
$this->m_content_builder .= $this->_contact_form_last_name_error;
$this->m_content_builder .= '</span>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '<div class="cell-sm-6">';
$this->m_content_builder .= '<div class="form-group offset-sm-top-30">';
$this->m_content_builder .= '<label class="form-label form-label-outside form-label-sm" for="git-3-mailform-email">E-mail</label>';
$this->m_content_builder .= '<input class="form-control form-control-impressed input-sm" id="git-3-mailform-email" type="text" name="email" data-constraints="@Required @Email" value="' . $this->_contact_form_email . '">';
$this->m_content_builder .= '<span class="text-danger">';
$this->m_content_builder .= $this->_contact_form_email_error;
$this->m_content_builder .= '</span>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '<div class="cell-sm-6">';
$this->m_content_builder .= '<div class="form-group offset-sm-top-30">';
$this->m_content_builder .= '<label class="form-label form-label-outside form-label-sm" for="git-3-mailform-phone">Phone</label>';
$this->m_content_builder .= '<input class="form-control form-control-impressed input-sm" id="git-3-mailform-phone" type="text" name="phone" data-constraints="@Required" value="' . $this->_contact_form_phone_number . '">';
$this->m_content_builder .= '<span class="text-danger">';
$this->m_content_builder .= $this->_contact_form_phone_number_error;
$this->m_content_builder .= '</span>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';

$this->m_content_builder .= '<div class="cell-sm-12">';
$this->m_content_builder .= '<div class="form-group offset-sm-top-30">';
$this->m_content_builder .= '<label class="form-label form-label-outside form-label-sm" for="git-3-mailform-message">Message</label>';

$this->m_content_builder .= '<textarea class="form-control form-control-impressed input-sm" id="git-3-mailform-message" name="message">';
$this->m_content_builder .= $this->_contact_form_message;
$this->m_content_builder .= '</textarea>';
// data-constraints=""
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';

$this->m_content_builder .= '</div>';
$this->m_content_builder .= '<div class="offset-top-24 text-center">';
$this->m_content_builder .= '<button name="contact-submit" class="btn btn-primary btn-wheelies" type="submit">Submit</button>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</form>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</section>';
