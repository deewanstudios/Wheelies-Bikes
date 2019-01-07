<?php

class ProductList extends Controller
{
    protected $m_products;
    protected $m_product_category_name;
    protected $m_product_category_id;
    protected $m_tags = array();
    protected $nav;
    protected $destination;

    public function __construct($product_category, array $tags)
    {
        parent::__construct();
        $this->m_model = 'ProductsModel';
        $this->m_loaded_model = $this->ModelLoader();
        $this->m_product_category_name = $product_category;
        $this->m_tags = $tags;
        // instance of navigation model, for access to the megamenu methods and functionalities
        $this->nav = new NavigationModel();

        if (isset($_GET['url'])) {
            $url = explode('/', $_GET['url']);
            if (count($url) > 3) {
                $this->product($url);
            }
        }
    }

    public function ModelLoader()
    {
        $m_data = $this->LoadModel($this->m_model);

        return $m_data;
    }

    private function getAllProducts()
    {
        $this->m_all_products = $this->m_loaded_model->ProductsCount();

        /*
        Pagination properties
         * $this->m_data['total_records'] (Total number of items paginated)
         * $this->m_data['records_per_page'] (Number of items to be displayed per page)
         * $this->m_data['pagination_url'] (URL to the current page.)
         */
        $this->m_data['total_records'] = ($this->m_all_products['counter']);
        $this->m_data['records_per_page'] = 6;
        if (!$this->m_tags) {
            $this->m_data['pagination_url'] = $this->m_base_url.$this->m_product_category_name;
        } else {
            $this->m_data['pagination_url'] = $this->m_base_url.$this->m_product_category_name.'/'.implode('/', $this->m_tags);
        }

        $this->m_pagination = new Pagination($this->m_data);
        $this->m_pager = $this->m_pagination->PaginationDisplay($this->m_data);
        $this->m_start_record = $this->m_pagination->StartRecord($this->m_data);
        $this->m_records_per_page = $this->m_data['records_per_page'];
        $this->m_category_products = $this->m_loaded_model->getAllProducts($this->m_start_record, $this->m_records_per_page, $this->m_product_category_name);
        require_once VIEWS.'templates/layouts/base-products-layout.php';

        return $this->m_content_builder;
    }

    private function getProductsByGenderCategory()
    {
        /*

        This method retrieves all products of the supplied product gender category name ($m_product_gender_category)
        So if gender category is mens, all products with the gender category name of mens will be displayed.

         */

        $this->m_all_products = $this->m_loaded_model->countProductsByGenderCategory($this->m_tags[0]);

        /*
        Pagination properties
         * $this->m_data['total_records'] (Total number of items paginated)
         * $this->m_data['records_per_page'] (Number of items to be displayed per page)
         * $this->m_data['pagination_url'] (URL to the current page.)
         */
        $this->m_data['total_records'] = ($this->m_all_products['counter']);
        $this->m_data['records_per_page'] = 6;
        if (!$this->m_tags) {
            $this->m_data['pagination_url'] = $this->m_base_url.$this->m_product_category_name;
        } else {
            $this->m_data['pagination_url'] = $this->m_base_url.$this->m_product_category_name.'/'.implode('/', $this->m_tags);
        }

        $this->m_pagination = new Pagination($this->m_data);

        $this->m_pager = $this->m_pagination->PaginationDisplay($this->m_data);

        $this->m_start_record = $this->m_pagination->StartRecord($this->m_data);
        $this->m_records_per_page = $this->m_data['records_per_page'];

        $this->m_category_products = $this->m_loaded_model->getProductsByGender($this->m_start_record, $this->m_records_per_page, $this->m_tags[0]);

        require_once VIEWS.'templates/layouts/products-layout.php';

        return $this->m_content_builder;
    }

    public function getProductsByBrandCategory()
    {
        $this->m_all_products = $this->m_loaded_model->countProductsByBrandCategory($this->m_tags[0]);
        // $this->m_debugger     = $this->Dumper($this->m_all_products);
        // $this->m_debugger     = $this->Dumper($this->m_tags[0]);

        /*
        Pagination properties
         * $this->m_data['total_records'] (Total number of items paginated)
         * $this->m_data['records_per_page'] (Number of items to be displayed per page)
         * $this->m_data['pagination_url'] (URL to the current page.)
         */

        $this->m_data['total_records'] = ($this->m_all_products['counter']);
        $this->m_data['records_per_page'] = 6;
        if (!$this->m_tags) {
            $this->m_data['pagination_url'] = $this->m_base_url.$this->m_product_category_name;
        } else {
            $this->m_data['pagination_url'] = $this->m_base_url.$this->m_product_category_name.'/'.implode('/', $this->m_tags);
        }

        $this->m_pagination = new Pagination($this->m_data);

        $this->m_pager = $this->m_pagination->PaginationDisplay($this->m_data);

        $this->m_start_record = $this->m_pagination->StartRecord($this->m_data);
        $this->m_records_per_page = $this->m_data['records_per_page'];

        $this->m_category_products = $this->m_loaded_model->getProductsByBrand($this->m_start_record, $this->m_records_per_page, $this->m_tags[0]);

        require_once VIEWS.'templates/layouts/products-layout.php';

        return $this->m_content_builder;
    }

    public function getProductsByBikeCategory()
    {
        $this->m_all_products = $this->m_loaded_model->countProductsByBikeCategory($this->m_tags[0]);

        /*
        Pagination properties
         * $this->m_data['total_records'] (Total number of items paginated)
         * $this->m_data['records_per_page'] (Number of items to be displayed per page)
         * $this->m_data['pagination_url'] (URL to the current page.)
         */

        $this->m_data['total_records'] = ($this->m_all_products['counter']);
        $this->m_data['records_per_page'] = 6;
        if (!$this->m_tags) {
            $this->m_data['pagination_url'] = $this->m_base_url.$this->m_product_category_name;
        } else {
            $this->m_data['pagination_url'] = $this->m_base_url.$this->m_product_category_name.'/'.implode('/', $this->m_tags);
        }

        $this->m_pagination = new Pagination($this->m_data);

        $this->m_pager = $this->m_pagination->PaginationDisplay($this->m_data);

        $this->m_start_record = $this->m_pagination->StartRecord($this->m_data);
        $this->m_records_per_page = $this->m_data['records_per_page'];

        /* $this->m_category_products = $this->m_loaded_model->getProductsByBikeCategory($this->m_start_record, $this->m_records_per_page, $this->m_tags[0]); */

        $this->m_category_products = $this->m_loaded_model->getProductsByBikeCategory($this->m_start_record, $this->m_records_per_page, ($this->m_tags[0]));

        require_once VIEWS.'templates/layouts/products-layout.php';

        return $this->m_content_builder;
    }

    private function initArray($available_category)
    {
        $list = [];
        foreach ($available_category as $key => $value) {
            $list = array_merge($list, array_map('strtolower', array_values($value)));
        }

        return $list;
    }

    private function PageContent()
    {
        $m_available_product_categories = array();

        $m_available_product_categories[] = $this->nav->getCategoryMegaMenu();
        $m_available_product_categories[] = $this->nav->getBrandMegaMenu();
        $m_available_product_categories[] = $this->nav->getGenderMegaMenu();
        $gender_list = [];
        $brand_list = [];
        $bike_category_list = [];

        if (!isset($this->m_tags[0])) {
            $products = $this->getAllProducts();
        } else {
            if (isset($this->m_tags[0]) && in_array($this->m_tags[0], $this->initArray($m_available_product_categories[2]))) {
                $products = $this->getProductsByGenderCategory();
            } elseif (isset($this->m_tags[0]) && in_array($this->m_tags[0], $this->initArray($m_available_product_categories[1]))) {
                $products = $this->getProductsByBrandCategory();
            } elseif (isset($this->m_tags[0]) && in_array($this->m_tags[0], $this->initArray($m_available_product_categories[0]))) {
                // Write method for getting products based on bike category selected.
                $products = $this->getProductsByBikeCategory();
            } else {
                echo 'page does not exist';
            }
        }

        return array($products);
    }

    private function _mainContentDiv()
    {
        if (method_exists($this, 'PageContent')) {
            // $this->m_main_content = $this->PageBanners($this->m_page_id);

            $this->m_main_content .= '<main class="page-content">';
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
            // $this->m_main_content = $this->PageBanners($this->m_page_id);
            $this->m_main_content .= '<main class="page-content ">';

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
        require_once VIEWS.'templates/core/header.php';
        require_once VIEWS.'products/products-list.php';
        require_once VIEWS.'templates/core/footer.php';
    }

    public function product($url)
    {
        $product = new Product($url);

        return $product->index();
    }
}
