<?php require( 'header.php' ); ?>
	<?php require( 'template_part/header_part.php'); ?>
	<?php require( 'template_part/fil_ariane.php'); ?>

	<section class="pages">
		
		<?php while ( have_posts() ) : the_post(); ?>
			<section class="content">

				<div class="row ">

					<div class="columns large-4 medium-12">
						
						<div class="tableau">

							
							<?php if (get_field('type_de_contrat')): ?>
								<div class="ligne">
									<div class="top">type de contrat</div>
									<div class="bottom"><?php the_field('type_de_contrat'); ?></div>
								</div>
							<?php endif ?>
							
							<?php if (get_field('nom_du_poste')): ?>
								<div class="ligne">
									<div class="top">Nom du poste</div>
									<div class="bottom"><?php the_field('nom_du_poste'); ?></div>
								</div>
							<?php endif ?>
							
							<?php if (get_field('reference')): ?>
								<div class="ligne">
									<div class="top">référence</div>
									<div class="bottom">#<?php the_field('reference'); ?></div>
								</div>
							<?php endif ?>

							<?php if (get_field('date')): ?>
								<div class="ligne">
									<div class="top">date</div>
									<div class="bottom"><?php the_field('date'); ?></div>
								</div>
							<?php endif ?>

						</div>

						<div class="tout"><a href="/recrutement/<?php echo get_field('reference')  ?>">Postuler<span class="ico_arrow_right"></span></a></div>
						
					</div>

					<div class="columns large-8 medium-12">

						<?php $location = get_field('map'); ?>
						<div id="map">
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
						</div>

						<?php the_content(); ?>
					</div>
					
					<div class="buttonsRecrutement">
						<div class="columns large-offset-4 large-4 medium-6 small-12">
							<div class="left savoir_plus tout margeOui">
								<a href="" id="share_publication">Partager<span class="ico_arrow_right"></span></a>
							</div>
						</div>


						<div class="columns large-4 medium-6 small-12">
							<div class="right tout">
								<a href="/recrutement/<?php echo get_field('reference') ?>">Postuler<span class="ico_arrow_right"></span></a>
							</div>
						</div>
					</div>

				</div> 

			</section>
		<?php endwhile; ?>
	</section>

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnyVzkn6i0BptwrDWP7CtuhGimHf-v1ck&signed_in=true&callback=initMap"></script>
	<script>

		(function($) {

			$el = $('#map');
			var $markers = $el.find('.marker');
			$lat = $markers.attr('data-lat');
			$lng = $markers.attr('data-lng');

		})(jQuery);

		function initMap() {
			var SEDP_Paris = new google.maps.LatLng($lat , $lng);
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
			var iconBase = "<?php bloginfo('template_directory');?>/images/icons/";
		  	var marker = new google.maps.Marker({
		   	 	position: SEDP_Paris,
		    	map: map,
		    	title: 'SEDP Paris',
    			icon: iconBase + 'pin_maps.png'
		  	});
		}
	</script>
<?php require( 'footer.php' ); ?>
