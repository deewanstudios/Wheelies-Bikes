<?php
/* require_once APP . ('mens.php');
require_once APP . ('ladies.php');
require_once APP . ('kids.php');
require_once APP . ('seracing.php'); */
/**
 * Home class
 *
 * @package Enter product package here
 * @author  Deewanstudios Limited
 */
class Bikes extends Controller
{

    protected $m_products;
    protected $m_category;
    protected $m_bike_product_category;

    public function __construct()
    {
        $this->m_model                 = 'ProductsModel';
        $this->m_product_category      = 0;
        $this->m_page_id               = 2;
        $this->m_bike_product_category = strtolower(get_class($this));

    }

    protected function ModelLoader()
    {
        $m_data = $this->LoadModel($this->m_model);
        return $m_data;
    }

    private function AllBikeProducts()
    {

        $this->m_all_products = $this->m_loaded_model->ProductsCount();

        /*
        Pagination properties
         * $this->m_data['total_records'] (Total number of items paginated)
         * $this->m_data['records_per_page'] (Number of items to be displayed per page)
         * $this->m_data['pagination_url'] (URL to the current page.)
         */
        $this->m_data['total_records']    = ($this->m_all_products["counter"]);
        $this->m_data['records_per_page'] = 6;
        $this->m_data['pagination_url']   = $this->m_base_url . "bikes";

        $this->m_pagination = new Pagination($this->m_data);

        $this->m_pager = $this->m_pagination->PaginationDisplay($this->m_data);

        $this->m_start_record     = $this->m_pagination->StartRecord($this->m_data);
        $this->m_records_per_page = $this->m_data['records_per_page'];

        $this->m_category_products = $this->m_loaded_model->GetAllProducts($this->m_start_record, $this->m_records_per_page);

        require_once VIEWS . 'templates/layouts/products-layout.php';

        
        $this  ->  m_debugger  =  $this  ->  Dumper  (  $this  ->  m_category_products  );
        
        $this  ->  m_debugger  =  $this  ->  Dumper  (  $this  ->  m_all_products  );

        return $this->m_content_builder;
    }

    private function PageContent()
    {
        return array($this->AllBikeProducts());
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
            $this->m_main_content .= "There is currently no body content to display";
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
        require_once '../application/views/products/bikes/all-bikes.php';
        require_once '../application/views/templates/core/footer.php';

    }

    public function mens()
    {
        $this->m_category = new Mens();
        $view             = $this->m_category->index();
        // $this->m_debugger = $this->Dumper($this->m_category);
        return $view;

    }

    public function ladies()
    {
        $this->m_category = new Ladies();
        $view             = $this->m_category->index();
        // $product = $this-> m_category ->Product();
        // $this->m_debugger = $this->Dumper($this->m_category);
        return $view;

/*             function product  (  )
{
$this  ->  m_category  =  new Ladies  (  );
// $view =    $this-> m_category -> index();
$product  =  $this  ->  m_category  ->  Product  (  );
// $this->m_debugger = $this->Dumper($this->m_category);
return $product;
} */

    }

    public function kids()
    {
        $this->m_category = new Kids();
        $view             = $this->m_category->index();
        $this->m_debugger = $this->Dumper($this->m_category);
        // $this->m_debugger = $this->Dumper($this->view);
        return $view;

    }

    public function seracing()
    {
        $this->m_category = new SeRacing();
        $view             = $this->m_category->index();
// $this->m_debugger = $this->Dumper($this->m_category);
        return $view;

    }
/*
public function bmx  (  )
{
$this  ->  m_category  =  new BMX  (  );
$view  =  $this  ->  m_category  ->  index  (  );
// $this->m_debugger = $this->Dumper($this->m_category);
return $view;

} */

    public function Product()
    {
        $single_product = new SingleProduct();
        // $this  ->  m_debugger  =  $this  ->  Dumper  (  $single_product  );
        return $single_product->Product();
    }

}
