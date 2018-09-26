<?php


	class Navigation
	{

		protected $m_controller;
		protected $m_model  =  'NavigationModel';
		protected $m_loaded_model;
		protected $m_base_url  =  URL;
		protected $m_image_directory  =  IMAGES;
		protected $m_video_directory  =  VIDEO;
		protected $m_navigation;
		protected $m_sub_navigation;
		protected $m_footer;
		protected $m_slider_jumbotron;
		protected $m_large_spacer;
		protected $m_string_splitter;
		protected $m_project_name;
		protected $m_left_sidebar;
		protected $m_left_sidebar_catergory;
		protected $m_left_sidebar_brand;
		protected $m_left_sidebar_size;



		public function __construct  (  )
		{
			$this  ->  m_controller  =  new Controller  (  );
			$this  ->  m_large_spacer  =  $this  ->  m_controller  ->  LargeSpacer  (  );
			$this  ->  m_string_splitter  =  $this  ->  m_controller  ->  StringSplitter  (  );
			$this  ->  m_project_name  =  $this  ->  m_controller  ->  m_project_name;

		}


		protected function ModelLoader  (  )
		{
			$m_data  =  $this  ->  m_controller  ->  LoadModel  (  $this  ->  m_model  );
			return $m_data;
		}


		public function PageLoader  (  )
		{
			require_once VIEWS  .  'templates/layouts/navigation/page-loader-layout.php';
			return $this  ->  m_page_loader;
		}


		private function PageLinks  (  )
		{
			$this  ->  m_loaded_model  =  $this  ->  ModelLoader  (  );
			$m_links  =  $this  ->  m_loaded_model  ->  GetLinks  (  );


			foreach  (  $m_links AS $m_link  )
			{
				$this  ->  m_navigation  .=  "<li class=\"\">";
				$this  ->  m_navigation  .=  "<a href=\"";
				$this  ->  m_navigation  .=  $this  ->  m_base_url;
				$this  ->  m_navigation  .=  strtolower  (  $m_link  [  "url"  ]  );
				$this  ->  m_navigation  .=  "\">";
				$this  ->  m_navigation  .=  "<span>";
				$this  ->  m_navigation  .=  ucwords  (  $m_link  [  "name"  ]  );
				$this  ->  m_navigation  .=  "</span>";
				$this  ->  m_navigation  .=  "</a>";
				$this  ->  m_navigation  .=  "</li>";

			}

		}



				private function FooterLinks  (  )
				{
					$this  ->  m_loaded_model  =  $this  ->  ModelLoader  (  );
					$m_links  =  $this  ->  m_loaded_model  ->  GetLinks  (  );


					foreach  (  $m_links AS $m_link  )
					{
						$this  ->  m_footer  .=  "<li class=\"\">";
						$this  ->  m_footer  .=  "<a href=\"";
						$this  ->  m_footer  .=  $this  ->  m_base_url;
						$this  ->  m_footer  .=  strtolower  (  $m_link  [  "url"  ]  );
						$this  ->  m_footer  .=  "\">";
						$this  ->  m_footer  .=  "<span>";
						$this  ->  m_footer  .=  ucwords  (  $m_link  [  "name"  ]  );
						$this  ->  m_footer  .=  "</span>";
						$this  ->  m_footer  .=  "</a>";
						$this  ->  m_footer  .=  "</li>";

					}

				}




		public function Slider  (  )
		{

			$this  ->  m_loaded_model  =  $this  ->  ModelLoader  (  );
			$m_slider_images  =  $this  ->  m_loaded_model  ->  GetSliderImages  (  );
			$m_slider_texts  =  $this  ->  m_loaded_model  ->  GetSliderText  (  );

//
			// $this  ->  m_controller  ->  m_debugger  =  $this  ->  m_controller  ->
			// Dumper  (  $m_slider_images  );

			require_once '../application/views/templates/layouts/slider-layout.php';
			return $this  ->  m_slider;
		}


		public function LandingPageHeader  (  )
		{

			require_once '../application/views/templates/layouts/navigation/default-navigation-layout.php';
			// require_once '../application/views/templates/layouts/navigation/landing-navigation-layout.php';
			// require_once '../application/views/templates/layouts/navigation/landing-navigation-floated-layout.php';
			return $this  ->  m_navigation;
		}


		public function PageHeader  (  )
		{
			require_once '../application/views/templates/layouts/navigation/default-navigation-layout.php';
			return $this  ->  m_navigation;
		}


		public function SiteFooter  (  )
		{
			$this  ->  m_loaded_model  =  $this  ->  ModelLoader  (  );
			// $m_business_information  =  $this  ->  m_loaded_model  ->  GetBusinessInfo  (
			// );

			$copy  =  date  (  "Y"  );

			// require '../application/views/templates/layouts/navigation/site-footer-layout-2.php';
			require '../application/views/templates/layouts/navigation/site-footer-layout.php';
			return $this  ->  m_footer;

		}


	}
?>
