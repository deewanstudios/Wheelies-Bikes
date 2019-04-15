<?php

// $count =4;

$this->m_content_builder = "<section class=\"section-bottom-50 section-sm-bottom-66\">";
// section-98 section-sm-110
$this->m_content_builder .= "<div class=\"\">";

$this->m_content_builder .= "<div class=\"range range-xs-center range-sm-center range-md-center\">";

foreach ($this->m_call_to_action_tabs as $m_call_to_action_tab) {
    $this->m_content_builder .= "<div class=\"cell-xs-12 cell-sm-12 cell-md-12 cell-lg-6 padding-none\">";

    // $this->m_debugger = $this->Dumper($m_call_to_action_tab);

    foreach ($m_call_to_action_tab[0] as $m_call_to_action_link) {

        $this->m_content_builder .= "<a href=\"";
        $this->m_content_builder .= "bikes";
        $this->m_content_builder .= "/";
        $this->m_content_builder .= str_replace(" ", "-", $m_call_to_action_link["featured_categories"]);
        $this->m_content_builder .= "\"";
        $this->m_content_builder .= "class=\"reveal-block\">";
        $this->m_content_builder .= "<!-- Post Boxed-->";
        $this->m_content_builder .= "<div class=\"post post-boxed\">";

        foreach ($m_call_to_action_tab[1] as $m_call_to_action_image) {

            $this->m_content_builder .= "<header class=\"post-media\">";
            $this->m_content_builder .= "<img width=\"100%\" height=\"100%\" src=\"{$this->m_image_directory}{$m_call_to_action_image["image_path"]}.jpg\" alt=\"\" class=\"img-responsive\">";
            $this->m_content_builder .= "</header>";

        }

        $this->m_content_builder .= "<section class=\"post-content text-center\">";
        $this->m_content_builder .= "<div class=\"range range-xs-center\">";
        $this->m_content_builder .= "<div class=\"tab-item\">";
        $this->m_content_builder .= "<div class=\"\">";
        $this->m_content_builder .= "<h3 class=\"call-to-action-cat-name\">";
        $this->m_content_builder .= $m_call_to_action_link["featured_categories"];
        $this->m_content_builder .= "</h3>";
        $this->m_content_builder .= "</div>";

        $this->m_content_builder .= "<div class=\"group offset-top-0 margin-none\">";

        $this->m_content_builder .= "<button class=\"btn btn-sm btn-md btn-lg btn-icon btn-icon-right btn-shop-now\">";
        $this->m_content_builder .= "<span class=\"icon icon-xs  mdi mdi-chevron-right \"></span>";
        // icon-xlg
        $this->m_content_builder .= "<span class=\"call-to-action-cat-link\">";
        $this->m_content_builder .= "shop now";
        $this->m_content_builder .= "</span>";
        $this->m_content_builder .= "</button>";

        $this->m_content_builder .= "</div>";

        $this->m_content_builder .= "</div>";
        $this->m_content_builder .= "</div>";

        $this->m_content_builder .= "</section>";
        $this->m_content_builder .= "</div>";
        $this->m_content_builder .= "</a>";

    }

    $this->m_content_builder .= "</div>";
}

$this->m_content_builder .= "</div>";
$this->m_content_builder .= "</div>";
$this->m_content_builder .= "</section>";
