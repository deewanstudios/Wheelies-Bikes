<?php

/**
 * Home class.
 *
 * @author  Deewanstudios Limited
 */
class Home extends Controller
{
    public function __construct()
    {
        $this->m_model = 'HomeModel';
        $this->m_page_id = 1;
    }

    protected function ModelLoader()
    {
        $m_data = $this->LoadModel($this->m_model);

        return $m_data;
    }

    private function MensTab()
    {
        $this->m_cat_id = 4;
        $this->m_param_id = 4;
        $this->m_link_name = $this->m_loaded_model->GetFeaturedCategories($this->m_cat_id);
        $this->m_section_image = $this->m_loaded_model->GetCallToActionImages($this->m_param_id);

        return array(
            $this->m_link_name,
            $this->m_section_image,
        );
    }

    private function WomensTab()
    {
        $this->m_cat_id = 3;
        $this->m_param_id = 5;
        $this->m_link_name = $this->m_loaded_model->GetFeaturedCategories($this->m_cat_id);
        $this->m_section_image = $this->m_loaded_model->GetCallToActionImages($this->m_param_id);

        return array(
            $this->m_link_name,
            $this->m_section_image,
        );
    }

    private function KidsTab()
    {
        $this->m_cat_id = 9;
        $this->m_param_id = 6;
        $this->m_link_name = $this->m_loaded_model->GetFeaturedCategories($this->m_cat_id);
        $this->m_section_image = $this->m_loaded_model->GetCallToActionImages($this->m_param_id);

        return array(
            $this->m_link_name,
            $this->m_section_image,
        );
    }

    /*         private function BMXTab  (  )
    {
    $this  ->  m_cat_id  =  6;
    $this  ->  m_param_id  =  7;
    $this  ->  m_link_name  =  $this  ->  m_loaded_model  ->  GetFeaturedCategories  (  $this  ->  m_cat_id  );
    $this  ->  m_section_image  =  $this  ->  m_loaded_model  ->  GetCallToActionImages  (  $this  ->  m_param_id  );
    
    $this  ->  m_debugger  =  $this  ->  Dumper  (  $this  ->  m_link_name  );
    
    return array  (
    $this  ->  m_link_name  ,
    $this  ->  m_section_image
    );
    
    } */
    private function SERacingTab()
    {
        $this->m_cat_id = 12;
        $this->m_param_id = 8;
        $this->m_link_name = $this->m_loaded_model->GetFeaturedCategories($this->m_cat_id);
        // $this  ->  m_link_name  =  "seracing";
        $this->m_section_image = $this->m_loaded_model->GetCallToActionImages($this->m_param_id);

        // $this  ->  m_debugger  =  $this  ->  Dumper  (  $this  ->  m_link_name  );

        return array(
            $this->m_link_name,
            $this->m_section_image,
        );
    }

    private function CallToActionSection()
    {
        $this->m_section_content = array();
        $this->m_section_content[] = $this->MensTab();
        $this->m_section_content[] = $this->WomensTab();
        $this->m_section_content[] = $this->KidsTab();
        // $this  ->  m_section_content  [  ]  =  $this  ->  BMXTab  (  );
        $this->m_section_content[] = $this->SERacingTab();
        $this->m_call_to_action_tabs = array_merge($this->m_section_content);

        // $this  ->  m_debugger  =  $this  ->  Dumper  (  $this  ->
        // m_call_to_actoion_tabs  );
        // $this  ->  m_section_image  =  $this  ->  m_loaded_model  ->
        // GetCallToActionImages  (  );
        // "Hello World";
        // $this  ->  m_loaded_model  ->  GetCallToActionImages  (  );

        include VIEWS.'templates/layouts/call-to-action-layout.php';

        return $this->m_content_builder;
    }

    private function featuredProducts()
    {
        $fp = new FeaturedProducts();

        return $fp->featuredProductsView();
    }

    private function _mainContentDiv()
    {
        if (method_exists($this, 'PageContent')) {
            $this->m_main_content = '<main class="page-content">';
            $this->m_main_content .= '<section class="section-50 section-sm-top-30 text-left">';
            $this->m_main_content .= '<div class="shell">';
            foreach ($this->PageContent() as $m_page_element) {
                $this->m_main_content .= $m_page_element;
            }

            $this->m_main_content .= '</div>';
            $this->m_main_content .= '</section>';

            $this->m_main_content .= '</main>';

            return $this->m_main_content;
        } else {
            $this->m_main_content = '<main class="page-content ">';

            $this->m_main_content .= '<section class="section-50 section-sm-top-30 section-sm-bottom-98 text-left">';
            $this->m_main_content .= '<div class="shell text-center text-ubold text-size-2 text-italic section-50">';

            $this->m_main_content .= '<h1>';
            $this->m_main_content .= 'There is currently no body content to display';
            $this->m_main_content .= '</h1>';

            $this->m_main_content .= '</div>';
            $this->m_main_content .= '</section>';

            $this->m_main_content .= '</main>';

            return $this->m_main_content;
        }
    }

    public function index()
    {
        $this->PageMetaData($this->m_page_id);
        include_once '../application/views/templates/core/landing-header.php';
        // $this  ->  CallToActionSection  (  );
        include_once '../application/views/home/index.php';
        include_once '../application/views/templates/core/footer.php';
    }
}
