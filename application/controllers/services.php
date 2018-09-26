<?php


	/**
	 * Home class
	 *
	 * @package Enter product package here
	 * @author  Deewanstudios Limited
	 */
	class Services extends Controller
	{


		public function __construct  (  )
		{
			$this  ->  m_model  =  'ServicesModel';
			$this  ->  m_page_id  =  3;

		}


		protected function ModelLoader  (  )
		{
			$m_data  =  $this  ->  LoadModel  (  $this  ->  m_model  );
			return $m_data;
		}


		private function PriceList  (  )
		{

			$this  ->  m_prices  =  $this  ->  m_loaded_model  ->  GetAllServices  (  );
			$this  ->  m_section_text  =  $this  ->  m_loaded_model  ->  PageText  (  );
			$this  ->  m_section_heading  =  $this  ->  HeaderContent  (  "h1"  ,  "workshop price list"  ,  "text-between"  );

			$this  ->  m_section_body  =  "Please note, these prices do not include parts and are listed only as a guide, costs will be confirmed on an individual basis. ";
			$para  =  $this  ->  SingleParagraph  (  $this  ->  m_section_body  );
			include VIEWS  .  "templates/layouts/workshop-price-list-section-layout.php";

			// $this  ->  m_debugger  =  $this  ->  Dumper  (  $para  );
			// $this  ->  m_debugger  =  $this  ->  Dumper  (  $this  ->  m_prices  );
			return array  (
				$this  ->  m_section_heading  ,
				$this  ->  m_content_builder
			);
		}


		private function WhoWeAreSection  (  )
		{

			// $this  ->  m_section_heading  =  $this  ->  HeaderContent  (  "h1"  ,  "who we
			// are"  );
			$this  ->  m_section_body  =  "Please note, these prices do not include parts are are listed only as a guide, costs will be confirmed on an individual basis. ";
			$para  =  $this  ->  SingleParagraph  (  $this  ->  m_section_body  );
			return array  (
				// $this  ->  m_section_heading  ,
				$para  );
		}


		private function WorkshopSection  (  )
		{

			$this  ->  m_section_heading  =  $this  ->  HeaderContent  (  "h1"  ,  "Workshop"  );
			$this  ->  m_section_body  =  "Lorem ipsum dolor sit amet, sit at alii praesent, nam falli habemus feugait ne, ne dolore laboramus ius. Ne ius nonumes instructior. Viderer perfecto vituperata mel ne, case timeam vis ne. Ut omnis fastidii pri, vix ea purto theophrastus. Et sit vocent voluptatum conclusionemque. Apeirian detraxit efficiendi his ad, sea in postea audire percipit.";
			$para  =  $this  ->  SingleParagraph  (  $this  ->  m_section_body  );
			return array  (
				$this  ->  m_section_heading  ,
				$para
			);
		}


		private function SectionedContentHolder  (  )
		{
			$this  ->  m_section_content  =  array  (  );
			// $this  ->  m_section_content  [  ]  =  $this  ->  WhoWeAreSection  (  );
			$this  ->  m_section_content  [  ]  =  $this  ->  PriceList  (  );
			// $this  ->  m_section_content  [  ]  =  $this  ->  WorkshopSection  (  );
			$m_section_regions  =  array_merge  (  $this  ->  m_section_content  );


			$views  =  $this  ->  CenteredSectionViewBuilder  (  $m_section_regions  );


			// $this  ->  m_debugger  =  $this  ->  Dumper  (  $views  );

			return $views;
		}


		private function CenteredContents  (  )
		{
			$this  ->  m_section_content  =  $this  ->  SectionedContentHolder  (  );
			return $this  ->  m_section_content;

		}


		public function PageContent  (  )
		{

			return array  (  $this  ->  CenteredContents  (  )  );

		}


		private function MainContentDiv  (  )
		{
			if  (  method_exists  (  $this  ,  'PageContent'  )  )
			{
				$this  ->  m_main_content  =  $this  ->  PageBanners  (  $this  ->  m_page_id  );
				$this  ->  m_main_content  .=  "<main class=\"page-content\">";


				foreach  (  $this-> PageContent() AS $m_page_element  )
				{
					$this  ->  m_main_content  .=  $m_page_element;
				}

				$this  ->  m_main_content  .=  "</main>";

				return $this  ->  m_main_content;

			}
			else
			{

				$this  ->  m_main_content  =  "<main class=\"page-content\">";

				$this  ->  m_main_content  .=  "<section class=\"section-98 section-sm-110\">";
				$this  ->  m_main_content  .=  "<div class=\"shell\">";
				$this  ->  m_main_content  .=  "<div class=\"range range-xs-center text-extra-big\">";

				$this  ->  m_main_content  .=  "There is currently no body content to dispay";

				$this  ->  m_main_content  .=  "</div>";
				$this  ->  m_main_content  .=  "</div>";
				$this  ->  m_main_content  .=  "</section>";

				$this  ->  m_main_content  .=  "</main>";
				return $this  ->  m_main_content;
			}


		}


		public function index  (  )
		{
			$this  ->  PageMetaData  (  $this  ->  m_page_id  );
			require_once '../application/views/templates/core/header.php';
			require_once '../application/views/services/services.php';
			require_once '../application/views/templates/core/footer.php';

		}


	}
?>