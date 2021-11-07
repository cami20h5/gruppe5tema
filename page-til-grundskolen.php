<?php





get_header();

?>

<template>
        <article>
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
	 

	  // asynkron function som afventer og indhenter json data fra restdb
	  async function hentData() {
		  const jsonData = await fetch(url);
		  kurser = await jsonData.json();
		  visKurser();
	  }



	  function visKurser() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".retcontainer")
            retter.forEach(ret => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector("h2").textContent = ret.navn;
                klon.querySelector("img").src = billedUrl+ ret.billede;
                klon.querySelector(".kategori").textContent = ret.kategori;
                klon.querySelector(".tekst").textContent = ret.kortbeskrivelse;
                klon.querySelector(".pris").textContent = ret.pris;
                klon.querySelector("article").addEventListener("click", ()=> {location.href = "restdb-single.html?id="+ret._id; })
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