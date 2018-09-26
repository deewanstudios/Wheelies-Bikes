<?php
	/**
	 *
	 */
	class AboutModel extends MasterModel
	{

		public function __construct  (  )
		{
			parent  ::  __construct  (  );
			$this  ->  m_page_id  =  4;

		}


		public function PageText  (  )
		{
			try
			{
				$this  ->  m_content_puller  =  $this  ->  GetAllContextById  (  $this  ->  m_page_id  );
				return $this  ->  m_content_puller;

			}
			catch(PDOException $e)
			{
				echo $e  ->  getMessage  (  );
			}
		}



		public function GetImages  ( )
		{
			try
			{
				$this  ->  m_content_puller  =  $this  ->  GetAllImagesByPageId  (  $this  ->  m_page_id );
				return $this  ->  m_content_puller;

			}
			catch(PDOException $e)
			{
				echo $e  ->  getMessage  (  );
			}
		}


	}
?>