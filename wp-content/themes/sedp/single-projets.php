<?php require( 'header.php' ); ?>
	<?php require( 'template_part/header_part.php'); ?>
	<?php require( 'template_part/fil_ariane.php'); ?>

	<section class="pages">

		<!--*******************************     PAGE   -->
			<?php while ( have_posts() ) : the_post(); ?>
				<section class="content">

					<div class="row">
						<div class="columns large-9 large-offset-2 medium-12 first">
							<?php the_content(); ?>
						</div>
					</div>

					<div class="row projetDetails">
						<div class="columns large-4 medium-12">
							
							<div class="tableau">

								<div class="ligne">
									<div class="top">Métiers</div>
									<div class="bottom">

										<?php 

											$metierTags = get_the_tags(); $numTags = count($metierTags); $i=0;

											$metierPrincip = array( );
											$metierscompl  = array( );
											$metiers  = array( );

											foreach ($metierTags as $metierTag):

												if ($post->metierPrincipal == $metierTag->term_id )
													array_push($metierPrincip, $metierTag);
												else
													array_push($metierscompl, $metierTag);
	 
											endforeach;

											$metiers = array_merge($metierPrincip, $metierscompl);

										foreach ($metiers as $metier): ?>
											<a href="<?php bloginfo('url');?>/nos_references/<?php echo $metier->term_id ?>">
												<?php  echo $metier->name; ?>
											</a>
											<?php 
												if(++$i < $numTags)
														echo " , ";
											?>
										<?php endforeach; ?>
									</div>
								</div>

								<?php if (get_field('maitrise_ouvrage')): ?>
									<div class="ligne">
										<div class="top">Maîtrise d'ouvrage</div>
										<div class="bottom"><?php the_field('maitrise_ouvrage'); ?></div>
									</div>
								<?php endif ?>
								
								<?php if (get_field('maitre_ouvrage_delegue')): ?>
									<div class="ligne">
										<div class="top">Maîtrise d'ouvrage déléguée</div>
										<div class="bottom"><?php the_field('maitre_ouvrage_delegue'); ?></div>
									</div>
								<?php endif ?>

								<?php if (get_field('assistance_a_maitrise_ouvrage')): ?>
									<div class="ligne">
										<div class="top">Assistance à Maîtrise d’Ouvrage</div>
										<div class="bottom"><?php the_field('assistance_a_maitrise_ouvrage'); ?></div>
									</div>
								<?php endif ?>

								<?php if (get_field('maitrise_œuvre')): ?>
									<div class="ligne">
										<div class="top">Maîtrise d’œuvre</div>
										<div class="bottom"><?php the_field('maitrise_œuvre'); ?></div>
									</div>
								<?php endif ?>

								<?php if (get_field('annee')): ?>
									<div class="ligne">
										<div class="top">Année</div>
										<div class="bottom"><?php the_field('annee'); ?></div>
									</div>
								<?php endif ?>
								
								<?php if (get_field('surface_shon')): ?>
									<div class="ligne">
										<div class="top">Surface </div>
										<div class="bottom"><?php the_field('surface_shon'); ?></div>
									</div>
								<?php endif ?>

								<?php if (get_field('montant_operation')): ?>
									<div class="ligne">
										<div class="top">Montant de l’opération </div>
										<div class="bottom"><?php the_field('montant_operation'); ?></div>
									</div>
								<?php endif ?>
								
								<?php if (get_field('adresse')): ?>
									<div class="ligne">
										<div class="top">Adresse </div>
										<div class="bottom"><?php the_field('adresse'); ?></div>
									</div>
								<?php endif ?>
								
								<?php if (get_field('code_postal')): ?>
									<div class="ligne">
										<div class="top">Code postal</div>
										<div class="bottom"><?php the_field('code_postal'); ?></div>
									</div>
								<?php endif ?>
							</div>

						</div>

						<div class="columns large-8 medium-12">
							
							<?php $location = get_field('map'); ?>
							<div id="map">
								<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
							</div>

							<div class="row">
							
								<div class="columns medium-6">
									<?php $plaquette_information = get_field('plaquette_information');
										if( $plaquette_information ):?>			
										<div class="plaquette">
											<a href="<?php echo $plaquette_information['url']; ?>" download="<?php echo $plaquette_information['url']; ?>">
												<div class="infoTop">Plaquette d’information</div>
												<div class="infoBottom">10ko, pdf</div>
											</a>
										</div>
									<?php endif ?>
								</div>

								<div class="columns medium-6">
									<?php if( get_field('site_web') ): ?>	
										<div class="tout">
											<a href="<?php echo  the_field('site_web'); ?>" target="_blank">Consulter le site web<span class="ico_arrow_right"></span></a>
										</div>
									<?php endif ?>
								</div>

							</div>

						</div>
					</div>


					<div class="row">

						<div id="slider_citation" class="slider_actualites slider_citation">

							<?php while ( have_rows('citation') ) : the_row(); ?>
								<div class="columns large-offset-2 large-8 medium-12">
									<div class="bloc_sitation">
										<?php the_sub_field('contenu') ?>
									</div>
								</div> 
							<?php endwhile ?>

						</div> 

						<div class="columns medium-12">
							<div id="slider_page" class="slider_page"> 

								<?php while ( have_rows('sliders') ) : the_row(); ?>
									<div class="img items">	
									<?php $image = get_sub_field('image');
										if ( $image ) : ?>
											<img src="<?php echo $image['url']; ?>">
										<?php endif; ?>	
										<div class="row">
											<div class="columns medium-10 medium-offset-2 small-12 legend">
												<div class="titre"><?php the_sub_field('titre') ?></div>
												<div class="desc"><?php the_sub_field('description') ?></div>
											</div>
										</div>
									</div>
								<?php endwhile ?>

							</div>
						</div>
					</div> 

				</section>
			<?php endwhile; ?>
		<!--*******************************     END PAGE   -->

		<?php require( 'template_part/post_part/blocRealisationsSimilaire.php' );  ?>

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



