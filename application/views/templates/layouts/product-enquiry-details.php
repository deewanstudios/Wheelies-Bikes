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
$this->m_content_builder = '<!-- Icon box aside right-->';
$this->m_content_builder .= '<section>';
// class="offset-top-98 offset-sm-top-66"
$this->m_content_builder .= '<div class="shell">';
$this->m_content_builder .= '<h1 class="text-between">';
$this->m_content_builder .= 'Product Enquiry';
$this->m_content_builder .= '</h1>';

/* $this->m_content_builder .= '<hr class="divider bg-mantis">'; */
$this->m_content_builder .= '<div class="range range-xs-center range-xs-middle range-xl-justify offset-top-66 section-34">';
$this->m_content_builder .= '<div class="cell-sm-9 cell-lg-6 cell-xl-7">';
$this->m_content_builder .= '<img class="img-responsive veil reveal-sm-inline-block shadow-drop-lg"';
$this->m_content_builder .= 'src="';
$this->m_content_builder .= $image_path . '.jpg"';
$this->m_content_builder .= ' width="auto" height="auto" alt="' . $image_description . '">';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '<div class="cell-sm-9 cell-lg-6 cell-xl-4 offset-sm-top-66 offset-lg-top-0">';
$this->m_content_builder .= '<div class="inset-lg-left-50 inset-xl-left-0">';
$this->m_content_builder .= '<!-- Icon Box Type 2-->';
$this->m_content_builder .= '<div class="unit unit-sm unit-sm-horizontal text-sm-left">';
$this->m_content_builder .= '<div class="unit-body">';
$this->m_content_builder .= '<h2 class="">';
// text-bold text-uppercase offset-sm-top-24
$this->m_content_builder .= 'Product Information';
$this->m_content_builder .= '</h2>';
$this->m_content_builder .= '<section>';
// class="offset-top-98"
$this->m_content_builder .= '<div class="shell">';
$this->m_content_builder .= '<hr class="hr hr-gradient">';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</section>';
$this->m_content_builder .= '<div>';
$this->m_content_builder .= '<h3>';
// $this->m_content_builder .= ucwords($brand.' '.$product.' '.$model);
$this->m_content_builder .= ucwords(str_replace('-', ' ', $this->getEnquiredProductBrand()) . ' ' . $this->getEnquiredProductName() . ' ' . $this->getEnquiredProductModel());
$this->m_content_builder .= '</h3>';
$this->m_content_builder .= '<p class="h5">';
$this->m_content_builder .= '£';
$this->m_content_builder .= $this->getEnquiredProductPrice();
$this->m_content_builder .= '</p>';

$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '<div>';
// class="offset-top-50"

$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</section>';

$this->m_content_builder .= '<section>';
// class="offset-top-98"
$this->m_content_builder .= '<div class="shell">';
$this->m_content_builder .= '<hr class="hr hr-gradient">';
$this->m_content_builder .= '</div>';
$this->m_content_builder .= '</section>';
