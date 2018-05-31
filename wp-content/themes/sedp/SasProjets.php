<?php 

/* Template Name: Projets */


require( 'header.php' );

$taxonomy = "post_tag";
$args  = array('post_type' => 'projets', 'posts_per_page' => 8, 'order' => 'DESC', 'orderby' => 'date', 'post_status' => 'publish');
$chosen_tag="0";

if(isset($_SESSION["tagname"]) && !empty($_SESSION["tagname"])){
	$args['tax_query'] =  array(
		array(
			'taxonomy' => $taxonomy,
			'field' => 'id',
			'terms' => $_SESSION["tagname"]
		)
	);
	$chosen_tag = $_SESSION["tagname"];
	$_SESSION["tagname"] = "";
}


$query = new WP_Query($args);
$viwed = $query->post_count;
$total = $query->found_posts;
$remaining = $total - $viwed;
$if_remaining = "false";
$pagination = 1;
if($remaining > 0) $if_remaining = "true";

?>
	
	<?php require( 'template_part/header_part.php'); ?>
	<?php require( 'template_part/fil_ariane.php'); ?>

	<section class="pages realisations">

			<div class="blocfiltre">
				<div class="row">
					<div class="columns medium-12 clearfix">
						<div class="titre">filtrer les projets :<span id="chevron" class="chevron"></span></div>
					</div>
					<div class="filtre">
						<form>
							<div class="columns medium-5">
								<?php wp_dropdown_categories( array( 'taxonomy' => 'competences', 'hide_empty' => false, 'show_option_all' => 'Toutes les compétences',
								 'name' => 'cat_projet' , 'selected' => false)  ); ?>
							</div>
							<div class="columns medium-4">
								
								<?php wp_dropdown_categories( array( 'taxonomy' => 'post_tag', 'hide_empty' => false, 'show_option_all' => 'Tous les métiers', 
								'name' => 'met_projet' ,'selected' => $chosen_tag)  ); ?>
							</div>
							<div class="columns medium-3 end">
								<?php wp_dropdown_categories( array( 'taxonomy' => 'zone_geographique', 'hide_empty' => false, 'show_option_all' => 'Toute zone géographique', 
								'name' => 'zone_projet' ,'selected' => false)  ); ?>
							</div>
						</form>
					</div>
				</div>
			</div>

			<section class="projets">
				
				<?php include( 'template_part/post_part/blocProjet.php' );  ?>

			</section>
		

	</section>

<?php require( 'footer.php' ); ?>