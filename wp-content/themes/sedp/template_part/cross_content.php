<?php 
$thisCategory = get_queried_object();

if ( is_search()) :

	$cross_content = get_field('cross_content','505' );
if($cross_content): 
	foreach($cross_content as $post):
		setup_postdata($post); 				
	$backgroundcc = get_field('backgroundcc'); ?>

	<div class="cross_content" style="background: url('<?php echo $backgroundcc['url']; ?>') no-repeat 50% 0% / cover;">
		<div class="row">
			<div class="columns large-offset-6 large-5 medium-offset-4 medium-8 small-12">
				<div class="cross_content_box">
					<div class="description"><?php the_field('description'); ?></div>
					<div class="tout"><a href="<?php the_field('lien_page'); ?>"><?php the_field('titre_lien'); ?> <span class="ico_arrow_right"></span></a></div>
				</div>
			</div> 
		</div>
	</div>

	<?php 
	endforeach;
	wp_reset_postdata(); 
	endif; 


	elseif ( ( $thisCategory && !is_page() ) || is_search()) :

		$cross_content = get_field('cross_content',$thisCategory );
	if($cross_content): ?>

	<?php 
	foreach($cross_content as $post):
		setup_postdata($post); 				
		$backgroundcc = get_field('backgroundcc'); ?>

	<div class="cross_content" style="background: url('<?php echo $backgroundcc['url']; ?>') no-repeat 50% 0% / cover;">
		<div class="row">
			<div class="columns large-offset-6 large-5 medium-offset-4 medium-8 small-12">
				<div class="cross_content_box">
					<div class="description"><?php the_field('description'); ?></div>
					<?php if (get_field('lien_page_externe')): ?>
						<div class="tout"><a href="<?php the_field('lien_page_externe'); ?>"><?php the_field('titre_lien'); ?> <span class="ico_arrow_right"></span></a></div>
					<?php else: ?>
						<div class="tout"><a href="<?php the_field('lien_page'); ?>"><?php the_field('titre_lien'); ?> <span class="ico_arrow_right"></span></a></div>
					<?php endif ?>
				</div>
			</div> 
		</div>
	</div>

	<?php 
	endforeach;
	wp_reset_postdata(); 
	endif; 


	elseif ( have_posts() ) : 
		while ( have_posts() ) : the_post();

			$cross_content = get_field('cross_content');
			if($cross_content):
				foreach($cross_content as $post):
					setup_postdata($post); 				
				$backgroundcc = get_field('backgroundcc'); ?>

				<div class="cross_content" style="background: url('<?php echo $backgroundcc['url']; ?>') no-repeat 50% 0% / cover;">
					<div class="row">
						<div class="columns large-offset-6 large-5 medium-offset-4 medium-8 small-12">
							<div class="cross_content_box">
								<div class="description"><?php the_field('description'); ?></div>
								<div class="tout"><a href="<?php the_field('lien_page'); ?>"><?php the_field('titre_lien'); ?> <span class="ico_arrow_right"></span></a></div>
							</div>
						</div> 
					</div>
				</div>

				<?php 
				endforeach;
				wp_reset_postdata(); 
			endif;
		endwhile ; 
	endif; ?>

