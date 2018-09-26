<?php

/**
 * SeRacing class
 *
 * @package Enter product package here
 * @author  Deewanstudios Limited
 */
class SeRacing extends Controller
{

    protected $m_products;
    protected $m_geo_plugin;
    protected $m_bike_product_category;

    public function __construct()
    {
        $this->m_model = 'ProductsModel';
        $this->m_bike_category = 12;
		$this->m_bike_product_category = strtolower(get_class($this));
		$split = substr($this->m_bike_product_category,0,2);
		$split.= " ";
		$split.= substr($this->m_bike_product_category,2);
		$this->m_bike_product_category = $split;
        $this->m_page_id = 2;

    }

    protected function ModelLoader()
    {
        $m_data = $this->LoadModel($this->m_model);
        return $m_data;
    }

    private function MenBikeProducts()
    {
	
        $this->m_all_products = $this->m_loaded_model->CountProductsByBikeCategory($this->m_bike_category);

        $this->m_data['total_records'] = ($this->m_all_products["counter"]);
        $this->m_data['records_per_page'] = 6;
        $this->m_data['pagination_url'] = $this->m_base_url . "bikes/" . "$this->m_bike_product_category";

        $this->m_pagination = new Pagination($this->m_data);

        $this->m_pager = $this->m_pagination->PaginationDisplay($this->m_data);

        $this->m_start_record = $this->m_pagination->StartRecord($this->m_data);
        $this->m_records_per_page = $this->m_data['records_per_page'];

        $this->m_category_products = $this->m_loaded_model->GetProductsByBikeCategory($this->m_start_record, $this->m_records_per_page, $this->m_bike_product_category);

        require_once VIEWS . 'templates/layouts/products-layout.php';

        // $this->m_debugger = $this->Dumper(App::params);
        return $this->m_content_builder;
    }

    private function PageContent()
    {
        return array($this->MenBikeProducts());
    }

    private function MainContentDiv()
    {

        if (method_exists($this, 'PageContent')) {
            $this->m_main_content = $this->PageBanners($this->m_page_id);

            $this->m_main_content .= "<main class=\"page-content\">";
            $this->m_main_content .= "<section class=\"section-50 section-sm-top-30 text-left\">";
            $this->m_main_content .= "<div class=\"shell\">";
            foreach ($this->PageContent() as $m_page_element) {
                $this->m_main_content .= $m_page_element;
            }

            $this->m_main_content .= "</div>";
            $this->m_main_content .= "</section>";

            $this->m_main_content .= "</main>";

            return $this->m_main_content;

        } else {

            $this->m_main_content = $this->PageBanners($this->m_page_id);
            $this->m_main_content .= "<main class=\"page-content \">";

            $this->m_main_content .= "<section class=\"section-50 section-sm-top-30 section-sm-bottom-98 text-left\">";
            $this->m_main_content .= "<div class=\"shell text-center text-ubold text-size-2 text-italic section-50\">";

            $this->m_main_content .= "<h1>";
            $this->m_main_content .= "There is currently no body content to dispay";
            $this->m_main_content .= "</h1>";

            $this->m_main_content .= "</div>";
            $this->m_main_content .= "</section>";

            $this->m_main_content .= "</main>";

            return $this->m_main_content;

        }

    }

    public function index()
    {
        $this->PageMetaData($this->m_page_id);
        // $this  ->  ShowBikes  (  );
        require_once '../application/views/templates/core/header.php';
        require_once '../application/views/products/bikes/men.php';
        require_once '../application/views/templates/core/footer.php';

    }

    public function Product()
    {
        $single_product = new SingleProduct();
        // $this  ->  m_debugger  =  $this  ->  Dumper  (  $single_product  );
        return $single_product->Product();
    }

}
