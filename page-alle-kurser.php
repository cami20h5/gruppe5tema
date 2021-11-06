<?php





get_header();

?>



	<section id="section" class="content-area">

		<main id="main" class="site-main">
			<h1 id="add"></h1>
		</main><!-- #main -->
		
<script>let kurser;
      
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
		  document.getElementById("add").innerHTML = "changed!";
	  }

</script>

	</section><!-- #section -->


<?php

get_footer();