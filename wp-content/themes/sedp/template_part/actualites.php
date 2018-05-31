<?php 
if ( have_posts() ) : 
	while ( have_posts() ) : the_post();
		$actualites = get_field('actualites'); ?>
		<?php if ($actualites): ?>
	
			<section class="actualites">

				<div class="row">
					<div class="columns medium-12">
						<div class="title">Nos actualités <span class="underline"></span> </div>
					</div>
				</div>

				<div class="row">
					<div id="slider_actualites" class="slider_actualites">

						<?php 
						foreach($actualites as $post):
							setup_postdata($post); ?>
							<div class="item columns medium-4 bloc">
								<a href="<?php the_permalink(); ?>">
									<div class="img">
										<?php if ( has_post_thumbnail() ) {
											the_post_thumbnail('full' , array( 'class' => 'img_zoom' ));
										}else { ?>
											<img class="img_zoom" src="<?php bloginfo('template_directory');?>/images/img_remplace.jpg">
										<?php } ?>
									</div>
									<div class="titre"><?php the_title();?></div>
								</a>
								<div class="description"><?php echo get_the_date();?></div>
							</div>
						<?php endforeach; ?>

					</div>
				</div>

				<div class="row">
					<div class="columns medium-12">
						<div class="tout"><a href="<?php echo get_permalink('44');  ?>">Toutes nos actualités <span class="ico_arrow_right"></span></a></div>
					</div> 
				</div>
				
			</section>

			<?php wp_reset_postdata(); ?>

		<?php endif;
	endwhile ; 
endif; ?>