<?php 
/* Template Name: Recrutement */ 
require( 'header.php' ); 
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args = array('post_type' => 'offre_recrutement', 'posts_per_page' => 4, 'order' => 'DESC', 'orderby' => 'date', 'paged' => $paged, 'page' => $paged, 'post_status' => 'publish');
$query = new WP_Query( $args ); ?>

	<?php require( 'template_part/header_part.php'); ?>
	<?php require( 'template_part/fil_ariane.php'); ?>

	<section class="pages">

 		<!--*******************************     CONTENT   -->
			<section class="content">
				<div class="row entet">
					<?php while ( have_posts() ) : the_post(); ?>

						<div class="columns large-10 large-offset-2 medium-12 small-12">
							<h2><?php the_field('sous_titre'); ?></h2>
							<?php the_content(); ?>
							<h3><?php echo _('Avantages :') ?></h3>
						</div>
						<?php if( have_rows('avantages') ): $i=0; ?>
							<div class="slider_padding slider_small_padding_left columns large-10 large-offset-2 medium-12 small-12">
								<div id="slider_points_cles" class="slider_points_cles margin">
									<?php while( have_rows('avantages') ): the_row(); $i++;
										$titre_avantage 		= get_sub_field('titre_avantage');
										$description_avantage 	= get_sub_field('description_avantage'); ?>

										<div class="item point_cle <?php echo ($i % 2 == 0 ) ? 'black' : 'red' ;  ?> ">
											<img src="<?php bloginfo('template_directory');?>/images/icons/approval.png">
											<div class="titre"><?php echo $titre_avantage; ?></div>
											<div class="description"><?php echo $description_avantage; ?></div>
										</div>

									<?php endwhile; ?>
								</div> 
							</div>
						<?php endif; ?>
					</div>

				<?php endwhile; ?>

			<!--*******************************     SASCOMPETENCE   -->
				<div class="sascompetence recrute">

					<div class="row">
						<div class="columns large-10 large-offset-2 medium-12 small-12">
							<h2>Nos offres :</h2>
						</div> 
					</div>

					<?php while($query->have_posts()) : $query->the_post();  ?>

						<div class="row competence">
							<div class="columns large-3 large-offset-2 medium-5 small-12">
								<div class="img">
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('full');
									}else { ?>
										<img src="<?php bloginfo('template_directory');?>/images/img_remplace_mt.jpg">
									<?php } ?>
								</div>
							</div> 
							<div class="columns large-6 medium-7 small-12">
								<div class="pub">
									<div class="title"><?php the_title();?></div>
									<div class="date"><?php the_date();?></div>
									<div class="desc"><?php the_field('description');?></div>
									<div class="pub_bottom">
										<div class="savoir_plus tout">
											<a href="<?php echo get_permalink();?>">Consultez l’offre <span class="ico_arrow_right"></span></a>
										</div>
									</div>
								</div>
							</div> 
							
							<div class="columns large-10 large-offset-2 medium-12 small-12"> <hr> </div> 
						</div>

					<?php endwhile; ?>
					
					<div class="row">
						<div class="columns medium-10 medium-offset-2 small-12">
							<?php require( 'template_part/navigation.php' ); ?>
						</div>
					</div> 

					<?php wp_reset_postdata(); ?>

					<div class="row">
						<div class="slider_padding_right columns large-10 large-offset-2 medium-12 small-12">
							
						 	<div class="postulerCandidature">
								<div class="text">Candidature spontanée ?</div>
								<div class="tout">
									<a href="/recrutement/">Postuler <span class="ico_arrow_right"></span></a>
								</div>
							</div> 

					 	</div>
					 </div>
				</div>

			</section>
	</section>

<?php require( 'footer.php' ); ?>