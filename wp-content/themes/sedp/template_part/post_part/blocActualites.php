<?php 
$postID = get_the_id();
$args = array('post_type' => 'actualites', 'posts_per_page' => 3,'post__not_in' => array($postID), 'order' => 'DESC');
$query = new WP_Query( $args ); ?>

<!--*******************************     ACTUALITES   -->
<?php if ($query->have_posts()) : ?>
	<section class="actualites">
		<div class="row">
			<div class="columns medium-12">
				<div class="section_title">
					<img src="<?php bloginfo('template_directory');?>/images/icons/title_ico_arrow.png" >
					Autres actualités
				</div>
			</div>
		</div>

		<div class="row">
			<div id="slider_actualites" class="slider_actualites">
				<?php while($query->have_posts()) : $query->the_post(); ?>
					<div class="item columns medium-4 bloc">
						<a href="<?php echo get_permalink(); ?>">
							<div class="img">
								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('full' , array( 'class' => 'img_zoom' ));
								}else { ?>
									<img class="img_zoom" src="<?php bloginfo('template_directory');?>/images/img_remplace.jpg">
								<?php } ?>
							</div>
							<div class="titre"><?php the_title();?></div>
							<div class="description"><?php echo get_the_date();?></div>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		</div>

		<div class="row">
			<div class="columns medium-12">
				<div class="tout">
					<a href="<?php echo get_permalink('44'); ?>">Toutes les actualités <span class="ico_arrow_right"></span></a>
				</div>
			</div> 
		</div>
	</section>
<?php endif; ?>
<!--*******************************     END ACTUALITES   -->
