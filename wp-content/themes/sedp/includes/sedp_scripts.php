<?php

function sedp_scripts() {

	// Load stylesheet.
	wp_enqueue_style( 'foundation'  , get_template_directory_uri() . '/css/foundation/css/foundation.css' ); 
	wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/css/owl_carousel/owl.carousel.css' ); 
	wp_enqueue_style( 'owl.theme', get_template_directory_uri() . '/css/owl_carousel/owl.theme.css' ); 
	wp_enqueue_style( 'owl.transitions', get_template_directory_uri() . '/css/owl_carousel/owl.transitions.css' ); 
	wp_enqueue_style( 'app', get_template_directory_uri() . '/css/app.css' ); 
	wp_enqueue_style( 'home', get_template_directory_uri() . '/css/home.css' ); 
	wp_enqueue_style( 'pages', get_template_directory_uri() . '/css/pages.css' ); 
	wp_enqueue_style( 'sliders', get_template_directory_uri() . '/css/sliders.css' ); 
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css' ); 
	
	// wp_enqueue_script( 'jquery',get_template_directory_uri() . '/js/jquery.js' );
	// wp_enqueue_script( 'jquery-ui.min',get_template_directory_uri() . '/js/jqueru-ui/jquery-ui.min.js' );

	// wp_enqueue_script( 'testn',get_template_directory_uri() . '/js/jqueru-ui/jquery-ui.min.js' );
}
add_action( 'wp_enqueue_scripts', 'sedp_scripts' );

?>