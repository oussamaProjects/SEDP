<?php 
require( 'header.php' );

$taxonomy = 'competences';
$thisCategory 				= get_queried_object();
$thisCategoryID 			= $thisCategory->term_id;
$thisCategoryterm_order 	= $thisCategory->term_order;
$count_terms 				= wp_count_terms( $taxonomy);
$thisCategoryName 			= $thisCategory->name;


$args = array('post_type' => 'metiersas', 'posts_per_page' => -1);

$args['tax_query'] =  array(
	array(
		'taxonomy' => 'competences',
		'field' => 'id',
		'terms' => $thisCategoryID
	)
);
if ( isset($_POST["cat"]) && $_POST["cat"] != 0 ) {
	 $args['tax_query']['terms'] = $_POST['cat'];
}
$query = new WP_Query( $args ); 
?>

	<?php require( 'template_part/header_part.php'); ?>
	<?php require( 'template_part/fil_ariane2.php'); ?>

	<section class="pages">

		<section class="content">
				
			<div class="row">
				<div class="columns large-9 large-offset-2 medium-12 small-12 entet">

					<?php the_field('description_page' , $thisCategory ); ?>

				</div>
			</div> 

			<div class="sascompetence taxoComp">
				<?php while ( $query->have_posts() ) : $query->the_post();?>
					<div class="row competence">
						
						<div class="columns large-9 large-offset-2 medium-12 small-12 end"> <hr> </div> 
						<div class="columns large-3 large-offset-2 medium-5 small-12">
							<div class="img">
								<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('full');
								}else { ?>
									<img class="img_zoom" src="<?php bloginfo('template_directory');?>/images/img_remplace_mt.jpg">
								<?php } ?>
							</div>
						</div> 
						<div class="columns large-5 medium-7 small-12 end">
							<div class="pub">
								<div class="title"><?php the_title();?></div>
								<div class="desc"><?php the_field('description'); ?></div>
								<div class="pub_bottom"> 
									<div class="savoir_plus tout">
										<a href="<?php the_permalink(); ?>">En savoir plus <span class="ico_arrow_right"></span></a>
									</div>
								</div>
							</div>
						</div> 
					</div>
				<?php endwhile; ?> 

			</div>

			<div class="row" >
				<div class="columns medium-12 small-12"><hr></div> 
			</div>

		</section>

		<?php require( 'template_part/competence.php' ); ?>	

	</section>

<?php require( 'footer.php' ); ?>
