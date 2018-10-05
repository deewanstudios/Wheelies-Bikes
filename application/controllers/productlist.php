<?php

class ProductList extends Controller
{
    protected $m_products;
    protected $m_product_category_name;
    protected $m_product_category_id;
    protected $m_tags = array();

/*     public function __construct()
{
parent::__construct();
$this->m_model = 'ProductsModel';
// $this->m_all_products = $this->m_loaded_model->ProductsCount();
$this->m_product_category = $product_category;
$this->m_tags = $tags;
$this->m_all_products = 53;
} */

    public function __construct($product_category, array $tags)
    {
        parent::__construct();
        $this->m_model                 = 'ProductsModel';
        $this->m_loaded_model          = $this->ModelLoader();
        $this->m_product_category_name = $product_category;
        $this->m_tags                  = $tags;
        // $this->m_product_category_id = 1;
        $this->m_debugger = $this->Dumper($this->m_tags);
        $this->m_debugger=$this->Dumper($this->m_product_category_name);

    }

    public function ModelLoader()
    {
        $m_data = $this->LoadModel($this->m_model);
        return $m_data;
    }

    /* Retrieve all products from database.
    Currently not sure if to pass a parameter of product category to this method
     */
    private function GetProducts()
    {
        $this->m_product_category_id = 1;
        $this->m_all_products        = $this->m_loaded_model->ProductsCount();
        /*$this->m_debugger = $this->Dumper("I am currently pinging you from the all products method");
        $this->m_debugger = $this->Dumper($this->m_model);
        $this->m_debugger = $this->Dumper($this->m_all_products);
         */

        /*
        Pagination properties
         * $this->m_data['total_records'] (Total number of items paginated)
         * $this->m_data['records_per_page'] (Number of items to be displayed per page)
         * $this->m_data['pagination_url'] (URL to the current page.)
         */

        $this->m_data['total_records']    = ($this->m_all_products["counter"]);
        $this->m_data['records_per_page'] = 6;
        if (!$this->m_tags) {
            # code...
            $this->m_data['pagination_url'] = $this->m_base_url . $this->m_product_category_name;
        } else {

            $this->m_data['pagination_url'] = $this->m_base_url . $this->m_product_category_name . "/" . implode('/', $this->m_tags);
        }

        $this->m_pagination = new Pagination($this->m_data);

        $this->m_pager = $this->m_pagination->PaginationDisplay($this->m_data);

        $this->m_start_record     = $this->m_pagination->StartRecord($this->m_data);
        $this->m_records_per_page = $this->m_data['records_per_page'];

        $this->m_category_products = $this->m_loaded_model->GetProductsByCategory($this->m_start_record, $this->m_records_per_page, $this->m_tags[0]);
        // $this->m_category_products = $this->m_loaded_model->GetProductsByCategory($this->m_start_record, $this->m_records_per_page, $this->m_product_category);

        require_once VIEWS . 'templates/layouts/products-layout.php';

        // $this->m_debugger = $this->Dumper($this->m_model);
        // $this->m_debugger = $this->Dumper($a);

        // $this->m_debugger = $this->Dumper($this->ModelLoader());
        /*  $this->m_debugger = $this->Dumper($this->m_product_category);*/
        $this->m_debugger = $this->Dumper($this->m_category_products);

        return $this->m_content_builder;
    }

    private function PageContent()
    {
        return array($this->GetProducts());

    }

    private function MainContentDiv()
    {

        if (method_exists($this, 'PageContent')) {
            // $this->m_main_content = $this->PageBanners($this->m_page_id);

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

            // $this->m_main_content = $this->PageBanners($this->m_page_id);
            $this->m_main_content .= "<main class=\"page-content \">";

            $this->m_main_content .= "<section class=\"section-50 section-sm-top-30 section-sm-bottom-98 text-left\">";
            $this->m_main_content .= "<div class=\"shell text-center text-ubold text-size-2 text-italic section-50\">";

            $this->m_main_content .= "<h1>";
            $this->m_main_content .= "There is currently no body content to display";
            $this->m_main_content .= "</h1>";

            $this->m_main_content .= "</div>";
            $this->m_main_content .= "</section>";

            $this->m_main_content .= "</main>";

            return $this->m_main_content;

        }

    }

    private function getProductsByGenderCategory()
    {

    }

    public function index()
    {

        require_once VIEWS . "templates/core/header.php";
        require_once VIEWS . "products/products-list.php";
        require_once VIEWS . "templates/core/footer.php";
    }
}
