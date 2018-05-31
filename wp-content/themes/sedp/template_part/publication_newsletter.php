<div class="publication_newsletter">

	<div class="publication">
		<div class="row">
			<div class="columns large-offset-3 large-9  medium-12 small-12 box">
				<div class="title"><?php echo __('Dernière publication'); ?> <span class="underline"></span> </div>


				<?php $publication = get_field('publication' , 66);
				if($publication): 

					foreach($publication as $post):
						setup_postdata($post); ?>
						<div class="bloc">

							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) :
									the_post_thumbnail('full');
								else: ?>
									<img src="<?php bloginfo('template_directory');?>/images/publication.jpg">
								<?php endif; ?>
							</a>
							<div class="titre_bloc"><?php echo the_title(); ?></div>

						</div>
					<?php 
					endforeach;

					wp_reset_postdata(); 
				endif;?>



			</div>
		</div> 
	</div>

	<?php 
	$desactiver = get_field_object('desactiver');
	$true 		= $desactiver['value'];
	if ( !$true ) : ?>
		 
		<div class="newsletter_bloc">
			<div class="row">
				<div class="columns large-12 small-12">
					<div class="title"><?php echo __('Notre Newsletter'); ?><span class="underline"></span> </div>
					<div class="description"><?php echo __('Recevez nos dernières actualités par e-mail.'); ?></div>
					

					<?php 
						echo do_shortcode( '[contact-form-7 id="514" title="Newsletter"]' ); 
						// dynamic_sidebar('Newsletter');
					?>

				</div>
				
			</div> 
		</div> 

	<?php else: ?>

		<div class="chiffres_cles">
			<div class="row">
				<div class="columns large-12 small-12">
					<div class="title"><?php echo __('Nos Chiffres-clés'); ?> <span class="underline"></span> </div>
					<div class="description"><?php echo __('Découvrir les chiffres-clés de la SEDP'); ?> </div>
					<div class="tout"><a href="<?php the_permalink('383'); ?>"><?php echo __('En savoir plus'); ?> <span class="ico_arrow_right"></span></a></div>
				</div>
			</div> 
		</div> 

	<?php endif; ?>
	
</div>
