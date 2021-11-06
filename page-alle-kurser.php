<?php





get_header();

?>



	<div id="section" class="content-area">

		<main id="main" class="site-main">

		</main><!-- #main -->

	</div><!-- #section -->

<script>
 let kurser;
      
        //url til restdb 
        const url = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus";
       

        // asynkron function som afventer og indhenter json data fra restdb
        async function hentData() {
            const jsonData = await fetch(url);
            kurser = await jsonData.json();
            visKurser();
        }

		function visKurser(){
			console.log(kurser);
		}



</script>

<?php

get_footer();