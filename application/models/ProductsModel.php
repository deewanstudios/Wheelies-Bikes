<?php

class ProductsModel extends MasterModel
{
    public $m_is_best_seller = true;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->m_db_product_table = 'products';
        $this->m_db_product_category_table = 'product_category';
        $this->m_db_product_price_table = 'product_price';
        $this->m_db_product_main_image_view = 'main_product_images';
        $this->m_db_product_gender_category = 'gender_categories';
        $this->m_db_product_model_year = 'model_year';
        $this->m_db_product_bike_category = 'bike_categories';
        $this->m_db_product_brand_category = 'brands_categories';
        $this->m_db_product_image_table = 'product_images';
        $this->m_db_product_specification_table = 'product_specification';
    }

    /**
     * ProductsCount
     *
     * @return void
     */
    public function ProductsCount()
    {
        $this->m_select_statement = "{$this->m_db_product_table}";
        $this->m_select_statement .= " WHERE product_visibility = {$this->m_page_visibility}";
        $this->m_executed_statement = $this->CountQueryResult($this->m_select_statement);
        $this->m_returned_object = $this->m_executed_statement;

        return $this->m_returned_object;
    }

    /**
     * AllProductsImages
     *
     * @param  mixed $category_id
     *
     * @return void
     */
    public function AllProductsImages($category_id)
    {
        $this->m_select_statement = $this->ProductsImageQuery($category_id);
        $this->m_returned_object = $this->getDataBySQL($this->m_select_statement);

        return $this->m_returned_object;
    }

    /**
     * ProductPrice
     *
     * @param  mixed $m_product_id
     *
     * @return void
     */
    public function ProductPrice($m_product_id)
    {
        $this->m_select_statement = $this->ProductPriceQuery($m_product_id);
        $this->m_returned_object = $this->getDataBySQL($this->m_select_statement);

        return $this->m_returned_object;
    }

    /**
     * ProductExists
     *
     * @param  mixed $m_product_id
     *
     * @return void
     */
    public function ProductExists($m_product_id)
    {
        $this->m_select_statement = $this->ProductExistQuery($m_product_id);
        $this->m_returned_object = $this->getDataBySQL($this->m_select_statement);

        return $this->m_returned_object;
    }

    /**
     * MainProductsImageByProductCategory
     *
     * @param  mixed $category_id
     *
     * @return void
     */
    public function MainProductsImageByProductCategory($category_id)
    {
        try {
            $this->m_select_statement = $this->MainImagesViewQuery($category_id);
            $this->m_returned_object = $this->getDataBySQL($this->m_select_statement);

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
        try {
            $this->m_statement = $this->ProductsQuery();
            $this->m_returned_object = $this->CountQueryResult($this->m_statement);

            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function countProductsByGenderCategory($category)
    {
        $this->m_select_statement = $this->countByGenderQuery($this->m_page_visibility, $category);
        $this->m_executed_statement = $this->CountQueryResult($this->m_select_statement);
        $this->m_returned_object = $this->m_executed_statement;

        return $this->m_returned_object;
    }

    public function countProductsByBrandCategory($category)
    {
        $this->m_select_statement = $this->countByBrandQuery($this->m_page_visibility, $category);
        $this->m_executed_statement = $this->CountQueryResult($this->m_select_statement);
        $this->m_returned_object = $this->m_executed_statement;

        return $this->m_returned_object;
    }

    public function countProductsByBikeCategory($category)
    {
        $this->m_select_statement = $this->countByCategoryQuery($this->m_page_visibility, $category);
        $this->m_executed_statement = $this->CountQueryResult($this->m_select_statement);
        $this->m_returned_object = $this->m_executed_statement;

        return $this->m_returned_object;
    }

    public function getAllProducts($start_record, $records_per_page, $category)
    {
        try {
            $this->m_statement = $this->ProductsQuery($start_record, $records_per_page, $this->m_page_visibility, $category);

            $this->m_returned_object = $this->getDataBySQL($this->m_statement);

            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function getProductsByGender($start_record, $records_per_page, $category)
    {
        try {
            $this->m_statement = $this->productsQueryByGenderCategory($start_record, $records_per_page, $category, $this->m_page_visibility);
            $this->m_returned_object = $this->getDataBySQL($this->m_statement);

            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function getProductsByBrand($start_record, $records_per_page, $category)
    {
        try {
            $this->m_statement = $this->productsQueryByBrandCategory($start_record, $records_per_page, $category, $this->m_page_visibility);

            $this->m_returned_object = $this->getDataBySQL($this->m_statement);

            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function getProductsByBikeCategory($start_record, $records_per_page, $category)
    {
        try {
            $this->m_statement = $this->productsQueryByBikeCategory($start_record, $records_per_page, $category, $this->m_page_visibility);
            $this->m_returned_object = $this->getDataBySQL($this->m_statement);

            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function GetAllProductsById($m_product_id)
    {
        try {
            $this->m_statement = $this->AllProductsQuery($m_product_id);
            $this->m_returned_object = $this->getDataBySQL($this->m_statement);

            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function GetSingleProducts($m_brand, $m_product_name, $m_product_model, $m_product_gender)
    {
        try {
            $this->m_statement = $this->SingleProductQuery($m_brand, $m_product_name, $m_product_model, $m_product_gender);
            $this->m_returned_object = $this->getDataBySQL($this->m_statement);

            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function GetSingleProductImage($m_product_id)
    {
        try {
            $this->m_statement = $this->SingleImageViewQuery($m_product_id);
            $this->m_returned_object = $this->getDataBySQL($this->m_statement);

            return $this->m_returned_object;
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function getFeaturedProducts()
    {
        try {
            $this->m_statement = $this->featuredProductsQuery($this->m_is_best_seller);
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
            $this->m_returned_object = $this->getDataBySQL($this->m_select_statement);

            return $this->m_returned_object;
        } catch (PDOException $e) {
            echo $e->GetMessage();
        }
    }

    /**
     * getProductId.
     *
     * @param mixed $m_product_name
     * @param mixed $m_product_model
     */
    public function getProductId($m_product_name, $m_product_model)
    {
        try {
            $this->m_select_statement = $this->getProductIdQuery($m_product_name, $m_product_model);
            $this->m_returned_object = $this->getDataBySQL($this->m_select_statement);
            // var_dump(wordwrap($this->m_select_statement, 50));
            return $this->m_returned_object;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * getProductPrice.
     *
     * @param mixed $m_product_name
     * @param mixed $m_product_model
     */
    public function getProductPrice($product_id)
    {
        try {
            $this->m_select_statement = $this->getProductPriceQuery($product_id);
            $this->m_returned_object = $this->getDataBySQL($this->m_select_statement);
            // var_dump(wordwrap($this->m_select_statement, 50));
            // var_dump($product_id);
            // var_dump($this->m_returned_object);

            return $this->m_returned_object;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * getProductMainImage.
     *
     * @param mixed $product_id
     */
    public function getProductMainImage($product_id)
    {
        try {
            $this->m_select_statement = $this->getProductMainImageQuery($product_id, $this->m_page_visibility);
            $this->m_returned_object = $this->getDataBySQL($this->m_select_statement);
            // var_dump(wordwrap($this->m_select_statement, 50));

            return $this->m_returned_object;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * InsertEnquiry
     *
     * @return void
     */
    public function insertEnquiry($name, $phone, $email, $message)
    {
        try {
            //Insert statement.
            $query = (
                'INSERT INTO
                    product_enquiry
                    (name, phone_number, email, message, time)
                    VALUES(?,?,?,?,NOW())'
            );
            if (!$query) {
                // throw an exception if the query fails.
                throw new queryException(
                    'Oops!!! This error is down to missing vital information,
                 required fo this task to be completed'
                );
            } else {
                // use database connection to invoke PDO's prepare method.
                $data = $this->connection->prepare($query);
                if (!$data) {
                    // throw an exception if call to PDO's prepare function through the connection fails.
                    throw new connectionException(
                        'Oops!!! There is a connection error'
                    );
                } else {
                    // bind the insertEnquiry's method parameters to the insert statement's values. Using the bindParam method through the data variable.
                    $data->bindParam(1, $name);
                    $data->bindParam(2, $phone);
                    $data->bindParam(3, $email);
                    $data->bindParam(4, $message);
                    $data->execute();
                }
            }

        } catch (queryException $e) {
            // output exception message
            echo (
                'Error (File: ' . getFile() . ', line ' . $e->getLine() . '): ' . $e->getMessage()
            );
        } catch (connectionException $e) {
            // output exception message
            echo (
                'Error (File: ' . getFile() . ', line ' . $e->getLine() . '): ' . $e->getMessage()
            );
        }
    }
}
