<?php
	/**
	 *
	 */
	class HomeModel extends MasterModel
	{


		private $m_featured_menu;


		public function __construct  (  )
		{

			parent  ::  __construct  (  );

			$this  ->  m_page_id  =  1;
			$this  ->  m_section_id  =  4;


		}


		public function ContextualContent  (  )
		{
			try
			{
				$this  ->  m_content_puller  =  $this  ->  GetAllContentsByIdAndRegion  (  $this  ->  m_page_id  ,  $this  ->  m_section_id  );
				return $this  ->  m_content_puller;

			}
			catch(PDOException $e)
			{
				echo $e  ->  getMessage  (  );
			}
		}


		public function FeaturedMenuItems  (  $f_category_id  )
		{

			try
			{
				$this  ->  m_content_puller  =  $this  ->  GetFeaturedMenu  (  $f_category_id  );
				return $this  ->  m_content_puller;

			}
			catch(PDOException $e)
			{
				echo $e  ->  getMessage  (  );
			}

		}


		public function FeaturedMenuHeadings  (  $f_category_id  )
		{

			try
			{
				$this  ->  m_content_puller  =  $this  ->  GetFeaturedMenuHeadings  (  $f_category_id  );
				return $this  ->  m_content_puller;

			}
			catch(PDOException $e)
			{
				echo $e  ->  getMessage  (  );
			}

		}


		public function FeaturedMenuImages  (  $menu_image_id  )
		{

			try
			{
				$this  ->  m_content_puller  =  $this  ->  GetMenuImagesById  (  $menu_image_id  );
				return $this  ->  m_content_puller;

			}
			catch(PDOException $e)
			{
				echo $e  ->  getMessage  (  );
			}

		}


		public function GetCallToActionImages  (  $row_id  )
		{

			try
			{
				$this  ->  m_image_purpose  =  "tab-image";
				$this  ->  m_order_by  =  "ASC";

				$this  ->  m_slider_images_getter  =  $this  ->  GetAllImagesByMultipleParams  (  $this  ->  m_image_purpose  ,  $this  ->  m_page_id  ,  $row_id  );
				return $this  ->  m_slider_images_getter;

				// echo "<pre>";
				// var_dump ( $this -> m_slider_images_getter );
				// echo "</pre>";


			}
			catch(PDOException $e)
			{
				echo $e  ->  getMessage  (  );
			}

		}


		public function GetFeaturedCategories  (  $row_id  )
		{

			try
			{
				$this  ->  m_select_statement  =  ("SELECT * FROM call_to_action_group where 1 = 1 AND id ='{$row_id}'");
				$this  ->  m_prepare_statement  =  $this  ->  connection  ->  prepare  (  $this  ->  m_select_statement  );
				$this  ->  m_prepared_statement  =  $this  ->  m_prepare_statement;
				$this  ->  m_prepared_statement  ->  execute  (  );
				$this  ->  m_executed_statement  =  $this  ->  m_prepared_statement  ->  fetchAll  (  PDO  ::  FETCH_ASSOC  );
				$this  ->  m_returned_object  =  $this  ->  m_executed_statement;
				return $this  ->  m_returned_object;

			}
			catch(PDOException $e)
			{
				echo $e  ->  getMessage  (  );
			}
		}


	}
?>