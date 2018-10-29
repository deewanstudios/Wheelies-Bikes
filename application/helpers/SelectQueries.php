<?php
/**
 *
 */
class SelectQueries
{
    public $m_controller;
    public $m_db_product_table;
    public $m_db_product_category_table;
    public $m_db_product_price_table;
    public $m_db_product_gender_category;
    public $m_db_product_model_year;
    public $m_db_product_bike_category;
    public $m_db_product_brand_category;
    protected $m_db_product_main_image_view;
    public $m_db_product_image_table;
    protected $m_db_product_specification_table;
    protected $m_query;

    public function __Construct()
    {
        $this->m_controller = new Controller();
        /*
        $this  ->  m_db_product_table  =  "bike_products";
        $this  ->  m_db_product_category_table  =  "product_category";
        $this  ->  m_db_product_price_table  =  "product_price";
        $this  ->  m_db_product_gender_category  =  "gender_categories";
        $this  ->  m_db_product_model_year  =  "model_year";
        $this  ->  m_db_product_bike_category  =  "bike_categories";
        $this  ->  m_db_product_brand_category  =  "brands_categories";
        $this  ->  m_db_product_main_image_view  =  "main_product_images";
        $this  ->  m_db_product_image_table  =  "product_images";*/

        // $this  ->  m_debugger  =  $this  ->  m_controller  ->  Dumper  (  $this  ->
        // m_db_product_main_image_view  );
    }

    public function ProductExistQuery($m_product_id)
    {

        $this->m_query = "SELECT product_id";
        $this->m_query .= " FROM {$this->m_db_product_table}";
        $this->m_query .= " WHERE p.product_id = $m_product_id";
        // $this  ->  m_debugger  =  $this  ->  m_controller  ->  Dumper  (  $this  ->
        // m_query  );

        return $this->m_query;
    }

    public function ProductPriceQuery($m_product_id)
    {
        $items = "";
        foreach ($m_product_id as $item) {
            # code...
            if ($items != "") {
                $items .= ",";
            }
            $items .= $item;
        }

        $this->m_query = "SELECT p.product_id,  pr.price_value";
        $this->m_query .= " FROM {$this->m_db_product_table} AS p";
        $this->m_query .= " LEFT JOIN {$this->m_db_product_price_table} AS pr";
        $this->m_query .= " ON p.price_price_id = pr.price_id";
        $this->m_query .= " WHERE p.product_id IN ({$items})";
        // $this  ->  m_debugger  =  $this  ->  m_controller  ->  Dumper  (  $this  ->
        // m_query  );

        return $this->m_query;
    }

    public function AllProductsQuery($m_product_id)
    {
        $items = "";
        foreach ($m_product_id as $item) {
            # code...
            if ($items != "") {
                $items .= ",";
            }
            $items .= $item;
        }

        $this->m_query = "SELECT p.product_id, p.product_name, p.product_description,
			p.is_best_seller, pc.product_cat_name,  pr.ngn, pr.usd, pr.eur, pr.gbp, mpi.image_caption, mpi.image_path";
        $this->m_query .= " FROM {$this->m_db_product_table} AS p";
        $this->m_query .= " LEFT JOIN {$this->m_db_product_category_table} AS pc";
        $this->m_query .= " ON p.product_category_product_cat_id =
			pc.product_cat_id";
        $this->m_query .= " LEFT JOIN {$this->m_db_product_price_table} AS pr";
        $this->m_query .= " ON p.price_price_id = pr.price_id";
        $this->m_query .= " LEFT JOIN {$this->m_db_main_image_view} AS mpi";
        $this->m_query .= " ON p.product_id = mpi.products_product_id";
        // $this  ->  m_query  .=  " WHERE p.product_id = {$m_product_id}";
        $this->m_query .= " WHERE p.product_id IN ({$items})";
        // $this  ->  m_query  .=  " ORDER BY rand()";
        // $this  ->  m_query  .=  " LIMIT $start_record, $records_per_page";
        // $this  ->  m_debugger  =  $this  ->  m_controller  ->  Dumper  (  $this  ->
        // m_query  );

        return $this->m_query;
    }

    // public function SingleProductQuery  (  $m_product_name  )
    /* public function SingleProductQuery  (  $m_product_id )
    {
    $this  ->  m_query  =  "SELECT p.product_id, p.product_name,
    p.product_description,
    p.is_best_seller, pr.product_price_value";
    $this  ->  m_query  .=  " FROM {$this->m_db_product_table} AS p";

    $this  ->  m_query  .=  " LEFT JOIN {$this->m_db_product_price_table} AS pr";
    $this  ->  m_query  .=  " ON p.product_price_product_price_id =
    pr.product_price_id";

    $this  ->  m_query  .=  " WHERE p.product_name
    ='{$m_product_name}'";
    $this  ->  m_query  .=  " WHERE p.product_id
    = $m_product_id ";
    $this  ->  m_query  .=  " WHERE p.product_id
    = 1 ";
    //  = $m_product_id";
    // $this  ->  m_query  .=  " LIMIT 0, 1";

    $this  ->  m_debugger  =  $this  ->  m_controller  ->  Dumper  (  $this  ->
    m_query  );

    return $this  ->  m_query;
    } */
    public function SingleProductQuery($m_brand, $m_product_name, $m_product_model, $m_product_gender)
    {
        $this->m_query = "SELECT
		p.product_id, br.brand_cat_name, p.product_name, p.product_model, gc.gender_cat_name, bc.bike_cat_name, p.product_description, m.model_year, pr.product_price_value";
        $this->m_query .= " FROM {$this->m_db_product_table} AS p";
        $this->m_query .= " LEFT JOIN {$this->m_db_product_model_year} AS m";
        $this->m_query .= " ON p.model_year_id = m.id";
        $this->m_query .= " LEFT JOIN {$this->m_db_product_brand_category} AS br";
        $this->m_query .= " ON p.brands_categories_brand_cat_id = br.brand_cat_id";
        $this->m_query .= " LEFT JOIN {$this->m_db_product_bike_category} AS bc";
        $this->m_query .= " ON p.bike_categories_bike_cat_id = bc.bike_cat_id";
        $this->m_query .= " LEFT JOIN {$this->m_db_product_gender_category} AS gc";
        $this->m_query .= " ON p.gender_categories_gender_cat_id = gc.gender_cat_id";
        $this->m_query .= " LEFT JOIN {$this->m_db_product_price_table} AS pr";
        $this->m_query .= " ON p.product_price_product_price_id = pr.product_price_id";
        // $this  ->  m_query  .=  " WHERE br.brand_cat_name = {str_replace  (  "-"  ,  "
        // "  ,  $m_brand  )}";
        $this->m_query .= " WHERE br.brand_cat_name = '$m_brand'";
        $this->m_query .= " AND p.product_name ='$m_product_name'";
        $this->m_query .= " AND gc.gender_cat_name ='$m_product_gender'";
        if (!empty($m_product_model)) {
            $this->m_query .= " AND p.product_model ='$m_product_model'";
        } else {
            $this->m_query .= " AND p.product_model IS NULL";
        }
        // $this  ->  m_debugger  =  $this  ->  m_controller  ->  Dumper  (  $this  ->  m_query  );

        return $this->m_query;
    }

    public function ProductsQuery($start_record, $records_per_page, $visibility, $product_type)
    {

        $this->m_query = "SELECT";
        $this->m_query .= " p.product_name,";
        $this->m_query .= " p.product_model,";
        $this->m_query .= " p.product_description,";
        $this->m_query .= " pc.product_cat_name,";
        $this->m_query .= " m.model_year,";
        $this->m_query .= " b.brand_cat_name,";
        $this->m_query .= " c.bike_cat_name,";
        $this->m_query .= " g.gender_cat_name,";
        $this->m_query .= " f.frame_size_cat_name,";
        $this->m_query .= " f.frame_size_cat_symbol,";
        $this->m_query .= " pp.product_price_value,";
        $this->m_query .= " mpi.image_caption,";
        $this->m_query .= " mpi.image_path";
        $this->m_query .= " FROM";
        $this->m_query .= " products AS p";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " product_category AS pc ON p.product_category_product_cat_id = pc.product_cat_id";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " model_year AS m ON p.model_year_id = m.id";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " brands_categories AS b ON p.brands_categories_brand_cat_id = b.brand_cat_id";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " bike_categories AS c ON p.bike_categories_bike_cat_id = c.bike_cat_id";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " gender_categories AS g ON p.gender_categories_gender_cat_id = g.gender_cat_id";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " frame_size_categories AS f ON p.frame_size_categories_frame_size_cat_id = f.frame_size_cat_id";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " product_price AS pp ON p.product_price_product_price_id = pp.product_price_id";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " main_product_images AS mpi ON p.product_id = mpi.bike_products_product_id";
        $this->m_query .= " WHERE";
        $this->m_query .= " p.product_visibility = {$visibility}";
        $this->m_query .= " AND p.product_category_product_cat_id = ANY";
        $this->m_query .= " (";
        $this->m_query .= " SELECT";
        $this->m_query .= " pc.product_cat_id";
        $this->m_query .= " FROM";
        $this->m_query .= " product_category AS pc";
        $this->m_query .= " WHERE";
        $this->m_query .= " pc.product_cat_name = '$product_type'";
        $this->m_query .= " )";
        $this->m_query .= " LIMIT $start_record , $records_per_page";

        /* $this->m_debugger = $this->m_controller->Dumper(wordwrap($this->
        m_query, 100)); */
        // $this  ->  m_debugger  =  $this  ->  m_controller  ->  Dumper  (  $this  ->
        // m_db_product_main_image_view  );
        return $this->m_query;
    }

    public function productsQueryByGenderCategory($start_record, $records_per_page, $category, $visibility)
    {
        $this->m_query = "SELECT p.product_name, p.product_model, p.product_description, pc.product_cat_name,
        m.model_year, b.brand_cat_name, c.bike_cat_name, g.gender_cat_name,
        f.frame_size_cat_name, f.frame_size_cat_symbol, pp.product_price_value, mpi.image_caption, mpi.image_path";
        $this->m_query .= " FROM {$this->m_db_product_table} AS p";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " product_category AS pc ON p.product_category_product_cat_id = pc.product_cat_id";
        $this->m_query .= " LEFT JOIN model_year AS m ON p.model_year_id = m.id";
        $this->m_query .= " LEFT JOIN brands_categories AS b ON p.brands_categories_brand_cat_id
        = b.brand_cat_id";
        $this->m_query .= " LEFT JOIN bike_categories AS c ON p.bike_categories_bike_cat_id =
        c.bike_cat_id";
        $this->m_query .= " LEFT JOIN gender_categories AS g ON
        p.gender_categories_gender_cat_id = g.gender_cat_id";
        $this->m_query .= " LEFT JOIN frame_size_categories AS f ON
        p.frame_size_categories_frame_size_cat_id = f.frame_size_cat_id";
        $this->m_query .= " LEFT JOIN product_price AS pp ON p.product_price_product_price_id =
        pp.product_price_id";
        $this->m_query .= " LEFT JOIN {$this->m_db_product_main_image_view} AS mpi";
        $this->m_query .= " ON p.product_id = mpi.bike_products_product_id";
        $this->m_query .= " WHERE g.gender_cat_name = '$category'";
        $this->m_query .= " AND p.product_visibility = {$visibility}";
        $this->m_query .= " LIMIT $start_record, $records_per_page";

        // $this->m_debugger = $this->m_controller->Dumper(wordwrap($this->m_query));
        return $this->m_query;
    }

    public function productsQueryByBrandCategory($start_record, $records_per_page, $category, $visibility)
    {
        $this->m_query = "SELECT p.product_name, p.product_model, p.product_description, pc.product_cat_name,
        m.model_year, b.brand_cat_name, c.bike_cat_name, g.gender_cat_name,
        f.frame_size_cat_name, f.frame_size_cat_symbol, pp.product_price_value, mpi.image_caption, mpi.image_path";
        $this->m_query .= " FROM {$this->m_db_product_table} AS p";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " product_category AS pc ON p.product_category_product_cat_id = pc.product_cat_id";
        $this->m_query .= " LEFT JOIN model_year AS m ON p.model_year_id = m.id";
        $this->m_query .= " LEFT JOIN brands_categories AS b ON p.brands_categories_brand_cat_id
        = b.brand_cat_id";
        $this->m_query .= " LEFT JOIN bike_categories AS c ON p.bike_categories_bike_cat_id =
        c.bike_cat_id";
        $this->m_query .= " LEFT JOIN gender_categories AS g ON
        p.gender_categories_gender_cat_id = g.gender_cat_id";
        $this->m_query .= " LEFT JOIN frame_size_categories AS f ON
        p.frame_size_categories_frame_size_cat_id = f.frame_size_cat_id";
        $this->m_query .= " LEFT JOIN product_price AS pp ON p.product_price_product_price_id =
        pp.product_price_id";
        $this->m_query .= " LEFT JOIN {$this->m_db_product_main_image_view} AS mpi";
        $this->m_query .= " ON p.product_id = mpi.bike_products_product_id";
        $this->m_query .= " WHERE b.brand_cat_name = '$category'";
        $this->m_query .= " AND p.product_visibility = {$visibility}";
        $this->m_query .= " LIMIT $start_record, $records_per_page";

        // $this->m_debugger = $this->m_controller->Dumper(wordwrap($this->m_query));
        //    var_dump($this->m_query);
        return $this->m_query;
    }

    public function productsQueryByBikeCategory($start_record, $records_per_page, $category, $visibility)
    {

        $this->m_query = "SELECT p.product_name, p.product_model, p.product_description,
			 m.model_year, b.brand_cat_name, c.bike_cat_name, g.gender_cat_name,
			 f.frame_size_cat_name, f.frame_size_cat_symbol, pp.product_price_value, mpi.image_caption, mpi.image_path";
        $this->m_query .= " FROM {$this->m_db_product_table} AS p";
        $this->m_query .= " LEFT JOIN model_year AS m ON p.model_year_id = m.id";
        $this->m_query .= " LEFT JOIN brands_categories AS b ON p.brands_categories_brand_cat_id
			 = b.brand_cat_id";
        $this->m_query .= " LEFT JOIN bike_categories AS c ON p.bike_categories_bike_cat_id =
			 c.bike_cat_id";
        $this->m_query .= " LEFT JOIN gender_categories AS g ON
			 p.gender_categories_gender_cat_id = g.gender_cat_id";
        $this->m_query .= " LEFT JOIN frame_size_categories AS f ON
			 p.frame_size_categories_frame_size_cat_id = f.frame_size_cat_id";
        $this->m_query .= " LEFT JOIN product_price AS pp ON p.product_price_product_price_id =
			 pp.product_price_id";
        $this->m_query .= " LEFT JOIN {$this->m_db_product_main_image_view} AS mpi";
        $this->m_query .= " ON p.product_id = mpi.bike_products_product_id";
        $this->m_query .= " Where c.bike_cat_name = '$category'";
        $this->m_query .= " AND p.product_visibility = {$visibility}";
        $this->m_query .= " LIMIT $start_record, $records_per_page";
        return $this->m_query;
    }

    public function FeaturedProductsQuery()
    {
        $this->m_query = "SELECT p.product_id, p.product_name, p.product_description,
		 p.is_best_seller, pc.product_cat_name,pr.ngn, pr.usd, pr.eur, pr.gbp, mpi.image_caption, mpi.image_path";
        $this->m_query .= " FROM {$this->m_db_product_table} AS p";
        $this->m_query .= " LEFT JOIN {$this->m_db_product_category_table} AS pc";
        $this->m_query .= " ON p.product_category_product_cat_id =
		 pc.product_cat_id";
        $this->m_query .= " LEFT JOIN {$this->m_db_product_price_table} AS pr";
        $this->m_query .= " ON p.price_price_id = pr.price_id";
        $this->m_query .= " LEFT JOIN {$this->m_db_main_image_view} AS mpi";
        $this->m_query .= " ON p.product_id = mpi.products_product_id";
        $this->m_query .= " WHERE p.is_best_seller
		 ={$this->m_is_best_seller}";
        $this->m_query .= " ORDER BY rand()";
        // $this  ->  m_debugger  =  $this  ->  m_controller  ->  Dumper  (  $this  ->
        // m_query  );
        return $this->m_query;
    }

    public function ProductsImageQuery($category_id)
    {
        $this->m_select_statement = "SELECT p.product_id, p_i.image_name,p_i.image_description,p_i.image_caption,p_i.image_path";
        $this->m_select_statement .= " FROM {$this->m_db_product_image_table} AS p_i";
        $this->m_select_statement .= " LEFT JOIN {$this->m_db_product_table}  AS p ON p_i.bike_products_product_id = p.product_id";
        $this->m_select_statement .= " WHERE p.product_id = {$category_id}";
        // $this  ->  m_debugger  =  $this  ->  m_controller  ->  Dumper  (  $this  ->
        // m_select_statement  );
        return $this->m_select_statement;
    }

    public function MainImagesViewQuery($table, $category_id)
    {
        $this->m_select_statement = "SELECT * FROM {$table}";
        $this->m_select_statement .= " WHERE product_category_product_cat_id = {$category_id}";
        // $this  ->  m_debugger  =  $this  ->  m_controller  ->  Dumper  (  $this  ->
        // m_select_statement  );
        return $this->m_select_statement;

    }

    public function SingleImageViewQuery($m_product_id)
    {
        $this->m_select_statement = "SELECT * FROM {$this->m_db_product_main_image_view}";
        $this->m_select_statement .= " WHERE bike_products_product_id = {$m_product_id}";
        // $this  ->  m_debugger  =  $this  ->  m_controller  ->  Dumper  (  $this  ->
        // m_select_statement  );
        return $this->m_select_statement;
    }

    public function ProductDescriptionQuery($m_product_id)
    {

        $this->m_query = "SELECT available_sizes, available_colours,frame,fork,rims,front_hub,rear_hub,crank,front_derailleur, rear_derailleur,shifters,brakes FROM {$this->m_db_product_specification_table}";
        $this->m_query .= " WHERE bike_products_product_id = {$m_product_id}";
        // $this->m_debugger = $this->m_controller->Dumper($this->m_query);
        return $this->m_query;

    }

    public function NewProductQuery($m_start_record, $m_records_per_page, $m_visibility, $m_gender_cat)
    {
        $this->m_query = "SELECT";
        $this->m_query .= " p.product_name, p.product_model, p.product_description, pc.product_cat_name, m.model_year, b.brand_cat_name, c.bike_cat_name, g.gender_cat_name, f.frame_size_cat_name, f.frame_size_cat_symbol, pp.product_price_value, mpi.image_caption, mpi.image_path";
        $this->m_query .= " FROM";
        $this->m_query .= " products AS p";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " product_category AS pc ON p.product_category_product_cat_id = pc.product_cat_id";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " model_year AS m ON p.model_year_id = m.id";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " brands_categories AS b ON p.brands_categories_brand_cat_id = b.brand_cat_id";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " bike_categories AS c ON p.bike_categories_bike_cat_id = c.bike_cat_id";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " gender_categories AS g ON p.gender_categories_gender_cat_id = g.gender_cat_id";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " frame_size_categories AS f ON p.frame_size_categories_frame_size_cat_id = f.frame_size_cat_id";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " product_price AS pp ON p.product_price_product_price_id = pp.product_price_id";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " main_product_images AS mpi ON p.product_id = mpi.bike_products_product_id";
        $this->m_query .= " WHERE";
        $this->m_query .= " p.product_visibility = {$m_visibility}";
        $this->m_query .= " AND p.gender_categories_gender_cat_id = ANY ";
        $this->m_query .= "(SELECT";
        $this->m_query .= " g.gender_cat_id";
        $this->m_query .= " FROM";
        $this->m_query .= " gender_categories AS g";
        $this->m_query .= " WHERE";
        $this->m_query .= " g.gender_cat_name = '$m_gender_cat'";
        $this->m_query .= ")";
        $this->m_query .= " LIMIT $m_start_record , $m_records_per_page";
        // $this->m_debugger = $this->m_controller->Dumper(wordWrap($this->m_query));

        return $this->m_query;
    }

    public function countByGenderQuery($visibility, $category)
    {

        // $this->m_query .= " products AS p";
        $this->m_query .= " {$this->m_db_product_table} AS p";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " gender_categories AS g ON p.gender_categories_gender_cat_id = g.gender_cat_id";
        $this->m_query .= " WHERE";
        $this->m_query .= " p.product_visibility = {$visibility}";
        $this->m_query .= " AND p.gender_categories_gender_cat_id =";
        $this->m_query .= " ANY";
        $this->m_query .= " (";
        $this->m_query .= " SELECT";
        $this->m_query .= " g.gender_cat_id";
        $this->m_query .= " FROM";
        $this->m_query .= " gender_categories AS g";
        $this->m_query .= " WHERE";
        $this->m_query .= " g.gender_cat_name = '$category')";

        // $this->m_debugger = $this->m_controller->Dumper(wordwrap($this->m_query));
        return $this->m_query;
    }

    public function countByBrandQuery($visibility, $category)
    {

        // $this->m_query .= " products AS p";
        $this->m_query .= " {$this->m_db_product_table} AS p";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " brands_categories AS b ON p.brands_categories_brand_cat_id = b.brand_cat_id";
        $this->m_query .= " WHERE";
        $this->m_query .= " p.product_visibility = {$visibility}";
        $this->m_query .= " AND p.brands_categories_brand_cat_id =";
        $this->m_query .= " ANY";
        $this->m_query .= " (";
        $this->m_query .= " SELECT";
        $this->m_query .= " b.brand_cat_id";
        $this->m_query .= " FROM";
        $this->m_query .= " brands_categories AS b";
        $this->m_query .= " WHERE";
        $this->m_query .= " b.brand_cat_name = '$category')";

        // $this->m_debugger = $this->m_controller->Dumper(wordwrap($this->m_query));
        return $this->m_query;
    }

    public function countByCategoryQuery($visibility, $category)
    {

        $this->m_query .= " {$this->m_db_product_table} AS p";
        $this->m_query .= " LEFT JOIN";
        $this->m_query .= " bike_categories AS b ON p.bike_categories_bike_cat_id = b.bike_cat_id";
        $this->m_query .= " WHERE";
        $this->m_query .= " p.product_visibility = {$visibility}";
        $this->m_query .= " AND p.bike_categories_bike_cat_id =";
        $this->m_query .= " ANY";
        $this->m_query .= " (";
        $this->m_query .= " SELECT";
        $this->m_query .= " b.bike_cat_id";
        $this->m_query .= " FROM";
        $this->m_query .= " bike_categories AS b";
        $this->m_query .= " WHERE";
        $this->m_query .= " b.bike_cat_name = '$category')";

        // $this->m_debugger = $this->m_controller->Dumper(wordwrap($this->m_query));
        return $this->m_query;
    }

    public function bikeCategoryListQuery()
    {
        $this->m_query = "SELECT";
        $this->m_query .= " bike_cat_name";
        $this->m_query .= " FROM";
        $this->m_query .= " bike_categories";
        $this->m_query .= " WHERE";
        $this->m_query .= " EXISTS( SELECT ";
        $this->m_query .= " bike_categories_bike_cat_id";
        $this->m_query .= " FROM";
        $this->m_query .= " products";
        $this->m_query .= " WHERE";
        $this->m_query .= " bike_categories_bike_cat_id = bike_cat_id)";
        $this->m_query .= " ORDER BY bike_cat_name ASC;";
        return $this->m_query;
    }

    public function brandCategoryListQuery()
    {
        $this->m_query = "SELECT";
        $this->m_query .= " brand_cat_name";
        $this->m_query .= " FROM";
        $this->m_query .= " brands_categories";
        $this->m_query .= " WHERE";
        $this->m_query .= " EXISTS( SELECT ";
        $this->m_query .= " brands_categories_brand_cat_id";
        $this->m_query .= " FROM";
        $this->m_query .= " products";
        $this->m_query .= " WHERE";
        $this->m_query .= " brands_categories_brand_cat_id = brand_cat_id)";
        $this->m_query .= " ORDER BY brand_cat_name ASC;";
        return $this->m_query;
    }

    public function genderCategoryListQuery()
    {
        $this->m_query = "SELECT";
        $this->m_query .= " gender_cat_name";
        $this->m_query .= " FROM";
        $this->m_query .= " gender_categories";
        $this->m_query .= " WHERE";
        $this->m_query .= " EXISTS( SELECT ";
        $this->m_query .= " gender_categories_gender_cat_id";
        $this->m_query .= " FROM";
        $this->m_query .= " products";
        $this->m_query .= " WHERE";
        $this->m_query .= " gender_categories_gender_cat_id = gender_cat_id)";
        $this->m_query .= " ORDER BY gender_cat_name ASC;";
        return $this->m_query;
    }

}
