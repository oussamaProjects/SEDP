<?php require( 'header.php' ); ?>
	
	<header class="home" style="background: ctransparent url('images/home_header_image.jpg') no-repeat fixed 50% 50% / cover ">
		
		<div class="top">

			<div class="search_container">
				<form action="#" method="post">
					<div class="search_home">
					</div>
					<input type="text"	>
					<button></button>
				</form>	
			</div>
			
			<div id="menu_burger" class="menu_icon">
				<span class="menu_1"></span>
				<span class="menu_2"></span>
				<span class="menu_3"></span>
			</div>

		</div>

		<img class="home_header_image" src="images/home_header_image.jpg">
		
		<div class="reference">
			<div class="nom">Nom de la référence</div>
			<div class="nom_architectes">Nom Architecte / Nom Architecte</div>
		</div>

		<div class="container_en_tete">
			<div class="en_tete">
				<a href="index.php"><img src="images/logos/logo_sedp.png" class="logo_sedp"></img></a>
				<div class="titre">Gestion et ingénierie immobilières</div>
				<img src="images/icons/ico_titre.png" class="ico_titre"></img>
				<img src="images/logos/logo_ratp.png" class="logo_ratp"></img>
			</div>
			<a href="#competence" class="ico_arrow"><img src="images/icons/ico_arrow.png" ></a>
		</div>
	</header>

	<section class="corp">

	<?php require( 'competence.php' ); ?>	

		<!--*******************************     ACTUALITES   -->

			<section class="actualites">
				<div class="row">
					<div class="columns medium-12">
						<div class="title">Nos actualités <span class="underline"></span> </div>
					</div>
				</div>

				<div class="row">
					<div id="slider_actualites" class="slider_actualites">
						<div class="item columns medium-4 bloc">
							<a href="">
								<div class="img">
									<img class="img_zoom" src="images/img.jpg">
								</div>
								<div class="titre">LA SEDP livre un nouvel EHPAD</div>
								<div class="description">16 Avril 2016</div>
							</a>
						</div>

						<div class="item columns medium-4 bloc">
							<a href="">
								<div class="img">
									<img class="img_zoom" src="images/img2.jpg">
								</div>
								<div class="titre">Rémi Feredj, distingué lors du SIMI</div>
								<div class="description">02 Avril 2016</div>
							</a>
						</div>

						<div class="item columns medium-4 bloc">
							<a href="">
								<div class="img">
									<img class="img_zoom" src="images/img3.jpg">
								</div>
								<div class="titre">ZAC Écocité-canal de l’Ourcq, la Maîtrise foncière de la SEDP en première ligne</div>
								<div class="description">12 Octobre 2015</div>
							</a>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="columns medium-12">
						<div class="tout"><a href="">Toutes nos actualités <span class="ico_arrow_right"></span></a></div>
					</div> 
				</div>
				
			</section>
		<!--*******************************     END ACTUALITES   -->
		
		<!--*******************************     PROJETS   -->
			<section class="projets slider">

				<div class="row">
					<div class="columns medium-12">
						<div class="section_title">
							<img src="images/icons/title_ico_arrow.png" >
							Nous répondons <br>à tous vos projets immobiliers.
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="slider_projets_container columns medium-12">
						<div id="slider_projets" class="slider_projets">

							<div class="item single_projet black">
								<a href="#"><img class="lazyOwl" src="images/silder_projets/img_slider.jpg"></a>
								<div class="sous">
									<a href="http://serverces.myds.me:8069/web">
										<div class="titre">Maîtrise foncière<span class="underline"></span> </div>
									</a>
									<a href="#">
										<div class="description">Tramway St Denis Garges-Sarcelles</div>
									</a>
								</div>
							</div>

							<div class="item single_projet red">
								<a href="#"><img src="images/silder_projets/img_slider2.jpg"></a>
								<div class="sous">
									<a href="http://serverces.myds.me:8069/web">
										<div class="titre">Exploitation de salles<span class="underline"></span> </div>
									</a>
									<a href="#">
										<div class="description">Espace Van Gogh</div>
									</a>
								</div>
							</div>
						
							<div class="item single_projet black">
								<a href="#"><img src="images/silder_projets/img_slider3.jpg">
								<div class="sous">
									<a href="http://serverces.myds.me:8069/web">
										<div class="titre">amo<span class="underline"></span> </div>
									</a>
									<a href="#">
										<div class="description">EMI Music - Siège social France</div>
									</a>
								</div>
							</div>

							<div class="item single_projet red">
								<a href="#"><img src="images/silder_projets/img_slider4.jpg">
								<div class="sous">
									<a href="http://serverces.myds.me:8069/web">
										<div class="titre">audits<span class="underline"></span> </div>
									</a>
									<a href="#">
										<div class="description">Centre culturel 104</div>
									</a>
								</div>
							</div>
						
							<div class="item single_projet black">
								<a href="#"><img src="images/silder_projets/img_slider3.jpg">
								<div class="sous">
									<a href="http://serverces.myds.me:8069/web">
										<div class="titre">amo<span class="underline"></span> </div>
									</a>
									<a href="#">
										<div class="description">EMI Music - Siège social France</div>
									</a>
								</div>
							</div>

							<div class="item single_projet red">
								<a href="#"><img src="images/silder_projets/img_slider4.jpg">
								<div class="sous">
									<a href="http://serverces.myds.me:8069/web">
										<div class="titre">audits<span class="underline"></span> </div>
									</a>
									<a href="#">
										<div class="description">Centre culturel 104</div>
									</a>
								</div>
							</div>
						
							<div class="item single_projet black">
								<a href="#"><img src="images/silder_projets/img_slider3.jpg">
								<div class="sous">
									<a href="http://serverces.myds.me:8069/web">
										<div class="titre">amo<span class="underline"></span> </div>
									</a>
									<a href="#">
										<div class="description">EMI Music - Siège social France</div>
									</a>
								</div>
							</div>

							<div class="item single_projet red">
								<a href="#"><img src="images/silder_projets/img_slider4.jpg">
								<div class="sous">
									<a href="http://serverces.myds.me:8069/web">
										<div class="titre">audits<span class="underline"></span> </div>
									</a>
									<a href="#">
										<div class="description">Centre culturel 104</div>
									</a>
								</div>
							</div>
						
							<div class="item single_projet black">
								<a href="#"><img src="images/silder_projets/img_slider3.jpg">
								<div class="sous">
									<a href="http://serverces.myds.me:8069/web">
										<div class="titre">amo<span class="underline"></span> </div>
									</a>
									<a href="#">
										<div class="description">EMI Music - Siège social France</div>
									</a>
								</div>
							</div>


						</div>

						<div class="tout"><a href="">Toutes nos références <span class="ico_arrow_right"></span></a></div>
					</div>
				</div>

			</section>
		<!--*******************************     END PROJETS   -->
	</section>

<?php require( 'footer.php' ); ?>