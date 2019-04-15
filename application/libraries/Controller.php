<?php

/**
 * Controller class
 * This is the class that holds all the universal methods and properties to be
 * used site wide
 * This is the parent class to all controller classes
 *
 * @author  Deewanstudios Limited
 */

class Controller
{

    /*
    model related variables
     */
    protected $m_model;
    public $m_loaded_model;
    protected $m_pulled_content;

    /*
    site wide related variables
     */
    public $m_project_name = "Wheelies Bikes";
    public $m_base_url = URL;
    protected $m_link;
    public $m_image_directory = IMAGES;
    protected $m_thumb_directory = THUMBS;
    protected $m_page_id;

    protected $m_underline;
    protected $m_large_spacer;
    protected $m_br_tag_no_css_class = BR;
    protected $space = " ";
    protected $m_divider_with_link;
    protected $m_link_name;
    protected $m_link_button;
    protected $m_param_id;

    protected $m_menu_button;
    protected $m_secondary_jubotron_button;

    protected $m_substring_start;
    protected $m_substring_end;

    /*
    Debugger variable
     */
    public $m_debugger;

    //  Page meta data variables
    protected $m_meta_data;
    protected $m_final_page_meta_data;
    protected $m_page_meta_data;
    protected $m_page_meta_datum;
    protected $m_page_name;
    protected $m_page_title;
    protected $m_page_keywords;
    protected $m_page_description;
    protected $m_page_url;
    protected $m_page_author = "Wheelies Bikes";
    protected $m_open_graph_title;
    protected $m_open_graph_keywords;
    protected $m_open_graph_description;
    protected $m_open_graph_url;
    protected $m_open_graph_site_name = "Wheelies Bikes";
    protected $m_open_graph_type = "Website";
    protected $m_page_developed_by = "Perfect Code Services. A Subsidary of Deewanstudios Limited";
    protected $m_page_developer_website = "http://deewanstudios.com/";

    /*
    Additional  Class Loader
    Member Variables To Load Exteternal Classes
     */

    protected $m_meta_data_class;

    /*
    individual page related variables
     */

    protected $m_section_content;
    protected $m_section_heading;
    protected $m_section_body;
    protected $m_section_image;
    protected $m_section_image_name;
    protected $m_section_image_description;
    protected $m_section_image_caption;
    protected $m_section_image_path;

    protected $m_content_builder;
    protected $m_main_content;
    protected $m_section_text;
    protected $m_page_content_wrapper;

    // protected $m_paragraph_section;
    protected $m_multiple_paragraph_section;

    /*
    page headings/banner variables
     */
    protected $m_page_header_banner;
    protected $m_top_banner;
    protected $m_top_banner_page_name;
    protected $m_page_banners;
    /*
    Under Construction variables
     */
    protected $m_page_underconstruction;

    protected $m_product_category;

    public function __construct()
    {
        $this->m_model = 'MasterModel';
        // $this->m_debugger = $this->Dumper($this->m_model);

    }

    private function ModelLoader()
    {
        $m_data = $this->LoadModel($this->m_model);
        return $m_data;
    }

    public function LoadModel($model)
    {
        require_once MODELS . $model . '.php';

        return new $model();

    }

    /**
     * centeredSectionViewBuilder
     *
     * @param  mixed $sections
     *
     * @return void
     */
    public function centeredSectionViewBuilder($sections)
    {

        include VIEWS . "templates/layouts/centered-content-section-wrapper.php";
        return $m_centered_section;

    }

    /*
    public function FullWIdthSectionViewBuilder  (  $sections  )
    {

    require VIEWS  .  "templates/layouts/full-width-content-section-wrapper.php";
    return $this  ->  m_page_content_wrapper;

    }*/

    public function MainBodyViewBuilder()
    {

        require_once VIEWS . "templates/layouts/page-content-sections-builder.php";
        return $this->m_page_content_wrapper;

    }

    public function LargeSpacer()
    {
        $this->m_large_spacer = "<br class=\"visible-lg-inline\">";
        return $this->m_large_spacer;
    }

    public function StringSplitter()
    {
        return $this->m_br_tag_no_css_class;

    }

    public function headerContent($header_tag, $header_title, $header_class = null)
    {

        if ($header_class !== null && strpos($header_class, 'text-between') !== false) {
            # code...
            $this->m_section_header_builder = "<$header_tag class=\"{$header_class}\">";
            $this->m_section_header_builder .= ucwords($header_title);
            $this->m_section_header_builder .= "</$header_tag>";
        } else {
            # code...
            $this->m_section_header_builder = "<$header_tag class=\"{$header_class}\">";
            $this->m_section_header_builder .= ucwords($header_title);
            $this->m_section_header_builder .= "</$header_tag>";
            $this->m_section_header_builder .= "<div class=\"divider bg-mantis bg-wheelies\"></div>";
        }
        return $this->m_section_header_builder;

    }

    public function SingleParagraph($m_paragraph)
    {
        // $m_section_text  =  array  (  );
        include VIEWS . "templates/layouts/single-paragraph-section-layout.php";
        return $this->m_paragraph_section;
        // exit;
    }

    public function Paragrapher($m_section_text = array())
    {
        $array_length = count($m_section_text);
        require_once VIEWS . "templates/layouts/paragraph-section-layout.php";
        return $this->m_multiple_paragraph_section;
    }

    public function SectionHeader($header_tag, $header_title)
    {
        $this->m_section_header_builder = "<div class=\"range\">";
        $this->m_section_header_builder .= "<div class=\"cell-lg-5 text-lg-left\">";
        $this->m_section_header_builder .= "<{$header_tag}>";
        $this->m_section_header_builder .= ucwords($header_title);
        $this->m_section_header_builder .= "</{$header_tag}>";
        $this->m_section_header_builder .= "<hr class=\"divider bg-mantis hr-lg-left-0\">";
        $this->m_section_header_builder .= "</div>";
        $this->m_section_header_builder .= "</div>";

        return $this->m_section_header_builder;

    }

    public function LinkButton($link_href, $link_text)
    {

        $this->m_link_button = "<div class=\"cell-xs-12 offset-top-47\">";
        $this->m_link_button .= "<div class=\"divider-with-link text-center\">";
        $this->m_link_button .= "<hr class=\"hr-sealine-gray hr-fullwidth\">";
        $this->m_link_button .= "<a href=\"{$link_href}\" class=\"btn-link btn-link-primary btn-link-variant-1\">";
        $this->m_link_button .= "<span>";
        $this->m_link_button .= $link_text;
        $this->m_link_button .= "</span>";
        $this->m_link_button .= "<span class=\"overlay\">";
        $this->m_link_button .= "</span>";
        $this->m_link_button .= "</a>";
        $this->m_link_button .= "</div>";
        $this->m_link_button .= "</div>";
        return $this->m_link_button;

    }

    public function UnderConstruction()
    {
        $this->m_page_id = 6;
        $m_section_id = 4;
        $this->m_loaded_model = $this->ModelLoader();
        $this->m_pulled_content = $this->m_loaded_model->GetAllPageContents($this->m_page_id, $m_section_id);
        $this->m_section_heading = $this->m_pulled_content[0]["heading_name"];
        $this->m_section_body = $this->m_pulled_content[0]["context"];
        $this->m_section_text = array();
        $this->m_section_text[] = $this->m_section_heading;
        $this->m_section_text[] = $this->m_section_body;
        require_once '../application/views/templates/layout/underconstruction-section-layout.php';
        return $this->m_content_builder;
    }

    public function Dumper($data)
    {
        echo "<pre>";
        // foreach ($data as $datum) {

        // var_dump(wordwrap($datum, 100));
        var_dump($data);
        // }
        echo "</pre>";
        return $data;
    }

    public function AllPageMetaData($m_pages_id)
    {

        $this->m_loaded_model = $this->ModelLoader();
        $this->m_pulled_content = $this->m_loaded_model->GetAllPageMetaData($m_pages_id);
        $this->m_page_meta_data = $this->m_pulled_content;
        foreach ($this->m_page_meta_data as $this->m_page_meta_datum) {
            $this->m_page_name = $this->m_page_meta_datum["page_name"];
            $this->m_page_title = $this->m_page_meta_datum["page_title"];
            $this->m_page_keywords = $this->m_page_meta_datum["page_keywords"];
            $this->m_page_description = $this->m_page_meta_datum["page_description"];
            $this->m_page_url = URL . $this->m_page_meta_datum["page_url"];
            $this->m_page_author;
            $this->m_open_graph_title = $this->m_page_title;
            $this->m_open_graph_keywords = $this->m_page_keywords;
            $this->m_open_graph_description = $this->m_page_description;
            $this->m_open_graph_url = $this->m_page_url;
            $this->m_open_graph_site_name;
            $this->m_open_graph_type;

        }

    }

    public function PageMetaData($m_pages_id)
    {
        $this->m_final_page_meta_data = $this->AllPageMetaData($m_pages_id);
        return $this->m_final_page_meta_data;
    }

    public function pageBanners($page_id)
    {

        $this->m_top_banner = $this->m_loaded_model->GetAllPagesById($page_id);
        // $f_sub_page  =  $this  ->  m_loaded_model  ->  GetAllSubPagesById  (
        // $subpage_id  );
        // $this->m_debugger = $this->Dumper($this->m_page_banners);

        $main_page_name = $this->m_top_banner[0]["name"];
        $main_page_url = $this->m_top_banner[0]["url"];
        // $sub_page_name  =  $f_sub_page  [  0  ]  [  "name"  ];
        // $sub_page_url  =  $f_sub_page  [  0  ]  [  "subpage_url"  ];

        $f_breadcrumbs = array(
            "name" => $main_page_name,
            "url" => $main_page_url,
        );

        // var_dump($f_breadcrumbs);

        $purpose = "banner";
        $this->m_page_banners = $this->m_loaded_model->GetAllImagesByPageIdAndPurpose($page_id, $purpose);
        // var_dump($this->m_page_banners[0]["image_path"]);

        $i = 1;

        /*
        $this  ->  Dumper  (  $main_page_name  );
        $this  ->  Dumper  (  $sub_page_name  );
        $this  ->  Dumper  (  $f_sub_page  );
        $this  ->  Dumper  (  $this  ->  m_top_banner_page_image  );
        $this  ->  Dumper  (  $f_breadcrumbs  );*/

        // $this  ->  Dumper  (  $this  ->  m_top_banner  );
        include '../application/views/templates/layouts/navigation/breadcrumbs-layout.php';
        return $this->m_page_header_banner;
    }

    public function parallaxSectionMaker($page_id)
    {
        $purpose = "banner";
        $this->m_page_banners = $this->m_loaded_model->GetAllImagesByPageIdAndPurpose($page_id, $purpose);
        require_once VIEWS . "templates/layouts/parallax-section-layout.php";
        return $this->m_content_builder;
    }

    public function UrlRedirect($url)
    {
        header("Location: $url");
        exit;
    }

}
