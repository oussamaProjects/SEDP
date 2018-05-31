<?php require( 'header.php' ); ?>

	<header class="pages" style="background: transparent url('images/home_header_image_recrute.jpg') no-repeat 50% 0% / cover ">
		

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
					Architecte urbaniste
				</div>
			</div>
		</div>
	</header>

	<!--*******************************     FIL_ARIANE   -->
	
		<div class="fil_ariane">
			<div class="row">
				<div class="columns medium-12">
					<span class="item"><a href="index.php">Accueil</span></a> <img src="images/icons/fil_ariane_flech.png">
					<span class="item"><a href="#">Nous rejoindre</a></span> <img src="images/icons/fil_ariane_flech.png">
					<span class="item">Architecte urbaniste</span>
				</div>
			</div>
		</div>
	<!--*******************************     END FIL_ARIANE   -->

	<section class="pages">

			<section class="content">

				<div class="row ">

					<div class="columns large-4 medium-12">
						
						<div class="tableau">

							<div class="ligne">
								<div class="top">type de contrat</div>
								<div class="bottom">CDI</div>
							</div>
							
							<div class="ligne">
								<div class="top">date</div>
								<div class="bottom">12 Avril 2016</div>
							</div>

							<div class="ligne">
								<div class="top">référence</div>
								<div class="bottom">#1234567890</div>
							</div>

						</div>

						<div class="tout"><a href="#">Postuler<span class="ico_arrow_right"></span></a></div>
					</div>

					<div class="columns large-8 medium-12">
						
						<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d25773.067977780443!2d2.0777311507754135!3d47.23497327542363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1465381065709" width="750" height="420" frameborder="0" style="border:0" allowfullscreen></iframe> -->
						<div id="map"></div>
						<h2 class="h2">L’entreprise</h2>

						<p>La SEDP assure aujourd'hui la gestion de 500 000 m² d'immeubles tertiaires : sièges sociaux, bureaux, centres informatiques, restaurants d'entreprises, centres culturels, centres médicaux, centres sportifs et de vacances. Elle réalise également les diagnostics patrimoniaux de ètres carrés de locaux d'activité industrielle et tertiaire, pour le compte de Maîtres d'Ouvrage privés et publics, et pilote des projets de construction, réhabilitation et restructuration de nombreux bâtiments (logements, centres sportif, bureaux, écoles, bâtiments industriels...). </p>

						<p>Confier à la SEDP tout ou partie de l'audit et de la gestion de vos installations, l'exécution de vos contrats d'entretien et de maintenance des bâtiments ainsi que vos projets de construction ou de réhabilitation, est un gage de succès.</p>
						
						<h2 class="h2">Le poste</h2>
						
						<p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nulla vitae elit libero, a pharetra augue. Curabitur blandit tempus porttitor. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. </p>
						
						<p>Nullam id dolor id nibh ultricies vehicula ut id elit :</p>
						
						<ul>
							<li>Cras mattis consectetur purus sit amet fermentum. </li>
							<li>Donec ullamcorper nulla non metus auctor fringilla. </li>
							<li>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</li>
						</ul>
						
						<h2 class="h2">Le candidat</h2>
						
						<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Etiam porta sem malesuada magna mollis euismod. Donec ullamcorper nulla non metus auctor fringilla. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Etiam porta sem malesuada magna mollis euismod. Donec ullamcorper nulla non metus auctor fringilla. Donec id elit non mi porta gravida at eget metus.</p>
						
						<div class="tout">
							<a href="#">Postuler<span class="ico_arrow_right"></span></a>
						</div>
					</div>

				</div> 

			</section>
	</section>
	<script>

		function initMap() {
			var SEDP_Paris = new google.maps.LatLng(47.23497327542363 , 2.0777311507754135);
			var customMapType = new google.maps.StyledMapType([
			    {
			      featureType: "landscape",
			      elementType: 'all',
			      stylers: [
					  { color: "#edf0f5" }
			      ]
			    },{
			      featureType: "poi",
			      elementType: "geometry",
			      stylers: [
			        { color: "#e1e5ed" }
			      ]
			    },{
			      featureType: "water",
			      elementType: "geometry",
			      stylers: [
			        { color: "#d5dae3" }
			      ]
			    },{
			      featureType: "road",
			      elementType: "geometry",
			      stylers: [
			        { lightness: 100 }
			      ]
			    },{
			      featureType: "road",
			      elementType: "labels",
			      stylers: [
			        { visibility: "off" }
			      ]
			    },{
			      featureType: "transit",
			      stylers: [
			        { visibility: "off" }
			      ]
			    }
			  ],{
			      name: 'Custom Style'
			  });


			var customMapTypeId = 'custom_style';

				var map = new google.maps.Map(document.getElementById('map'), {
				center: SEDP_Paris,
				zoom: 15,
				mapTypeControlOptions: {
					mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
				}
			});

			map.mapTypes.set(customMapTypeId, customMapType);
			map.setMapTypeId(customMapTypeId);
			var iconBase = 'images/icons/';
		  	var marker = new google.maps.Marker({
		   	 	position: SEDP_Paris,
		    	map: map,
		    	title: 'SEDP Paris',
    			icon: iconBase + 'pin_maps.png'
		  	});
		}


	</script>
<?php require( 'footer.php' ); ?>