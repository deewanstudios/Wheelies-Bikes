<?php

class MasterModel extends SelectQueries
{

    protected $m_select_statement;
    protected $m_prepare_statement;
    protected $m_prepared_statement;
    protected $m_executed_statement;
    protected $m_returned_object;
    protected $m_query;

    protected $m_db_table;
    protected $m_page_id;
    protected $m_section_id;
    protected $m_limit;
    protected $m_image_purpose;

    protected $m_content_puller;

    protected $m_page_visibility = true;
    protected $m_order_by;

    public function __construct()
    {
        parent::__construct();
        $db               = Database::getInstance();
        $this->connection = $db->getConnection();
        // $this  ->  m_controller  =  new Controller();
        /*
        $this  ->  m_db_product_main_image_view  =  "main_product_images";
        $this  ->  m_db_product_table  =  "bike_products";*/

        // $this  ->  m_queries  =  new SelectQueries();

    }

    public function CountAll($table)
    {
        try
        {
            $this->m_select_statement   = "SELECT COUNT(*) FROM {$table}";
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();
            $this->m_executed_statement = $this->m_prepare_statement->fetchAll(PDO::FETCH_ASSOC);
            $this->m_returned_object    = $this->m_executed_statement;

            return array_shift($this->m_returned_object);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function CountQueryResult($sql = "")
    {
        try
        {
            $this->m_select_statement   = "SELECT COUNT(*) AS counter FROM {$sql}";
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();

            $this->m_executed_statement = $this->m_prepare_statement->fetchAll(PDO::FETCH_ASSOC);

            $this->m_returned_object = $this->m_executed_statement;

            return array_shift($this->m_returned_object);

            /*
        $this  ->  m_count  =  $this  ->  m_returned_object  ->  rowCount  (  );
        // return  (  $this  ->  m_count  );*/

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDataBySQL($sql = "")
    {
        try
        {
            $this->m_select_statement   = $sql;
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();
            $this->m_executed_statement = $this->m_prepare_statement->fetchAll(PDO::FETCH_ASSOC);
            $this->m_returned_object    = $this->m_executed_statement;

            return $this->m_returned_object;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function GetAllPages($page_visibility)
    {

        try
        {
            $this->m_select_statement   = ("SELECT name, url FROM pages where 1 = 1 and page_visibility = '{$page_visibility}'");
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();
            $this->m_executed_statement = $this->m_prepare_statement->fetchAll(PDO::FETCH_ASSOC);
            $this->m_returned_object    = $this->m_executed_statement;

            return $this->m_returned_object;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function GetAllPagesById($page_id)
    {

        try
        {
            $this->m_select_statement   = ("SELECT id, name, title, keywords, url FROM pages where 1 = 1 AND page_visibility = '{$this->m_page_visibility}' AND id = '{$page_id}'");
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();
            $this->m_executed_statement = $this->m_prepare_statement->fetchAll(PDO::FETCH_ASSOC);
            $this->m_returned_object    = $this->m_executed_statement;

            /*
            echo "<pre>";
            var_dump  (  $this  ->  m_select_statement  );
            echo "</pre>";*/

            return $this->m_returned_object;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function GetAllImages($image_purpose, $page_id, $order_by)
    {

        try
        {
            $this->m_select_statement   = ("SELECT * FROM images where 1 = 1 AND image_purpose ='{$image_purpose}' AND pages_id = '{$page_id}' AND image_visibility = '1' ORDER BY id {$order_by}");
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();
            $this->m_executed_statement = $this->m_prepared_statement->fetchAll(PDO::FETCH_ASSOC);
            $this->m_returned_object    = $this->m_executed_statement;
            return $this->m_returned_object;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function GetAllImagesByMultipleParams($image_purpose, $page_id, $row_id)
    {

        try
        {
            $this->m_select_statement   = ("SELECT * FROM images where 1 = 1 AND image_purpose ='{$image_purpose}' AND pages_id = '{$page_id}' AND image_visibility = '1' AND id ='{$row_id}'");
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();
            $this->m_executed_statement = $this->m_prepared_statement->fetchAll(PDO::FETCH_ASSOC);
            $this->m_returned_object    = $this->m_executed_statement;
            return $this->m_returned_object;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function GetAllImagesByPageId($m_page_id)
    {

        try
        {
            $this->m_select_statement   = ("SELECT * FROM images where 1 = 1 AND pages_id ={$m_page_id} AND image_visibility = '1'");
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();
            $this->m_executed_statement = $this->m_prepared_statement->fetchAll(PDO::FETCH_ASSOC);
            $this->m_returned_object    = $this->m_executed_statement;
            return $this->m_returned_object;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function GetAllImagesByPageIdAndPurpose($m_page_id, $image_purpose)
    {

        try
        {
            $this->m_select_statement   = ("SELECT * FROM images where 1 = 1 AND pages_id ={$m_page_id} AND image_purpose = '{$image_purpose}' AND image_visibility = '1'");
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();
            $this->m_executed_statement = $this->m_prepared_statement->fetchAll(PDO::FETCH_ASSOC);
            $this->m_returned_object    = $this->m_executed_statement;
            return $this->m_returned_object;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function GetAllImagesByPurpose($image_purpose)
    {

        try
        {
            $this->m_select_statement   = ("SELECT * FROM images where 1 = 1 AND image_purpose ='{$image_purpose}'AND image_visibility = '1'");
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();
            $this->m_executed_statement = $this->m_prepared_statement->fetchAll(PDO::FETCH_ASSOC);
            $this->m_returned_object    = $this->m_executed_statement;
            return $this->m_returned_object;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function GetAllPageContents($page_id, $region_id)
    {

        try
        {

            $this->m_select_statement   = ("SELECT P.id, H.heading_name, C.context from content AS C LEFT JOIN headings AS H on C.id = H.content_id LEFT JOIN pages AS P on C.pages_id = P.id LEFT JOIN region AS R on C.region_id = R.id WHERE P.id = {$page_id} AND R.id = {$region_id}");
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();
            $this->m_executed_statement = $this->m_prepared_statement->fetchAll(PDO::FETCH_ASSOC);
            $this->m_returned_object    = $this->m_executed_statement;
            return $this->m_returned_object;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function GetAllContentsById($page_id)
    {

        try
        {

            $this->m_select_statement   = (" SELECT * FROM content WHERE Pages_id = {$page_id} ");
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();
            $this->m_executed_statement = $this->m_prepared_statement->fetchAll(PDO::FETCH_ASSOC);
            $this->m_returned_object    = $this->m_executed_statement;
            return $this->m_returned_object;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function GetAllContextById($page_id)
    {

        try
        {

            $this->m_select_statement   = (" SELECT context FROM content WHERE Pages_id = {$page_id} ");
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();
            $this->m_executed_statement = $this->m_prepared_statement->fetchAll(PDO::FETCH_ASSOC);
            $this->m_returned_object    = $this->m_executed_statement;
            return $this->m_returned_object;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function GetAllContentsByIdAndRegion($f_page_id, $f_region_id)
    {

        try
        {

            $this->m_select_statement   = (" SELECT * FROM content WHERE Pages_id = {$f_page_id} AND region_id = {$f_region_id} ");
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();
            $this->m_executed_statement = $this->m_prepared_statement->fetchAll(PDO::FETCH_ASSOC);
            $this->m_returned_object    = $this->m_executed_statement;
            return $this->m_returned_object;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function GetAllPageMetaData($page_id)
    {
        try
        {
            $this->m_select_statement = ("SELECT name AS page_name, title AS page_title, description AS page_description, keywords AS page_keywords, url AS page_url
FROM pages
WHERE 1=1 AND page_visibility =1 AND id = {$page_id}");
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();
            $this->m_executed_statement = $this->m_prepared_statement->fetchAll(PDO::FETCH_ASSOC);
            $this->m_returned_object    = $this->m_executed_statement;
            return $this->m_returned_object;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function GetInformation()
    {

        try
        {
            $this->m_select_statement   = ("SELECT * FROM information WHERE 1=1");
            $this->m_prepare_statement  = $this->connection->prepare($this->m_select_statement);
            $this->m_prepared_statement = $this->m_prepare_statement;
            $this->m_prepared_statement->execute();
            $this->m_executed_statement = $this->m_prepared_statement->fetchAll(PDO::FETCH_ASSOC);
            $this->m_returned_object    = $this->m_executed_statement;
            return $this->m_returned_object;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function getBrandsCategoryMegaMenu()
    {
        try {
            $this->m_select_statement = $this->brandCategoryListQuery();
            $this->m_returned_object  = $this->GetDataBySQL($this->m_select_statement);
            return $this->m_returned_object;
        } catch (PDOException $e) {
            echo $e->GetMessage();
        }
    }


    public function getGenderCategoryMegaMenu()
    {
        try {
            $this->m_select_statement = $this->genderCategoryListQuery();
            $this->m_returned_object  = $this->GetDataBySQL($this->m_select_statement);
            return $this->m_returned_object;
        } catch (PDOException $e) {
            echo $e->GetMessage();
        }
    }

    public function getBikesCategoryMegaMenu()
    {
        try {
            $this->m_select_statement = $this->bikeCategoryListQuery();
            $this->m_returned_object  = $this->GetDataBySQL($this->m_select_statement);
            return $this->m_returned_object;
        } catch (PDOException $e) {
            echo $e->GetMessage();
        }
    }

 /*    public function getCategoriesMegaMenu()
    {
        try {
            $this->m_select_statement = $this->brandCategoryListQuery();
            $this->m_returned_object  = $this->GetDataBySQL($this->m_select_statement);
            return $this->m_returned_object;
        } catch (PDOException $e) {
            echo $e->GetMessage();
        }
    }
  */


    /*
public function GetInformation  (  )
{

try
{
$this  ->  m_select_statement  =  ("SELECT * FROM information WHERE 1=1");
$this  ->  m_prepare_statement  =  $this  ->  connection  ->  prepare  (  $this
->  m_select_statement  );
$this  ->  m_prepared_statement  =  $this  ->  m_prepare_statement;
$this  ->  m_prepared_statement  ->  execute  (  );
$this  ->  m_executed_statement  =  $this  ->  m_prepared_statement  ->
fetchAll  (  PDO  ::  FETCH_ASSOC  );
$this  ->  m_returned_object  =  $this  ->  m_executed_statement;
return $this  ->  m_returned_object;
}
catch(PDOException $e)
{
echo $e  ->  getMessage  (  );
}

}*/

}
