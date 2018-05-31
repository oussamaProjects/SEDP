<?php
//Ajax filtre projets
add_action( 'wp_ajax_mon_action', 'mon_action' );
add_action( 'wp_ajax_nopriv_mon_action', 'mon_action' );
function mon_action(){

	$taxonomy 	= 'competences';
	$taxonomy2 	= 'post_tag';
	$taxonomy3 	= 'zone_geographique';

	$args = array('post_type' => 'projets', 'order' => 'DESC', 'orderby' => 'date', 'post_status' => 'publish');
	if ( isset($_POST["cat_projet"])  && $_POST["cat_projet"] != "0" ){
		$args['tax_query'] =  array(
			array(
				'taxonomy' => $taxonomy,
				'field' => 'id',
				'terms' => $_POST["cat_projet"]
			)
		);
	}
	if ( isset($_POST["met_projet"])  && $_POST["met_projet"] != "0" ){
		$args['tax_query'] =  array(
			array(
				'taxonomy' => $taxonomy2,
				'field' => 'id',
				'terms' => $_POST["met_projet"]
			)
		);
	}
	if ( isset($_POST["zone_projet"])  && $_POST["zone_projet"] != "0" ){
		$args['tax_query'] =  array(
			array(
				'taxonomy' => $taxonomy3,
				'field' => 'id',
				'terms' => $_POST["zone_projet"]
			)
		);
	}
	$posts_per_page = 8;
	$pagination = 1;
	$if_remaining = $_POST['ifremaining'];
	$paged = 1;
	
	$pagination = ((int)$_POST["pagination"]);
	if($if_remaining) {
		$pagination++;
		$posts_per_page=$pagination*$posts_per_page;
	}
	else $pagination=1;
	
	
	$args['posts_per_page'] = $posts_per_page;
	
	$args['paged'] = $paged;

	$query = new WP_Query($args);
	
	$total = $query->found_posts;
	
    if( ! $query ) return;
	
	$viwed = $query->post_count;
	
	$remaining = $total - $viwed;
	
    if($remaining > 0) $if_remaining = "true";
    else $if_remaining = "false";
    
    $a = 0 ;

    include( realpath(dirname(__FILE__).'/..').'/template_part/post_part/blocProjet.php' ); 

	die();
}


add_action('init', 'monprefixe_session_start', 1);
function monprefixe_session_start() {
   if ( ! session_id() ) {
      @session_start();
   }
}


add_action('template_redirect', function(){

	$tagname = get_query_var( 'tagname', "" );
	/*
	echo "==================================<br/>";
	print_r($tagname);
	echo "==================================";
	die();*/

	if(!empty( $tagname)){
		if ( isset( $_SESSION['tagname'] ) ) 
      		unset( $_SESSION['tagname'] );
		$_SESSION["tagname"] = $tagname;
		wp_redirect( get_bloginfo('url').'/nos_references/');
		exit;
	}
});

