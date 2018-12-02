<?php
/**
 *
 */
class ProductsModel extends MasterModel
{

    public $m_is_best_seller = true;

    public function __construct()
    {
        parent::__construct();
        $this->m_db_product_table               = "products";
        $this->m_db_product_category_table      = "product_category";
        $this->m_db_product_price_table         = "product_price";
        $this->m_db_product_main_image_view     = "main_product_images";
        $this->m_db_product_gender_category     = "gender_categories";
        $this->m_db_product_model_year          = "model_year";
        $this->m_db_product_bike_category       = "bike_categories";
        $this->m_db_product_brand_category      = "brands_categories";
        $this->m_db_product_image_table         = "product_images";
        $this->m_db_product_specification_table = "product_specification";
    }

    public function ProductsCount()
    {
        $this->m_select_statement = "{$this->m_db_product_table}";
        $this->m_select_statement .= " WHERE product_visibility = {$this->m_page_visibility}";
        $this->m_executed_statement = $this->CountQueryResult($this->m_select_statement);
        $this->m_returned_object    = $this->m_executed_statement;
        return $this->m_returned_object;
    }

    public function AllProductsImages($category_id)
    {
        $this->m_select_statement = $this->ProductsImageQuery($category_id);
        $this->m_returned_object  = $this->getDataBySQL($this->m_select_statement);
        return $this->m_returned_object;

    }

    public function ProductPrice($m_product_id)
    {
        $this->m_select_statement = $this->ProductPriceQuery($m_product_id);
        $this->m_returned_object  = $this->getDataBySQL($this->m_select_statement);
        return $this->m_returned_object;

    }

    public function ProductExists($m_product_id)
    {
        $this->m_select_statement = $this->ProductExistQuery($m_product_id);
        $this->m_returned_object  = $this->getDataBySQL($this->m_select_statement);
        return $this->m_returned_object;

    }

    public function MainProductsImageByProductCategory($category_id)
    {
        try
        {
            $this->m_select_statement = $this->MainImagesViewQuery($category_id);
            $this->m_returned_object  = $this->getDataBySQL($this->m_select_statement);
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
            $this->m_statement       = $this->ProductsQuery();
            $this->m_returned_object = $this->CountQueryResult($this->m_statement);
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function countProductsByGenderCategory($category)
    {
        $this->m_select_statement   = $this->countByGenderQuery($this->m_page_visibility, $category);
        $this->m_executed_statement = $this->CountQueryResult($this->m_select_statement);
        $this->m_returned_object    = $this->m_executed_statement;
        return $this->m_returned_object;
    }

    public function countProductsByBrandCategory($category)
    {
        $this->m_select_statement   = $this->countByBrandQuery($this->m_page_visibility, $category);
        $this->m_executed_statement = $this->CountQueryResult($this->m_select_statement);
        $this->m_returned_object    = $this->m_executed_statement;
        return $this->m_returned_object;
    }
    public function countProductsByBikeCategory($category)
    {
        $this->m_select_statement   = $this->countByCategoryQuery($this->m_page_visibility, $category);
        $this->m_executed_statement = $this->CountQueryResult($this->m_select_statement);
        $this->m_returned_object    = $this->m_executed_statement;
        return $this->m_returned_object;
    }

    public function getAllProducts($start_record, $records_per_page, $category)
    {
        try
        {
            $this->m_statement = $this->ProductsQuery($start_record, $records_per_page, $this->m_page_visibility, $category);

            $this->m_returned_object = $this->getDataBySQL($this->m_statement);
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function getProductsByGender($start_record, $records_per_page, $category)
    {
        try
        {
            $this->m_statement       = $this->productsQueryByGenderCategory($start_record, $records_per_page, $category, $this->m_page_visibility);
            $this->m_returned_object = $this->getDataBySQL($this->m_statement);
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function getProductsByBrand($start_record, $records_per_page, $category)
    {
        try
        {
            $this->m_statement = $this->productsQueryByBrandCategory($start_record, $records_per_page, $category, $this->m_page_visibility);

            $this->m_returned_object = $this->getDataBySQL($this->m_statement);
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function getProductsByBikeCategory($start_record, $records_per_page, $category)
    {
        try
        {
            $this->m_statement       = $this->productsQueryByBikeCategory($start_record, $records_per_page, $category, $this->m_page_visibility);
            $this->m_returned_object = $this->getDataBySQL($this->m_statement);
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function GetAllProductsById($m_product_id)
    {
        try
        {
            $this->m_statement       = $this->AllProductsQuery($m_product_id);
            $this->m_returned_object = $this->getDataBySQL($this->m_statement);
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function GetSingleProducts($m_brand, $m_product_name, $m_product_model, $m_product_gender)
    {
        try
        {
            $this->m_statement       = $this->SingleProductQuery($m_brand, $m_product_name, $m_product_model, $m_product_gender);
            $this->m_returned_object = $this->getDataBySQL($this->m_statement);
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function GetSingleProductImage($m_product_id)
    {
        try
        {
            $this->m_statement       = $this->SingleImageViewQuery($m_product_id);
            $this->m_returned_object = $this->getDataBySQL($this->m_statement);
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function getFeaturedProducts()
    {
        try
        {
            $this->m_statement       = $this->featuredProductsQuery($this->m_is_best_seller);
            $this->m_returned_object = $this->getDataBySQL($this->m_statement);
            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function getProductSpecification($m_product_id)
    {
        try {
            $this->m_select_statement = $this->ProductDescriptionQuery($m_product_id);
            $this->m_returned_object  = $this->getDataBySQL($this->m_select_statement);
            return $this->m_returned_object;
        } catch (PDOException $e) {
            echo $e->GetMessage();
        }
    }

}
