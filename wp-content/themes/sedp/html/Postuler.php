<?php require( 'header.php' ); ?>

	<header class="pages" style="background: transparent url('images/home_header_image_postuler.jpg') no-repeat  50% 0% / cover ">
		

		<div class="top">
		
			<div class="logo">
				<a href="index.php">
					<img src="images/logos/logo_pages.png"></img>
				</a>
			</div>

			<div class="search_container">
				<div class="search_home">
				</div>
				<input type="text"	>	
			</div>


			<div id="menu_burger" class="menu_icon">
				<span class="menu_1"></span>
				<span class="menu_2"></span>
				<span class="menu_3"></span>
			</div>
			
		</div>

		<div class="row">
			<div class="columns medium-8 medium-centered">
				<div class="titre_pages">
					Recrutement
				</div>
			</div>
		</div>
	</header>

	<!--*******************************     FIL_ARIANE   -->
	
		<div class="fil_ariane">
			<div class="row">
				<div class="columns medium-12">
					<span class="item"><a href="index.php">Accueil</span></a> <img src="images/icons/fil_ariane_flech.png">
					<span class="item">Envoyer une candidature</span>
				</div>
			</div>
		</div>
	<!--*******************************     END FIL_ARIANE   -->

	<section class="pages contact postuler">


		<div class="row">

			
			<div class="columns large-8 large-offset-2 medium-12 small-12">
				
				<div class="row">

					<div class="columns medium-12 entet">
						<div class="h1 black">Votre candidature pour le poste de Lorem Ipsum</div>
						<p class="first"> Vous êtes intéressé par une de nos offres d’emploi ?  Renseignez ce formulaire, notre équipe vous répondra dans les plus brefs délais.</p>
					</div>

					<div class="form">
						<form>
							<div class="columns medium-6">
								<div class="intitule">Nom <span class="etoile">*</span>	</div>
								<input type="text" placeholder="Votre nom">
							</div>
							
							<div class="columns medium-6">
								<div class="intitule">Prénom</div>
								<input type="text" placeholder="Votre prénom">
							</div>
							
							<div class="columns medium-6">
								<div class="intitule">E-mail <span class="etoile">*</span> </div>
								<input type="text" placeholder="Votre adresse e-mail">
							</div>
							
							<div class="columns medium-6">
								<div class="intitule">position</div>
								<input type="text" placeholder="Sujet de votre message">
							</div>

							<div class="columns medium-6">
								<div class="intitule">curriculum vitae <span class="etoile">*</span> </div>
								<div class="input-file-container">
									<input class="input-file" id="my-file" type="file">
									<label for="my-file" class="input-file-trigger" tabindex="0">Télécharger votre CV</label>
								</div>
							</div>
							
							<div class="columns medium-6">
								<div class="intitule">lettre de motivation</div>
								<div class="input-file-container">
									<input class="input-file" id="my-file2" type="file">
									<label for="my-file2" class="input-file-trigger" tabindex="0">Télécharger votre lettre</label>
								</div>
							</div>
							
							<div class="columns medium-12">
								<div class="intitule">Message <span class="etoile">*</span> </div>
								<textarea placeholder="Renseignez ici votre message et / questions..." rows="8"></textarea>
							</div>

							<div class="columns medium-12">
								
								<div class="row">
									<div class="columns medium-4 small-12">
										<div class="obligatoires">
											*  Champs obligatoires
										</div>
									</div>

									<div class="columns medium-5 medium-offset-3 small-12">
										<div class="tout">
											<div class="submit"><input type="submit" value="Envoyer le message"> <span class="ico_arrow_right"></span></div>
										</div>
									</div>
								</div>
							</div> 
						</form>
					</div>

				</div>

			</div> 

		</div>


	</section>

<?php require( 'footer.php' ); ?>