<main class="page-content">
	<section class="section-50 section-sm-top-30 section-sm-bottom-98 text-left">
		<div class="shell">

			<?php echo $m_confirmation_content_view = $this->_confirmationView(); ?>
		</div>


	</section>


</main>


<script type="text/javascript">
	function countdown  (  )
	{
		var i  =  document.getElementById  (  'counter'  );
		if  (  parseInt  (  i.innerHTML  )  ===  3  )
		{
			//local
			location.href  =  "http://localhost:8888/KsSpiceAfricanRestaurant/";

			//testing remote
			// location.href = "http://chamai.perfectcode.co.uk/";

			//live
			// location.href = "http://www.celestialhonoursandmeritawardinternational.org/";

		}
		i.innerHTML  =  parseInt  (  i.innerHTML  )  -  1;

	}


	setInterval  (  function  (  )
	{
		countdown  (  );
	}  ,  1000  );

</script>