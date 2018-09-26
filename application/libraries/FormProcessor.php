<?php
	/**
	 *
	 */
	class FormProcessor
	{

		protected $m_controller;
		protected $m_loaded_model;
		// private static $_instance;
		protected $m_base_url  =  URL;
		protected $m_form_field_name  ,  $m_form_field_email  ,  $m_form_field_message  ,  $m_valid  ,  $m_form_field_name_error  ,  $m_form_field_email_error;
		protected $m_model ;


		public function __construct  (  )
			{
				$this  ->  m_controller  =  new Controller  (  );
			}




		protected function ModelLoader  (  )
		{
			$m_data  =  $this  ->  m_controller  ->  LoadModel  (  $this  ->  m_model  );
			return $m_data;
		}



		public function safe_input  (  $data  )
		{
			$data  =  trim  (  $data  );
			$data  =  stripslashes  (  $data  );
			$data  =  htmlspecialchars  (  $data  );
			$data  =  htmlentities  (  $data  );
			$data  =  addslashes  (  $data  );
			return $data;
		}




	}
?>