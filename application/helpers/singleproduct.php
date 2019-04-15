<?php

/**
 * Home class
 *
 * @package Enter product package here
 * @author  Deewanstudios Limited
 */
class SingleProduct
{
    private $m_product_id;
    private $m_product_name;
    private $m_product_description;
    private $m_product_images;
    private $m_main_product_image;
    private $m_product_price;
    private $m_image_directory;
    private $m_product_array;
    private $m_product;
    private $m_loaded_model;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->m_controller      = new Controller();
        $this->m_model           = 'ProductsModel';
        $this->m_page_id         = 3;
        $this->m_image_directory = $this->m_controller->m_image_directory;
        $this->m_loaded_model    = $this->ModelLoader();
        $this->m_geo_plugin      = new geoPlugin();
        $this->m_geo_plugin->locate();
        // $this  ->  m_geo_plugin  ->  locate  (  '86.136.236.96'  );
        // $this  ->  m_geo_plugin  ->  locate  (  "197.210.226.113"  );
        // $this  ->  m_geo_plugin  ->  locate  (  "41.66.192.0"  );
        // $this  ->  m_geo_plugin  ->  locate  (  "185.212.125.104"  );
        // $this  ->  m_geo_plugin  ->  locate  (  "79.175.219.146"  );
        // $this  ->  m_geo_plugin  ->  locate  (  "72.229.28.185"  );
        // $this  ->  m_geo_plugin  ->  locate  (  "77.111.246.16"  );
        // $this  ->  m_geo_plugin  ->  locate  (  "163.177.112.32"  );

    }

    protected function ModelLoader()
    {
        $m_data = $this->m_controller->LoadModel($this->m_model);
        return $m_data;
    }

    public function SingleProductView($name)
    {
        $this->m_allowed_currency      = $this->m_loaded_model->GetAllowedCurrencies();
        $m_global_default_currencyCode = $this->m_allowed_currency[0]["currency_code"];

        if (isset($_GET["url"])) {
            $f_query_string       = ltrim($_GET["url"], "url=");
            $f_query_string       = explode("/", $f_query_string);
            $name                 = isset($f_query_string[2]) ? $f_query_string[2] : null;
            $id                   = isset($f_query_string[3]) ? $f_query_string[3] : null;
            $this->m_product_name = str_replace("-", " ", $name);
        }

        $this->m_product_array = $this->m_loaded_model->GetSingleProducts($this->m_product_name);

        $this->m_debugger = $this->m_controller->Dumper($this->m_product_array);

        foreach ($this->m_product_array as $this->m_product) {

            $this->m_product_id          = $this->m_product["product_id"];
            $this->m_product_name        = $this->m_product["product_name"];
            $this->m_product_description = $this->m_product["product_description"];

        }
        $this->m_debugger = $this->m_controller->Dumper($this->m_product);

        $this->m_product_images     = $this->m_loaded_model->AllProductsImages($this->m_product_id);
        $this->m_main_product_image = $this->m_loaded_model->GetSingleProductImage($this->m_product_id);

        foreach ($this->m_main_product_image as $m_single_image) {

            $image_name    = $m_single_image["image_name"];
            $image_desc    = $m_single_image["image_description"];
            $image_caption = $m_single_image["image_caption"];
            $image_path    = $m_single_image["image_path"];
        }

        require_once VIEWS . 'templates/layouts/single-product-view-layout.php';
        return $this->m_content_builder;
    }

    private function MainContentDiv($m_product)
    {

        if (method_exists($this, 'SingleProductView')) {

            $this->m_main_content = "<main class=\"page-content section-98 section-sm-124\">";
            // $this  ->  m_main_content  .=  "<section class=\"section-50 section-sm-top-30
            // text-left\">";
            $this->m_main_content .= "<div class=\"shell\">";

            $this->m_main_content .= $this->SingleProductView($m_product);

            $this->m_main_content .= "</div>";
            // $this  ->  m_main_content  .=  "</section>";

            $this->m_main_content .= "</main>";
            return $this->m_main_content;

        } else {

            $this->m_main_content = "<main class=\"page-content\">";

            $this->m_main_content .= "<section class=\"section-50 section-sm-top-30 section-sm-bottom-98 text-left\">";
            $this->m_main_content .= "<div class=\"shell\">";

            $this->m_main_content .= "There is currently no body content to dispay";

            $this->m_main_content .= "</div>";
            $this->m_main_content .= "</section>";

            $this->m_main_content .= "</main>";
            return $this->m_main_content;

        }

    }

    public function Product()
    {
        $this->m_controller->PageMetaData($this->m_page_id);
        require_once '../application/views/templates/core/header.php';
        require_once '../application/views/products/single-product.php';
        // $this->m_debugger = $this->m_controller->Dumper($_SERVER["86.136.236.96"]);
        require_once '../application/views/templates/core/footer.php';

    }

}
