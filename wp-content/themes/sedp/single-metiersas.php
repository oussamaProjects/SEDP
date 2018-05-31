<?php require( 'header.php' ); ?>
	<?php require( 'template_part/header_part.php'); ?>
	<?php require( 'template_part/fil_ariane2.php'); ?>
	
	<section class="pages">

 		<!--*******************************     CONTENT   -->
			<?php while ( have_posts() ) : the_post(); ?>
				<section class="content">
					
					<div class="row entet">
						<div class="columns large-9 large-offset-2 medium-12">
							<?php the_content(); ?>
						</div>
						<?php if( have_rows('avantages') ): $i=0; ?>
							<div class="slider_padding_right columns large-9 large-offset-2 medium-12">
								<div id="slider_points_cles" class="slider_points_cles">
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

						<div class="columns medium-9 medium-offset-2 small-12 end">
							<?php 
							$fiche_metier = get_field('fiche_metier');
							if($fiche_metier): ?>
								<div class="telecharger_metier tout"><a href="<?php echo $fiche_metier['url']; ?>">Télécharger la fiche métier <span class="ico_arrow_down"></span></a></div>
							<?php endif ?>
						</div>
					</div>
				</section> 
			<?php endwhile; ?>
		<!--*******************************     END CONTENT   -->

		<?php require( 'template_part/post_part/blocRealisations.php' );  ?>

		<div class="row"><div class="columns medium-12"><hr></div></div>

		<?php require( 'template_part/post_part/blocMetiers.php' );  ?>
	</section>

<?php require( 'footer.php' ); ?>