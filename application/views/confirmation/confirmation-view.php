<?php
/**
 * Confirmation class view
 * This file is responsible for displaying the content of the confirmation page
 *
 * PHP version PHP 7.2.1.
 *
 * @category View
 *
 * @author Adedayo Adedapo <ade.adedapo9@gmail.com>
 *
 * @see   https://yoursite.com
 * @since 1.0.0
 */

echo $m_page_view = $this->_mainContentDiv();
?>


<script type="text/javascript">
        function countdown  (  )
        {
            var i  =  document.getElementById  (  'counter'  );
            if  (  parseInt  (  i.innerHTML  )  ===  1  )
            {

                var url = "<?php echo $this->m_base_url ?>";
                //local
                location.href  =  url;
            }
            i.innerHTML  =  parseInt  (  i.innerHTML  )  -  1;

        }


        setInterval  (  function  (  )
        {
            countdown  (  );
        }  ,  1000  );

</script>