<?php

	session_start  (  );
	/**
	 * Contact class
	 *
	 * @package Enter product package here
	 * @author  Deewanstudios Limited
	 */
	class Contact extends Controller
	{



		public function __construct  (  )
		{
			$this  ->  m_model  =  'ContactModel';
			$this  ->  m_page_id  =  5;
			// $this  ->  m_loaded_model  =  $this  ->  ModelLoader  (  );
		}


		protected function ModelLoader  (  )
		{
			$m_data  =  $this  ->  LoadModel  (  $this  ->  m_model  );
			return $m_data;
		}


		private function BusinessInformationSection  (  )
		{
			$m_business_information  =  $this  ->  m_loaded_model  ->  GetBusinessInfo  (  );
			foreach  (  $m_business_information AS $m_wheelies_information  )
			{

				$m_wheelies_phone_number  =  $m_wheelies_information  [  "business_telephone"  ];
				$m_wheelies_email  =  $m_wheelies_information  [  "business_email"  ];
				$m_wheelies_address  =  $m_wheelies_information  [  "building_number"  ]  .  ", ";
				$m_wheelies_address  .=  ucwords  (  $m_wheelies_information  [  "street_name"  ]  )  .  BR;
				$m_wheelies_address  .=  ucwords  (  $m_wheelies_information  [  "town_name"  ]  )  .  ", ";
				$m_wheelies_address  .=  ucwords  (  $m_wheelies_information  [  "county_name"  ]  )  .  BR;
				$m_wheelies_address  .=  strtoupper  (  $m_wheelies_information  [  "business_postcode"  ]  );

			}

			// $this  ->  m_debugger  =  $this  ->  Dumper  (  $m_wheelies_information  );
			/*
			 $this  ->  m_debugger  =  $this  ->  Dumper  (  $m_wheelies_phone_number  );
			 $this  ->  m_debugger  .=  $this  ->  Dumper  (  $m_wheelies_email  );
			 $this  ->  m_debugger  .=  $this  ->  Dumper  (  $m_wheelies_address  );*/

			require_once '../application/views/templates/layouts/contact-information-section-layout.php';
			return ($this  ->  m_content_builder);

		}


		/*
		 private function TopSectionView  (  )
		 {

		 require_once
		 '../application/views/templates/layouts/contact-us-top-section-layout.php';
		 return $this  ->  m_content_builder;

		 }*/


		private function FormSection  (  )
		{
			$this  ->  m_loaded_model  =  $this  ->  ModelLoader  (  );
			/*
			 $this  ->  m_section_text  =  $this  ->  m_loaded_model  ->  ContextualContent
			 (  );
			 $this  ->  m_section_heading  =  $this  ->  m_section_text  [  0  ]  [
			 "heading_name"  ];
			 $this  ->  m_section_body  =  $this  ->  m_section_text  [  0  ]  [  "context"
			 ];*/

			require_once '../application/views/templates/layouts/contact-form-section-layout.php';
			// $this  ->  m_debugger  =  $this  ->  Dumper  (  $this  ->  m_section_text  );
			return array  (  $this  ->  m_content_builder  );
		}


		private function MapSection  (  )
		{
			require_once VIEWS  .  "templates/layouts/map-section-layout.php";
			return ($this  ->  m_content_builder);
		}


		private function SectionedContentHolder  (  )
		{
			$this  ->  m_section_content  =  array  (  );
			$this  ->  m_section_content  [  ]  =  $this  ->  FormSection  (  );
			$m_section_regions  =  array_merge  (  $this  ->  m_section_content  );
			$views  =  $this  ->  CenteredSectionViewBuilder  (  $m_section_regions  );
			// $this  ->  m_debugger  =  $this  ->  Dumper  (  $views  );
			return $views;
		}


		/*
		 private function CenteredContents  (  )
		 {
		 $this  ->  m_section_content  =  $this  ->  SectionedContentHolder  (  );
		 return $this  ->  m_section_content;

		 }*/



		public function PageContent  (  )
		{

			return array  (  $this  ->  SectionedContentHolder  (  )  );

		}


		private function MainContentDiv  (  )
		{
			if  (  method_exists  (  $this  ,  'PageContent'  )  )
			{
				// $this  ->  m_main_content  =  $this  ->  PageBanners  (  $this  ->  m_page_id  );
				$this  ->  m_main_content  .=  $this  ->  BusinessInformationSection  (  );
				$this  ->  m_main_content  .=  $this  ->  MapSection  (  );
				$this  ->  m_main_content  .=  "<main class=\"page-content\">";


				foreach  (  $this-> PageContent() AS $m_page_element  )
				{
					$this  ->  m_main_content  .=  $m_page_element;
				}

				$this  ->  m_main_content  .=  "</main>";

				// $this  ->  m_main_content  .=  $this  ->  MapSection  (  );

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



			if  (  isset  (  $_POST  [  'contact-submit'  ]  )  )
			{
				$this  ->  m_debugger  =  $this  ->  Dumper  (  $_POST  );
				$this  ->  ContactFormProcessor  (  );
			}
			require_once '../application/views/templates/core/header.php';
			require_once '../application/views/contact/contact-us.php';
			require_once '../application/views/templates/core/footer.php';

		}


		public function Confirmation  (  )
		{

			require_once '../application/views/templates/core/header.php';
			require_once '../application/views/contact/contact-confirmation.php';
			require_once '../application/views/templates/core/footer.php';
		}


		private function ConfirmationPageContent  (  )
		{
			$fullname  =  $_SESSION  [  'name'  ];
			$this  ->  m_section_heading  =  "Confirmation Notification";
			$this  ->  m_section_body  =  "Hi "  .  $fullname  .  ", thanks for taking the time to contact us."  .  BR  .  "We will get back to you as soon as possible.";
			$redirect  =  "<p> You will be redirected to the home page in:</p>";
			$countdown  =  10;
			$this  ->  m_section_text  =  array  (  );
			$this  ->  m_section_text  [  ]  =  $this  ->  m_section_heading;
			$this  ->  m_section_text  [  ]  =  $this  ->  m_section_body;
			$this  ->  m_section_text  [  ]  =  $redirect;
			$this  ->  m_section_text  [  ]  =  "<div id=\"counter\">"  .  $countdown  .  "</div>";
			return $this  ->  m_section_text;
		}


		private function ConfirmationView  (  )
		{
			$this  ->  m_section_text  =  $this  ->  ConfirmationPageContent  (  );
			require_once '../application/views/templates/layouts/confirmation-view-layout.php';
			return $this  ->  m_content_builder;
		}


		/*
		 Contact Form Processing
		 */

		public function ContactFormProcessor  (  )
		{
			$sanitiser  =  new FormProcessor  (  );
			$this  ->  m_valid  =  TRUE;
			if  (  ($_SERVER  [  'REQUEST_METHOD'  ]  ==  'POST')  &&  (isset  (  $_POST  [  'contact-submit'  ]  ))  )
			{

				if  (  isset  (  $_POST  [  'firstname'  ]  )  )
				{
					$this  ->  m_form_field_firstname  =  $sanitiser  ->  safe_input  (  $_POST  [  'firstname'  ]  );


					$_SESSION  [  'firstname'  ]  =  $this  ->  m_form_field_firstname;
				}

				$this  ->  m_debugger  =  $this  ->  Dumper  (  $this  ->  m_form_field_firstname  );


				if  (  isset  (  $_POST  [  'lastname'  ]  )  )
				{
					$this  ->  m_form_field_surname  =  $sanitiser  ->  safe_input  (  $_POST  [  'lastname'  ]  );
					$_SESSION  [  'surname'  ]  =  $this  ->  m_form_field_surname;
				}

				$this  ->  m_debugger  =  $this  ->  Dumper  (  $this  ->  m_form_field_surname  );



				if  (  isset  (  $_POST  [  'email'  ]  )  )
				{
					$this  ->  m_form_field_email  =  $sanitiser  ->  safe_input  (  $_POST  [  'email'  ]  );
				}

				$this  ->  m_debugger  =  $this  ->  Dumper  (  $this  ->  m_form_field_email  );

				if  (  isset  (  $_POST  [  'phone'  ]  )  )
				{
					$this  ->  m_form_field_telephone  =  $sanitiser  ->  safe_input  (  $_POST  [  'phone'  ]  );
				}

				$this  ->  m_debugger  =  $this  ->  Dumper  (  $this  ->  m_form_field_telephone  );

				if  (  isset  (  $_POST  [  'message'  ]  )  ||  $_POST  [  'message'  ]  ==  ''  )
				{
					$this  ->  m_form_field_message  =  $sanitiser  ->  safe_input  (  $_POST  [  'message'  ]  );
				}

				$this  ->  m_debugger  =  $this  ->  Dumper  (  $this  ->  m_form_field_message  );


				if  (  $this  ->  m_valid  ==  TRUE  )
				{
				// $this  ->  m_loaded_model  =  $this  ->  ModelLoader  (  );


				// $m_business_information  =  $this  ->  m_loaded_model  ->  GetBusinessInfo  (
				// );


				/*
				 Insert  form fields into database
				 */
				$this  ->  m_loaded_model  ->  InsertContactFormDetails  (  $this  ->  m_form_field_firstname  ,  $this  ->  m_form_field_surname  ,  $this  ->  m_form_field_email  ,  $this  ->  m_form_field_telephone  ,  $this  ->  m_form_field_message  );


				/*var_dump($this  ->  m_loaded_model  ->InsertContactFormDetails($this  ->
				 * m_form_field_firstname  ,  $this  ->  m_form_field_surname  ,  $this  ->
				 * m_form_field_email  ,  $this  ->  m_form_field_telephone  ,  $this  ->
				 * m_form_field_message));*/


				/*
				 Send Email notification to client
				 */
				/*	$this  ->  EmailSender  (  $this  ->  m_form_field_name  ,  $this  ->
				 * m_form_field_email  ,  $this  ->  m_form_field_message  );*/


				/*
				 Redirect page to confirmation page
				 */

				/*header  (  'location: '  .  URL  .  "contact/confirmation"  );*/
				}else
			{
				echo "<script>alert('There was a problem, please try again!')</script>";
			}


			}



		}


		// end form processing



		private function EmailSender  (  $fullname  ,  $email  ,  $message  )
		{

			$to  =  'daniel@deewanstudios.com';
			// note the comma

			$emailSubject  =  'A message from your site visitor';

			$trimmedMessage  =  (($message));
			$wrapped  =  wordwrap  (  $trimmedMessage  ,  70  );
			$body  =  <<<EOD

			Contact Information:<br>

			Full Name: $fullname <br>

			Email Address: $email<br>

			<br><hr><br>
			<p>$wrapped</p>


EOD;

			$headers  =  'MIME-Version: 1.0'  .  "\r\n";
			$headers  .=  'Content-type: text/html; charset=iso-8859-1'  .  "\r\n";
			$headers  .=  'From: Contact Form <noreply@deewanstudios.com/>'  .  "\r\n";
			$headers  .=  'Bcc: info@deewanstudios.com'  .  "\r\n";

			// Mail it
			mail  (  $to  ,  $emailSubject  ,  $body  ,  $headers  );


		}


	}
?>