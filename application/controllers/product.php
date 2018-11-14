<?php

class Product extends Controller
{
    protected $m_product;
    protected $m_product_category_name;
    protected $m_product_category_id;
    protected $m_tags = array();

    private $m_product_id;
    private $m_product_name;
    private $m_product_model;
    private $m_product_description;
    private $m_product_images;
    private $m_main_product_image;
    private $m_product_price;
    public $m_image_directory;
    private $m_product_array;
    private $m_product_brand;
    private $m_product_gender;
    protected $m_tags_length;
    private $m_url_parts;

    public function __construct($tags = array())
    {
        parent::__construct();
        $this->m_model        = 'ProductsModel';
        $this->m_loaded_model = $this->ModelLoader();
        $this->m_tags         = $tags;
        $this->m_tags         = implode($this->m_tags);

        /* Sample data to test the product array length */

        /* tags that is not the right elements of array */
        // $this->m_tags = ("bikes/ladies/mountain/");

        # 1 array element
        /* Frog */
        $this->m_tags = ("bikes/kids/balance/frog/tadpole");
        /* GT */

        # 2 array element

        /* GT */
        // $this->m_tags         = ("bikes/mens/mountain/gt/aggressor-sport");
        /* Frog */
        // $this->m_tags         = ("bikes/kids/balance/frog/tadpole-mini");
        /* SE Racing */
        //    $this->m_tags = ("bikes/unisex/cruiser/se-racing/big-flyer");

        // 3 array element

        /* SE Racing */
        // $this->m_tags = ("bikes/unisex/cruiser/se-racing/beast-mode-ripper");
        /* GT */
        // $this->m_tags = ("bikes/mens/hybrid/gt/grade-al-comp");
        /* Frog */
        // $this->m_tags = ("bikes/kids/first-pedal/frog/52-single-speed");

        # 4 array element
        /* SE Racing */
        // $this->m_tags = ("bikes/unisex/cruiser/se-racing/mike-buff-pk-ripper");

        # 5 array element
        /* SE Racing */
        // $this->m_tags = ("bikes/unisex/cruiser/se-racing/perry-kramer-pk-ripper-looptail");

        if (isset($this->m_tags)) {
            # code...
            $this->m_tags        = explode("/", $this->m_tags);
            $this->m_tags        = array_filter($this->m_tags);
            $this->m_tags_length = count($this->m_tags);
        }
        // $this->m_tags = $tags;

        /*  $this->m_debugger = $this->Dumper($this->m_tags);
        $this->m_debugger = $this->Dumper($this->m_tags_length); */
        /*$this->m_debugger = $this->Dumper(count($this->m_tags)); */

    }

    public function ModelLoader()
    {
        $m_data = $this->LoadModel($this->m_model);
        return $m_data;
    }

    private function getProduct()
    {

        if (isset($this->m_tags) && $this->m_tags_length > 3) {
            // var_dump($this->m_tags);
            $this->m_url_parts   = $this->m_tags   = array_slice($this->m_tags, -2);
            $this->m_tags_length = count($this->m_url_parts);

            /*
            Extrapolate required parts of the url to properly set the member variables for the product, i.e brand, name and model etc.
             */

            if ($this->m_tags_length === 2) {
                # code...
                // var_dump($new_tags_length);

                /* Extracting product model information by setting it to the value of the first indexed element in the url parts array */
                if (strpos($this->m_url_parts[0], "-") !== false) {
                    # Stripping the value of the product brand of the hyphen character and replacing it with a space.
                    $this->m_product_brand = str_replace("-", " ", $this->m_url_parts[0]);
                } else {
# Simply setting the brand to the value of url parts first element
                    $this->m_product_brand = $this->m_url_parts[0];
                }

                # Checking if the second element in the url parts array has an hyphen in it
                if (strpos($this->m_url_parts[1], "-") !== false) {
                    # If the value does have an hyphen in it. Explode it using the hyphens and store the result as an array called product array.
                    $this->m_product_array = explode("-", $this->m_url_parts[1]);

                    # Count the number of array elements produced from the explosion of the second element of the url parts array
                    $this->m_tags_length = count($this->m_product_array);

                    if ($this->m_tags_length === 2) {
                        # code...
                        $this->m_debugger = $this->Dumper("Product array tags length is : " . $this->m_tags_length);

                        $this->m_product_name  = $this->m_product_array[0];
                        $this->m_product_model = $this->m_product_array[1];
                    } elseif ($this->m_tags_length === 3) {
                        # code...
                        $this->m_debugger = $this->Dumper("Product array tags length is : " . $this->m_tags_length);

                        $this->m_product_name = $this->m_product_array[0];
                        $this->m_product_name .= " ";
                        $this->m_product_name .= $this->m_product_array[1];
                        $this->m_product_model = $this->m_product_array[2];
                    } elseif ($this->m_tags_length === 4) {
                        # code...
                        $this->m_debugger = $this->Dumper("Product array tags length is : " . $this->m_tags_length);

                        $this->m_product_name = $this->m_product_array[0];
                        $this->m_product_name .= " ";
                        $this->m_product_name .= $this->m_product_array[1];
                        $this->m_product_name .= " ";
                        $this->m_product_name .= $this->m_product_array[2];
                        $this->m_product_model = $this->m_product_array[3];
                    } elseif ($this->m_tags_length === 5) {
                        # code...
                        $this->m_debugger = $this->Dumper("Product array tags length is : " . $this->m_tags_length);

                        $this->m_product_name = $this->m_product_array[0];
                        $this->m_product_name .= " ";
                        $this->m_product_name .= $this->m_product_array[1];
                        $this->m_product_name .= " ";
                        $this->m_product_name .= $this->m_product_array[2];
                        $this->m_product_model = $this->m_product_array[3];
                        $this->m_product_model .= " ";
                        $this->m_product_model .= $this->m_product_array[4];
                    } /* else {
                # What happens if product array is less than 2. Basically it has to be 1.
                $this->m_tags_length === 1;
                # code...
                $this->m_debugger = $this->Dumper("Product array tags length is :" . $this->m_tags_length);
                // $this->m_product_name

                } */
                } else {

                    $this->m_product_name = $this->m_url_parts[1];

                }
            } else {
                # code...
                # What happens, if length of tags is not equals to 2
                # Throw an Exception of invalid product parameters
                

                    // echo "Invalid brand and product entered";
                
                # This else statement is currently not been reached. Maybe it's not needed.
                # Since I'm already checking if the number of tags supplied is greater than 3.
            }

        } else {
            # code...
            echo "Invalid URL supplied from this node";
        }

        require_once VIEWS . 'templates/layouts/single-product-view-layout.php';

        return $this->m_content_builder;
    }

    private function PageContent()
    {

        return array($this->getProduct());
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

    public function index()
    {
        require_once VIEWS . "templates/core/header.php";
        require_once VIEWS . "products/products-list.php";
        require_once VIEWS . "templates/core/footer.php";
    }
}