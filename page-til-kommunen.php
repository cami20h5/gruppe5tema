<?php





get_header();

?>



	<section id="section" class="content-area">

	<main id="main" class="site-main">


	<?php

// Start the Loop.
while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content/content', 'page' );

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }

endwhile; // End the loop.
?>




	<section id="intro">
	<div class="introboks"><p class="introtekst">Undervisning i uddannelsesvalg, demokratisk dannelse og FN’s verdensmålHvordan udbreder kommunen sine vigtige budskaber om demokrati og erhvervsuddannelser til grundskolerne og ungdomsuddannelserne? Hvordan bruger kommunen FN’s verdensmål, som kompas for en bæredygtig fremtid?</p>
		</div>
		<h2>Vælg imellem vores temaer</h2>
		<div class="filter_section">
            <div id="alle" class="buttonContainer">
                <img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/konflikt.png" alt="">
                <button id="filterknap" class="valgt" data-kategori="alle">Alle kurser</button>
            </div>
			<div id="tema1" class="buttonContainer">
                <img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/konflikt.png" alt="">
                 <button id="filterknap" class="" data-kategori="Uddannelsesvalg">Uddannelsesvalg</button>
            </div>
            <div id="tema2" class="buttonContainer">
                <img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/konflikt.png" alt="">
                <button id="filterknap" class="" data-kategori="Demokrati og medborgerskab">Demokrati og medborgerskab</button>
            </div>
			</div>
			<h2 id="overskrift">Kurser til kommunen</h2>
	</section>
			

			<section id="oversigt">

			</section>
		</main><!-- #main -->
		
		<template>
		<article class="kurset">
		<h4 class="navn"></h4>
            <img src="" alt="">
            <div>
            <p class="kortbeskrivelse"></p>
            <p class="pris"></p>
			<button class="seMere">Læs mere</button>
            </div>
        </article>
    </template>

		
<script>let kurser;
let filter = "alle";
let nyOverskrift = document.querySelector("#overskrift");
      
	  //url til wp restapi db - læg mærke til den her kunindhenter data med kategori 8 (numreringen på til kommunen kategorien)
	  const url = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus?categories=8";
	 
	   //const for destinationen af indholdet og templaten
 			const destination = document.querySelector("#oversigt");
            let template = document.querySelector("template");

	  // asynkron function som afventer og indhenter json data fra restdb
	  async function hentData() {
		  const jsonData = await fetch(url);
		  kurser = await jsonData.json();
		  visKurser();
	  }

	  const filterKnapper = document.querySelectorAll("#filterknap");
            filterKnapper.forEach(knap => knap.addEventListener("click", filtrerMenu));
		
		function filtrerMenu() {
		console.log(this.textContent);
		 //  //sætter filters værdi lig med værdien fra data af den knap der førte ind i funktionen
		  filter= this.dataset.kategori;


		     //ændrer overskriften
		  nyOverskrift.textContent = this.textContent + " til kommunen";
		 


		   //fjerner oog tilføjer valgt class til den rigtige knap
		   document.querySelector(".valgt").classList.remove("valgt");
            this.classList.add("valgt");


		  //kalder function vis kurser efter det nye filter er sat
		  visKurser();
        }
		
		function visKurser(){
		  console.log(kurser);
		  destination.textContent = "";

		  kurser.forEach(kursus => {

			 if (filter == kursus.tema || filter == "alle") {
			   const klon = template.cloneNode(true).content;
			   klon.querySelector(".navn").textContent = kursus.navn;
                klon.querySelector("img").src = kursus.billede.guid;
                klon.querySelector(".kortbeskrivelse").textContent = kursus.kort_beskrivelse;
                klon.querySelector(".pris").textContent = "Pris: "+ kursus.pris;

				klon.querySelector(".seMere").addEventListener("click", () => location.href=kursus.link);


			   destination.appendChild(klon);
			}
		   });
	  }

	  hentData();

</script>

	</section><!-- #section -->


<?php

get_footer();