<?php

/**
 * Home class
 *
 * @package Enter product package here
 * @author  Deewanstudios Limited
 */
// class SingleProduct extends Controller
class SingleProduct extends Controller
{
    private $m_product_id;
    private $m_product_name;
    private $m_product_model;
    private $m_product_description;
    private $m_product_images;
    private $m_main_product_image;
    private $m_product_price;
    private $m_image_directory;
    private $m_product_array;
    private $m_product;
    private $m_loaded_model;
    private $m_product_brand;
    private $m_product_gender;

    public function __construct()
    {
        $this->m_controller      = new Controller();
        $this->m_model           = 'ProductsModel';
        $this->m_page_id         = 3;
        $this->m_image_directory = $this->m_controller->m_image_directory;
        $this->m_loaded_model    = $this->ModelLoader();
    }

    protected function ModelLoader()
    {
        $m_data = $this->m_controller->LoadModel($this->m_model);
        return $m_data;
    }

    // public function SingleProductView  (  $name  )
    public function SingleProductView()
    {

        if (isset($_GET["url"])) {
            // $this->m_product_id = $m_product_id;
            $f_query_string = ltrim($_GET["url"], "url=");
            $c_query_string = explode("/", $f_query_string);
            $params         = explode("-", $c_query_string[3]);
            // $params         = explode("/", $c_query_string[3]);

            $param_length = count($params);

            // $this->m_debugger = $this->m_controller->Dumper($f_query_string);
            // $this->m_debugger = $this->m_controller->Dumper($c_query_string);
            $this->m_debugger = $this->m_controller->Dumper($params);

            if ($param_length === 5 && $params[0] === 'se') {
                $brand = isset($params[0]) ? $params[0] : null;
                $brand .= " ";
                $brand .= isset($params[1]) ? $params[1] : null;
                $gender = isset($params[2]) ? $params[2] : null;
                $name   = isset($params[3]) ? $params[3] : null;
                $model  = isset($params[4]) ? $params[4] : null;
            } elseif ($param_length == 6 && $params[0] == 'se') {
                $brand = isset($params[0]) ? $params[0] : null;
                $brand .= " ";
                $brand .= isset($params[1]) ? $params[1] : null;
                $gender = isset($params[2]) ? $params[2] : null;
                $name   = isset($params[3]) ? $params[3] : null;
                $name .= " ";
                $name .= isset($params[4]) ? $params[4] : null;
                $model = isset($params[5]) ? $params[5] : null;

            } elseif ($param_length == 5 && $params[0] === 'frog') {
                $brand = isset($params[0]) ? $params[0] : null;
                // $brand  .=  " ";
                // $brand  .=  isset  (  $params  [  1  ]  )  ?  $params  [  1  ]  :  null;
                $gender = isset($params[1]) ? $params[1] : null;
                $name   = isset($params[2]) ? $params[2] : null;
                $model  = isset($params[3]) ? $params[3] : null;
                $model .= " ";
                $model .= isset($params[4]) ? $params[4] : null;

            } elseif ($param_length == 5 && $params[0] === 'gt') {
                $brand = isset($params[0]) ? $params[0] : null;
                // $brand  .=  " ";
                // $brand  .=  isset  (  $params  [  1  ]  )  ?  $params  [  1  ]  :  null;
                $gender = isset($params[1]) ? $params[1] : null;
                $name   = isset($params[2]) ? $params[2] : null;
                $name .= " ";
                $name .= isset($params[3]) ? $params[3] : null;
                $model = isset($params[4]) ? $params[4] : null;
            } else {
                $brand  = isset($params[0]) ? $params[0] : null;
                $gender = isset($params[1]) ? $params[1] : null;
                $name   = isset($params[2]) ? $params[2] : null;
                $model  = isset($params[3]) ? $params[3] : null;
            }

            $this->m_product_brand  = $brand;
            $this->m_product_gender = $gender;
            $this->m_product_name   = str_replace("-", " ", $name);
            $this->m_product_model  = str_replace("-", " ", $model);
        }

        $this->m_product_array = $this->m_loaded_model->GetSingleProducts($this->m_product_brand, $this->m_product_name, $this->m_product_model, $this->m_product_gender);

        // $this->m_debugger = $this->m_controller->Dumper($param_length);
        // $this->m_debugger = $this->m_controller->Dumper($params);
        // $this->m_debugger = $this->m_controller->Dumper($this->m_product_array);
        // $this->m_debugger = $this->m_controller->Dumper($this->m_product_gender);

        foreach ($this->m_product_array as $this->m_product) {

            $this->m_product_id          = $this->m_product["product_id"];
            $this->m_product_brand       = $this->m_product["brand_cat_name"];
            $this->m_product_name        = $this->m_product["product_name"];
            $this->m_product_model       = $this->m_product["product_model"];
            $this->m_product_description = $this->m_product["product_description"];
            $this->m_product_price       = $this->m_product["product_price_value"];

        }

        // $this->m_debugger = $this->m_controller->Dumper($this->m_product_id);

        $this->m_product_images     = $this->m_loaded_model->AllProductsImages($this->m_product_id);
        $this->m_main_product_image = $this->m_loaded_model->GetSingleProductImage($this->m_product_id);

        foreach ($this->m_main_product_image as $m_single_image) {

            $image_name    = $m_single_image["image_name"];
            $image_desc    = $m_single_image["image_description"];
            $image_caption = $m_single_image["image_caption"];
            $image_path    = $m_single_image["image_path"];
        }

        // $this  ->  m_debugger  =  $this  ->  m_controller  ->  Dumper  (  $image_path
        // );

        // $specs_heading = [];

        // $spec_heading[] = "size" => "size(s)";
        // $spec_heading = ("{$spec_heading}_size"=>"size(s)") ;
        /*         $specs_heading = array(

        "size"   => "available size(s)",
        "colour" => "available colour(s)",
        "frame" => "frame",
        "fork" => "fork",
        "rim" => "rims",
        "front_hub" => "front hub",
        "rear_hub" => "rear hub",
        "crank" => "crank",
        "front_derailleur" => "front derailleur",
        "rear_derailleur" => "rear derailleur",
        "shifter" => "shifters",
        "brake" => "brakes",
        ); */

        $specs = $this->ProductSpecifications($this->m_product_id);

        // $specification = array_merge($specs_heading, $specs);

        foreach ($specs[0] as $spec_heading => $product_specification) {

            $parts = str_replace("_", " ", $spec_heading);

// $crumbs = explode(" ", $parts);

            // $this->m_debugger = $this->m_controller->Dumper($parts);
            // $this->m_debugger = $this->m_controller->Dumper(ucwords($parts));
            // $this->m_debugger = $this->m_controller->Dumper(ucwords($crumbs));

            # code...
        }

        // echo $spec_count = count($specification[0]);
        // $this->m_debugger = $this->m_controller->Dumper($cars);
        // $this->m_debugger = $this->m_controller->Dumper($spec_heading);
        // $this->m_debugger = $this->m_controller->Dumper($specs);
        // $this->m_debugger = $this->m_controller->Dumper($specification);
        // $this->m_debugger = $this->m_controller->Dumper($parts);

        require_once VIEWS . 'templates/layouts/single-product-view-layout.php';
        return $this->m_content_builder;
    }

    private function ProductSpecifications($m_product_id)
    {
        return $this->m_loaded_model->GetProductSpecifications($m_product_id);
    }

    private function MainContentDiv($m_product_id)
    {

        if (method_exists($this, 'SingleProductView')) {

            $this->m_main_content = "<main class=\"page-content section-98 section-sm-124\">";
            // $this  ->  m_main_content  .=  "<section class=\"section-50 section-sm-top-30
            // text-left\">";
            $this->m_main_content .= "<div class=\"shell\">";

            $this->m_main_content .= $this->SingleProductView($m_product_id);

            $this->m_main_content .= "</div>";
            // $this  ->  m_main_content  .=  "</section>";

            $this->m_main_content .= "</main>";
            return $this->m_main_content;

        } else {

            $this->m_main_content = "<main class=\"page-content\">";

            $this->m_main_content .= "<section class=\"section-50 section-sm-top-30 section-sm-bottom-98 text-left\">";
            $this->m_main_content .= "<div class=\"shell\">";

            // $this  ->  m_main_content  .=  "There is currently no body content to dispay";
            $this->m_main_content .= "There is currently no body content to dispay";

            $this->m_main_content .= "</div>";
            $this->m_main_content .= "</section>";

            $this->m_main_content .= "</main>";
            return $this->m_main_content;

        }

    }

    public function AllPageMetaData($m_pages_id)
    {

        $this->m_loaded_model   = $this->ModelLoader();
        $this->m_pulled_content = $this->m_loaded_model->GetAllPageMetaData($m_pages_id);
        $this->m_page_meta_data = $this->m_pulled_content;
        foreach ($this->m_page_meta_data as $this->m_page_meta_datum) {
            $this->m_page_name        = $this->m_page_meta_datum["page_name"];
            $this->m_page_title       = $this->m_page_meta_datum["page_title"];
            $this->m_page_keywords    = $this->m_page_meta_datum["page_keywords"];
            $this->m_page_description = $this->m_page_meta_datum["page_description"];
            $this->m_page_url         = URL . $this->m_page_meta_datum["page_url"];
            $this->m_page_author;
            $this->m_open_graph_title       = $this->m_page_title;
            $this->m_open_graph_keywords    = $this->m_page_keywords;
            $this->m_open_graph_description = $this->m_page_description;
            $this->m_open_graph_url         = $this->m_page_url;
            $this->m_open_graph_site_name;
            $this->m_open_graph_type;

        }

    }

    public function PageMetaData($m_pages_id)
    {
        $this->m_final_page_meta_data = $this->AllPageMetaData($m_pages_id);
        return $this->m_final_page_meta_data;
    }

    public function Product()
    {
        // $this  ->  m_controller  ->  PageMetaData  (  $this  ->  m_page_id  );
        require_once '../application/views/templates/core/header.php';
        require_once '../application/views/products/bikes/single-product.php';
        // $this->m_debugger = $this->m_controller->Dumper($_SERVER["86.136.236.96"]);
        require_once '../application/views/templates/core/footer.php';

    }

/*     public function CategoryProductView()
{
// $this  ->  m_controller  ->  PageMetaData  (  $this  ->  m_page_id  );
require_once '../application/views/templates/core/header.php';
require_once '../application/views/products/bikes/single-product.php';
// $this->m_debugger = $this->m_controller->Dumper($_SERVER["86.136.236.96"]);
require_once '../application/views/templates/core/footer.php';

} */

}
