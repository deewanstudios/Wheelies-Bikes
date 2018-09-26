<?php
	/**
	 *
	 */
	class ServicesModel extends MasterModel
	{

		function __construct  (  )
		{
			parent  ::  __construct  (  );
			$this  ->  m_page_id  =  3;
			$this  ->  m_db_table  =  "services";

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


		public function GetAllServices  (  )
		{
			try
			{
				$this  ->  m_select_statement  =  "SELECT s.service_name, p.product_price_value";
				$this  ->  m_select_statement  .=  " FROM "  .  $this  ->  m_db_table  .  " AS s";
				$this  ->  m_select_statement  .=  " LEFT JOIN product_price AS p";
				$this  ->  m_select_statement  .=  " ON s.product_price_product_price_id = p.product_price_id";
				$this  ->  m_executed_statement  =  $this  ->  GetDataBySQL  (  $this  ->  m_select_statement  );
				$this  ->  m_returned_object  =  $this  ->  m_executed_statement;

				// $this  ->  m_debugger  =  $this  ->  m_controller  ->  Dumper  (  $this  ->  m_returned_object  );



				/*
				 echo "<pre>";
				 var_dump($this->m_select_statement);
				 echo "</pre>";*/

				return $this  ->  m_returned_object;
			}
			catch(PDOException $e)
			{
				echo $e  ->  getMessage  (  );
			}




		}


	}
?>