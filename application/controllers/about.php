<?php

/**
 * About class
 *
 * @package Enter product package here
 * @author  Deewanstudios Limited
 */
class About extends Controller
{

    public function __construct()
    {
        $this->m_model   = 'AboutModel';
        $this->m_page_id = 4;

    }

    protected function ModelLoader()
    {
        $m_data = $this->LoadModel($this->m_model);
        return $m_data;
    }

    private function WhoWeAreSection()
    {
        $this->m_section_heading = $this->HeaderContent("h1", "who we are", "text-between");
        $this->m_section_text    = $this->m_loaded_model->PageText();
        require_once VIEWS . 'templates/layouts/about-page-context-section-layout.php';
        return array(
            $this->m_section_heading,
            $this->m_content_builder,
        );
    }

    private function WorkshopSection()
    {

        $this->m_section_heading = $this->HeaderContent("h2", "Why Wheelies Bikes?", "text-between");
        return array(
            $this->m_section_heading,
        );
    }

    private function SectionedContentHolder()
    {
        $this->m_section_content   = array();
        $this->m_section_content[] = $this->WhoWeAreSection();
        $this->m_section_content[] = $this->WorkshopSection();
        $m_section_regions         = array_merge($this->m_section_content);

        $views = $this->CenteredSectionViewBuilder($m_section_regions);

        // $this  ->  m_debugger  =  $this  ->  Dumper  (  $views  );

        return $views;
    }

    private function CenteredContents()
    {
        $this->m_section_content = $this->SectionedContentHolder();
        return $this->m_section_content;

    }

    public function PageContent()
    {

        return array(
            // $this  ->  AboutPageText  (  )  ,
            // $this  ->  PageTextSection  (  )  ,
            $this->CenteredContents());

    }

    private function MainContentDiv()
    {
        if (method_exists($this, 'PageContent')) {
            $this->m_main_content = $this->PageBanners($this->m_page_id);
            $this->m_main_content .= "<main class=\"page-content\">";

            // $this  ->  m_main_content  .=  $this  ->  AboutPageText  (  );

            foreach ($this->PageContent() as $m_page_element) {
                $this->m_main_content .= $m_page_element;
            }
			$this->m_main_content .= $this->ParallaxSectionMaker($this->m_page_id);
			
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

    public function index()
    {
        $this->PageMetaData($this->m_page_id);
        require_once '../application/views/templates/core/header.php';
        require_once '../application/views/about/about.php';
        require_once '../application/views/templates/core/footer.php';

    }

}
