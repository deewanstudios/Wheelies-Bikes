<?php
	/**
	 *
	 */
	class FeaturedProducts
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

		private $m_section_heading;


		public function __construct  (  )
		{
			$this  ->  m_controller  =  new Controller  (  );
			$this  ->  m_model  =  'ProductsModel';
			$this  ->  m_page_id  =  3;
			$this  ->  m_image_directory  =  $this  ->  m_controller  ->  m_image_directory;
			$this  ->  m_loaded_model  =  $this  ->  ModelLoader  (  );
			// $this  ->  Product  (  );
			$this  ->  m_geo_plugin  =  new geoPlugin  (  );
			$this  ->  m_geo_plugin  ->  locate  (  );
			// $this  ->  m_geo_plugin  ->  locate  (  '86.136.236.96'  );
			// $this  ->  m_geo_plugin  ->  locate  (  "197.210.226.113"  );
			// $this  ->  m_geo_plugin  ->  locate  (  "41.66.192.0"  );
			// $this  ->  m_geo_plugin  ->  locate  (  "185.212.125.104"  );
			// $this  ->  m_geo_plugin  ->  locate  (  "79.175.219.146"  );
			// $this  ->  m_geo_plugin  ->  locate  (  "72.229.28.185"  );
			// $this  ->  m_geo_plugin  ->  locate  (  "77.111.246.16"  );
			// $this  ->  m_geo_plugin  ->  locate  (  "163.177.112.32"  );
			// $this  ->  m_product_name  =  $name;
			// $this  ->  m_product_id  =  $id;

		}


		protected function ModelLoader  (  )
		{
			$m_data  =  $this  ->  m_controller  ->  LoadModel  (  $this  ->  m_model  );
			return $m_data;
		}


		public function FeaturedProductsView  (  )
		{
			$this  ->  m_allowed_currency  =  $this  ->  m_loaded_model  ->  GetAllowedCurrencies  (  );

			$this  ->  m_section_heading  =  $this  ->  m_controller  ->  HeaderContent  (  "h2"  ,  "Our Best Selling Products"  ,  "text-center"  );
			$this  ->  m_category_products  =  $this  ->  m_loaded_model  ->  GetFeaturedProducts  (  );
			// $this  ->  m_controller  ->  m_debugger  =  $this  ->  m_controller  ->
			// Dumper  (  $this  ->  m_category_products  );
			require_once VIEWS  .  'templates/layouts/featured-products-layout.php';
			return $this  ->  m_content_builder;
		}


	}
?>
