<?php get_header(); ?>

	<?php require( 'template_part/header_part.php'); ?>

	<?php require( 'template_part/fil_ariane.php'); ?>

	<?php if (is_page(7)): ?>

		<?php while ( have_posts() ) : the_post();?>

			<section class="pages introuvable">
				<div class="row">
					<div class="columns medium-4 medium-offset-4">
						<div class="bloc_introuvable">
							<div class="title">404</div>
							<div class="slug">Page inexistante</div>
						</div>
						<div class="desc">
							<?php the_content();?>
						</div>
					</div>
				</div>
			</section>

		<?php endwhile; ?>

	<?php else: ?>

		<?php while ( have_posts() ) : the_post();?>

			<section class="pages">
				<section class="content">
					<div class="row entet">
						<div class="columns large-9 large-offset-2 medium-12">
							<?php the_content();?>
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
					<div class="columns large-9 large-offset-2 medium-12 end">
						<?php the_field('editeur');  ?>
					</div> 
				</div>

				</section>
			</section>

		<?php endwhile; ?>

	<?php endif ?>
		

<?php get_footer(); ?>
