<?php require( 'header.php' ); ?>
	<?php require( 'template_part/header_part.php'); ?>
	<?php require( 'template_part/fil_ariane.php'); ?>
	
	<section class="pages">

		<!--*******************************     PROJETS   -->
		<?php while ( have_posts() ) : the_post(); ?>

			<section class="content">

				<div class="row entet">
					<div class="columns large-9 large-offset-2 medium-12">
						<?php the_content(); ?>
					</div>
				</div>
				<?php if ( have_rows('sliders') ): ?>

					<div class="row">
						<div class="columns medium-12 slider_padding">
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

				 <?php endif; ?>

				<div class="row">

					<div class="columns large-9 large-offset-2 medium-12">
						<?php the_field('editeur');  ?>
					</div> 

					<div class="columns large-3 small-12 medium-4">
						<div class="actualite pub">
							<div class="pub_bottom">
								<div class="savoir_plus tout">
									<a href="" id="share_publication">Partager<span class="ico_arrow_right"></span></a>
								</div>
							</div>
						</div>
					</div>

				</div>

			</section>

		<?php endwhile; ?>
		<!--*******************************     END PROJETS   -->
		
		<div class="row"><div class="columns medium-12"><hr></div></div>
		
		<?php require( 'template_part/post_part/blocActualites.php' );  ?>

	</section>

<?php require( 'footer.php' ); ?>