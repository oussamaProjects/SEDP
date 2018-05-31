<!--*******************************     METIER   -->
<?php 
if ( have_posts() ) : 
	while ( have_posts() ) : the_post();
		$metiersC = get_field('metiers_complementaires'); 
		if ($metiersC): ?>

			<section class="metiers">

				<div class="row">
					<div class="columns medium-12">
						<div class="section_title">
							<img src="<?php bloginfo('template_directory');?>/images/icons/title_ico_arrow.png" >
							Nos autres métiers
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="columns medium-10 medium-offset-1">
						<div class="metier_block">  
							<div id="slider_metier" class="slider_metier">
								<?php 
								foreach($metiersC as $post):
									setup_postdata($post); ?>
									<a href="<?php the_permalink(); ?>">
										<div class="metier">
											<div class="img">
												<?php if ( has_post_thumbnail() ) {
														the_post_thumbnail('full');
												}else { ?>
													<img class="img_zoom" src="<?php bloginfo('template_directory');?>/images/img_remplace_mt.jpg">
												<?php } ?>
											</div>
											<div class="titre"><?php the_title(); ?></div>
										</div>
									</a>

								<?php endforeach; ?>

							</div>
						</div>
					</div>
				</div>

			</section>

		<?php 
		endif;
	endwhile ; 
endif; ?>
<!--*******************************     END METIER   -->