<!--*******************************     METIER   -->

			<section class="metiers">

				<div class="row">
					<div class="columns medium-12">
						<div class="section_title">
							<img src="<?php bloginfo('template_directory');?>/images/icons/title_ico_arrow.png" >
							Autres publications
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="columns large-10 large-offset-1 medium-12">
						<div class="metier_block">  
							<div id="slider_metier_pub" class="slider_actualites">
								<?php $query = new WP_Query(array('post_type' => 'publicationsas', 'posts_per_page' => 3, 'order' => 'DESC' )); 
								while($query->have_posts()) : $query->the_post(); 
									$terms = get_the_terms( get_the_ID(), 'type_de_document' );
									$terms = $terms[0]; ?>
									<a href="<?php the_permalink(); ?>">
										<div class="metier">
											<div class="img">
												<?php if ( has_post_thumbnail() ) {
													the_post_thumbnail('full');
												}else { ?>
													<img src="<?php bloginfo('template_directory');?>/images/img_remplace.jpg">
												<?php } ?>
											</div>
											<div class="sous_titre"><?php echo $terms->name ?></div>
											<div class="titre"><?php the_title();?></div>
										</div>
									</a>
								<?php endwhile; ?> 
							</div>
						</div>
					</div>
				</div>
			</section>
		<!--*******************************     END METIER   -->
		