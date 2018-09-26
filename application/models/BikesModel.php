<?php
	/**
	 *
	 */
	class BikesModel extends ProductsModel
	{

		protected $m_product_class;

		public function __construct  (  )
		{
			parent  ::  __construct  (  );
			// $product  =  new Products  (  );
			// $this  ->  m_product_class  =  $product;
			$this  ->  m_db_table  =  "bike_products";
		}







	}
?>