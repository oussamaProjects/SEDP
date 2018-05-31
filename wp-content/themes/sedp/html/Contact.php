<?php require( 'header.php' ); ?>

	<header class="pages" style="background: transparent url('images/home_header_image_contact.jpg') no-repeat 50% 0% / cover ">
		

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
					Nous contacter
				</div>
			</div>
		</div>
	</header>

	<!--*******************************     FIL_ARIANE   -->
	
		<div class="fil_ariane">
			<div class="row">
				<div class="columns medium-12">
					<span class="item"><a href="index.php">Accueil</span></a> <img src="images/icons/fil_ariane_flech.png">
					<span class="item">Contact</span>
				</div>
			</div>
		</div>
	<!--*******************************     END FIL_ARIANE   -->

	<section class="pages contact">


		<div class="row">

			
			<div class="columns large-8 large-offset-2 medium-12 small-12">
				
				<div class="row">

			
					 <div class="columns medium-12 entet">
						<p>Besoin d'un renseignement ou lorem ipsum dolor sit amet, consectetur adipiscing elit corvus de fenestra caseum rapuerat ?  Renseignez ce formulaire, notre équipe vous répondra dans les plus brefs délais.</p>
					</div>

					<div class="form">
						<form>
							<div class="columns medium-6">
								<div class="intitule">Nom <span class="etoile">*</span> </div>
								<input type="text" placeholder="Votre nom">
							</div>
							
							<div class="columns medium-6">
								<div class="intitule">Prénom <span class="etoile">*</span> </div>
								<input type="text" placeholder="Votre prénom">
							</div>
							
							<div class="columns medium-6">
								<div class="intitule">E-mail <span class="etoile">*</span> </div>
								<input type="text" placeholder="Votre adresse e-mail">
							</div>
							
							<div class="columns medium-6">
								<div class="intitule">Sujet</div>
								<input type="text" placeholder="Sujet de votre message">
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

			
			<div class="columns medium-12 padding_map">
				<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d563323.7387640516!2d2.271987654788546!3d47.538413092526355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1465553549594" width="1200" height="430" frameborder="0" style="border:0" allowfullscreen></iframe> -->
			 	<div id="map"></div>
			</div>
		</div>


	</section>
	<script>

		function initMap() {
		  	var SEDP_Paris = new google.maps.LatLng(48.846834 , 2.346061);
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

		  // var coordInfoWindow = new google.maps.InfoWindow();
		  // coordInfoWindow.setContent(createInfoWindowContent(SEDP_Paris, map.getZoom()));
		  // coordInfoWindow.setPosition(SEDP_Paris);
		  // coordInfoWindow.open(map);

		  // map.addListener('zoom_changed', function() {
		  //   coordInfoWindow.setContent(createInfoWindowContent(SEDP_Paris, map.getZoom()));
		  //   coordInfoWindow.open(map);
		  // });

			var contentString =  
				'<div class="infoMap" >'+
				'<span class="title">SEDP Paris<span>'+
				'<hr>'+
				'<span>45 rue Cujas, bat. B6</span>'+
				'<span>75 000 Paris</span>'+
				'<span class="tel">+33(0)1 23 45 67 89</span>'+
				'</div>';

		  var infowindow = new google.maps.InfoWindow({
		    content: contentString,maxWidth: 292
		  });

		  var marker = new google.maps.Marker({
		    position: SEDP_Paris,
		    map: map,
		    title: 'SEDP Paris',
    		icon: 'a'
		  });

		  infowindow.setPosition(SEDP_Paris);
		  // This event expects a click on a marker
			// When this event is fired the Info Window is opened.
			// google.maps.event.addListener(marker, 'click', function() {
			// 	infowindow.open(map,marker);
			// });
				infowindow.open(map,marker);

			// // Event that closes the Info Window with a click on the map
			// google.maps.event.addListener(map, 'click', function() {
			// 	infowindow.close();
			// });

		  // *
		  // START INFOWINDOW CUSTOMIZE.
		  // The google.maps.event.addListener() event expects
		  // the creation of the infowindow HTML structure 'domready'
		  // and before the opening of the infowindow, defined styles are applied.
		  // *
		  google.maps.event.addListener(infowindow, 'domready', function() {

		    // Reference to the DIV that wraps the bottom of infowindow
		    var iwOuter = $('.gm-style-iw');

		    /* Since this div is in a position prior to .gm-div style-iw.
		     * We use jQuery and create a iwBackground variable,
		     * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
		    */
		    var iwBackground = iwOuter.prev();

		    // Removes background shadow DIV
		    iwBackground.children(':nth-child(2)').css({'display' : 'none'});

		    // Removes white background DIV
		    iwBackground.children(':nth-child(4)').css({'display' : 'none'});

		    // Moves the infowindow 115px to the right.
		    iwOuter.parent().parent().css({left: '120px',top: '70px'});

		    // Moves the shadow of the arrow 76px to the left margin.
		    iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: -10px !important;display:none;'});

		    // Moves the arrow 76px to the left margin.
		    iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: -10px !important;display:none;'});

		    // Changes the desired tail shadow color.
		    iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

		    // Reference to the div that groups the close button elements.
		    var iwCloseBtn = iwOuter.next();

		    // Apply the desired effect to the close button
		    iwCloseBtn.css({opacity: '0', right: '38px', top: '3px', border: '7px solid #48b5e9', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});

		    // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
		    if($('.iw-content').height() < 140){
		      $('.iw-bottom-gradient').css({display: 'none'});
		    }

		    // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
		    iwCloseBtn.mouseout(function(){
		      $(this).css({opacity: '0'});
		    });
		  });
		}
		google.maps.event.addDomListener(window, 'load', initialize);

	</script>
	

<?php require( 'footer.php' ); ?>