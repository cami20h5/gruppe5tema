<?php





get_header();

?>

<template>
        <article class="kurset">
            <img src="" alt="">
            <div>
         
            <p class="navn"></p>
            <p class="kortbeskrivelse"></p>
            <p class="pris"></p>
			<p class="billede"></p>
            </div>
        </article>
    </template>

	<section id="section" class="content-area">

		<main id="main" class="site-main">
		</main><!-- #main -->
		



<script>let kurser;
 




      
	  //url til wp restapi db - læg mærke til den her kunindhenter data med kategori 3 (numreringen på til grundskole kategorien)
	  const url = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus?categories=3&per_page=100";
	 
     //const for destination af indhold og template
    const destination = document.querySelector("#oversigt");
    let template = document.querySelector("template"); 



	  // asynkron function som afventer og indhenter json data fra restdb
	  async function hentData() {
		  const jsonData = await fetch(url);
		  kurser = await jsonData.json();
		  visKurser();
	  }



	  function visKurser() {
           
            kurser.forEach(kursus => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector(".navn").textContent = kursus.navn;
                klon.querySelector("img").src = kursus.billede.guid;
                klon.querySelector(".kortbeskrivelse").textContent = kursus.kort_beskrivelse;
                klon.querySelector(".pris").textContent = kursus.pris;
                
                klon.querySelector(".kurset").addEventListener("click", ()=> {location.href = "restdb-single.html?id="+ret._id; })
                container.appendChild(klon);
            })
        }








	  function visKurser(){
		  console.log(kurser);
	  }

	  hentData();

</script>

	</section><!-- #section -->


<?php

get_footer();