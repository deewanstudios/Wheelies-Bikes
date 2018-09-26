<?php
/**
 *
 */
class ProductsModel extends MasterModel
{

    // protected $m_product_category;
    private $m_is_best_seller = true;
    // public $m_visibility = true;

    public function __construct()
    {

        parent::__construct();

        $this->m_db_product_table = "products";
        $this->m_db_product_category_table = "product_category";
        $this->m_db_product_price_table = "product_price";
        $this->m_db_product_main_image_view = "main_product_images";
        $this->m_db_product_gender_category = "gender_categories";
        $this->m_db_product_model_year = "model_year";
        $this->m_db_product_bike_category = "bike_categories";
        $this->m_db_product_brand_category = "brands_categories";
        $this->m_db_product_image_table = "product_images";
        $this->m_db_product_specification_table = "product_specification";

    }

    public function ProductsCount()
    {
        $this->m_select_statement = "{$this->m_db_product_table}";
        $this->m_select_statement .= " WHERE product_visibility = {$this->m_page_visibility}";
        $this->m_executed_statement = $this->CountQueryResult($this->m_select_statement);
        $this->m_returned_object = $this->m_executed_statement;

        // $this->m_debugger = $this->m_controller->Dumper($this->m_select_statement);

        return $this->m_returned_object;

    }

    public function AllProductsImages($category_id)
    {
        $this->m_select_statement = $this->ProductsImageQuery($category_id);
        $this->m_returned_object = $this->GetDataBySQL($this->m_select_statement);
        return $this->m_returned_object;

    }

    public function ProductPrice($m_product_id)
    {
        $this->m_select_statement = $this->ProductPriceQuery($m_product_id);
        $this->m_returned_object = $this->GetDataBySQL($this->m_select_statement);
        return $this->m_returned_object;

    }

    public function ProductExists($m_product_id)
    {
        $this->m_select_statement = $this->ProductExistQuery($m_product_id);
        $this->m_returned_object = $this->GetDataBySQL($this->m_select_statement);
        return $this->m_returned_object;

    }

    public function MainProductsImageByProductCategory($category_id)
    {
        try
        {
            $this->m_select_statement = $this->MainImagesViewQuery($category_id);
            $this->m_returned_object = $this->GetDataBySQL($this->m_select_statement);
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            $error = $e->getCode();
            $error .= $e->getLine();
            $error .= $e->getFile();
            $error .= $e->getMessage();
            $error .= $e->getTrace();
            echo $error;
        }
    }

    public function CountAllProducts()
    {

        try
        {

            $this->m_statement = $this->ProductsQuery();
            $this->m_returned_object = $this->CountQueryResult($this->m_statement);

            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }

    }

    public function CountProductsGenderByCategory($category)
    {

        $this->m_select_statement = " {$this->m_db_product_table}";
        $this->m_select_statement .= " WHERE gender_categories_gender_cat_id = {$category}";
        $this->m_select_statement .= " AND product_visibility ={$this->m_page_visibility}";
        $this->m_executed_statement = $this->CountQueryResult($this->m_select_statement);
        $this->m_returned_object = $this->m_executed_statement;

        // $this  ->  m_debugger  =  $this  ->  m_controller  ->  Dumper  (  $this  ->
        // m_returned_object  );

        return $this->m_returned_object;

    }

    public function CountProductsByBikeCategory($category)
    {

        $this->m_select_statement = " {$this->m_db_product_table}";
        $this->m_select_statement .= " WHERE bike_categories_bike_cat_id = {$category}";
        $this->m_select_statement .= " AND product_visibility ={$this->m_page_visibility}";
        $this->m_executed_statement = $this->CountQueryResult($this->m_select_statement);
        $this->m_returned_object = $this->m_executed_statement;

        // $this  ->  m_debugger  =  $this  ->  m_controller  ->  Dumper  (  $this  ->
        // m_returned_object  );

        return $this->m_returned_object;

    }

    public function GetAllProducts($start_record, $records_per_page)
    {

        try
        {

            $this->m_statement = $this->ProductsQuery($start_record, $records_per_page, $this->m_page_visibility);

            $this->m_returned_object = $this->GetDataBySQL($this->m_statement);
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }

    }

    public function GetProductsByGender($start_record, $records_per_page, $category)
    {

        try
        {

            $this->m_statement = $this->ProductsQueryByGenderCategory($start_record, $records_per_page, $category, $this->m_page_visibility);

            $this->m_returned_object = $this->GetDataBySQL($this->m_statement);
            // $this->m_debugger = $this->m_controller->Dumper($this->m_returned_object);
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }

    }

    public function GetProductsByBikeCategory($start_record, $records_per_page, $category)
    {

        try
        {

            $this->m_statement = $this->ProductsQueryByBikeCategory($start_record, $records_per_page, $category);

            $this->m_returned_object = $this->GetDataBySQL($this->m_statement);
            // $this->m_debugger = $this->m_controller->Dumper($this->m_returned_object);s
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }

    }

    public function GetAllProductsById($m_product_id)
    {

        try
        {

            $this->m_statement = $this->AllProductsQuery($m_product_id);

            // $count  =  $this  ->  CountQueryResult  (  $this  ->  m_statement  );
            $this->m_returned_object = $this->GetDataBySQL($this->m_statement);
            // var_dump  (  $this  ->  m_returned_object  );
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }

    }

    public function GetSingleProducts($m_brand, $m_product_name, $m_product_model, $m_product_gender)
    {

        try
        {

            // $this  ->  m_statement  =  $this  ->  SingleProductQuery  (  $m_product_name
            // );
            $this->m_statement = $this->SingleProductQuery($m_brand, $m_product_name, $m_product_model, $m_product_gender);

            // $count  =  $this  ->  CountQueryResult  (  $this  ->  m_statement  );
            $this->m_returned_object = $this->GetDataBySQL($this->m_statement);
            // var_dump  (  $this  ->  m_returned_object  );
            // $this->m_debugger = $this->m_controller->Dumper($this->m_returned_object);
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }

    }

    public function GetSingleProductImage($m_product_id)
    {

        try
        {

            $this->m_statement = $this->SingleImageViewQuery($m_product_id);

            // $count  =  $this  ->  CountQueryResult  (  $this  ->  m_statement  );
            $this->m_returned_object = $this->GetDataBySQL($this->m_statement);
            // var_dump  (  $this  ->  m_returned_object  );
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }

    }

    public function GetFeaturedProducts()
    {

        try
        {

            $this->m_statement = $this->FeaturedProductsQuery();

            // $count  =  $this  ->  CountQueryResult  (  $this  ->  m_statement  );
            $this->m_returned_object = $this->GetDataBySQL($this->m_statement);
            // var_dump  (  $this  ->  m_returned_object  );
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }

    }

    public function GetProductSpecifications($m_product_id)
    {
        try {
            $this->m_select_statement = $this->ProductDescriptionQuery($m_product_id);
            $this->m_returned_object = $this->GetDataBySQL($this->m_select_statement);
            return $this->m_returned_object;
        } catch (PDOException $e) {
            echo $e->GetMessage();
        }
    }

}
