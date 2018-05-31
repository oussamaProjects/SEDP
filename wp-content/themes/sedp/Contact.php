<?php 
/* Template Name: Contact */
get_header(); ?>

	<?php require( 'template_part/header_part.php'); ?>
	<?php require( 'template_part/fil_ariane.php'); ?>

	<?php while (have_posts()) : the_post(); ?>

	<section class="pages contact">
		<div class="row">
			
			<div class="columns large-8 large-offset-2 medium-12 small-12">
				<?php the_content();?>
			</div>
			
			<div class="columns medium-12 padding_map">
				
				<?php $location = get_field('map'); ?>
				<div id="map">
					<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					<span class="telephone" data-tele="<?php echo the_field('telephone'); ?>"></span>
				</div>
			</div>

		</div>
	</section>
	<?php endwhile;?>

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnyVzkn6i0BptwrDWP7CtuhGimHf-v1ck&signed_in=true&callback=initMap"></script>
	<script>

		(function($) {

			$el = $('#map');
			var $markers = $el.find('.marker');
			$lat = $markers.attr('data-lat');
			$lng = $markers.attr('data-lng');

			var $telephone = $el.find('.telephone');
			$tele = $telephone.attr('data-tele');

		})(jQuery);

		function initMap() {
			var SEDP_Paris = new google.maps.LatLng($lat ,$lng);
			var customMapType = new google.maps.StyledMapType([
				{
					featureType: "landscape",
					elementType: 'all',
					stylers: [
						{ color: "#edf0f5" }
					]
				},{
					featureType: "poi",
					stylers: [
						{ visibility: "off" }
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

			var contentString = '<div class="infoMap">' + $tele +'</div>';

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
			infowindow.open(map,marker);

			google.maps.event.addListener(infowindow, 'domready', function() {
 
		   

			if (window.matchMedia("(max-device-width: 600px)").matches) {
				var iwOuter_style = $('.gm-style');
				iwOuter_style
					.children(':nth-child(1)')
					.find(':nth-child(1)')
					.attr('style', function(i,s){ return s + 'left: -90px !important;'});
			}
		   

		    var iwOuter = $('.gm-style-iw');
		    var iwBackground = iwOuter.prev();
		    // Removes background shadow DIV
		    iwBackground.children(':nth-child(2)').css({'display' : 'none'});

		    // Removes white background DIV
		    iwBackground.children(':nth-child(4)').css({'display' : 'none'});

		    // Moves the infowindow 115px to the right.
		    iwOuter.parent().parent().css({left: '100px',top: '70px'});

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
		// google.maps.event.addDomListener(window, 'load', initialize);

	</script>

<?php get_footer();?>