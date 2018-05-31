<?php 
/* Template Name: Partenaires */
require( 'header.php' ); 
$args  = array('post_type' => 'partenaires');
$query = new WP_Query($args);
?>

	<?php require( 'template_part/header_part.php'); ?>
	<?php require( 'template_part/fil_ariane.php'); ?>

	<section class="pages">
 

		<!--*******************************     PROJETS   -->

			<section class="projets">
				
				<div class="row">
					<div class="columns large-8 large-centered medium-12">
						<div id="slider_partenaire" class="slider_partenaire">
						<?php $a=0 ;
							while ( $query->have_posts() ) : $query->the_post(); ?>
							<div class="item single_projet <?php echo ($a % 2 == 0 ) ? 'black' : 'red' ;  ?>">
								<a href="<?php echo the_field('lien_partenaire'); ?>" target="_blank">
									<?php the_post_thumbnail('full', array( 'class'	=> "lazyOwl"));  ?>
								</a>
								<div class="sous">
									<div class="sous_description"><?php echo the_content(); ?></div>
									<div class="lien"><a href="<?php echo the_field('lien_partenaire'); ?>" target="_blank"><?php echo the_field('titre_lien_partenaire'); ?></a></div>
								</div>
							</div>
						<?php $a++; endwhile ;  ?>
						</div>
					</div>
				</div>

			</section>
			
		<!--*******************************     END PROJETS   -->



	</section>

<?php require( 'footer.php' ); ?>