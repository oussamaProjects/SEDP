<?php $query = new WP_Query($args); ?>
<?php if ($query->have_posts() ): ?>

	<div class="competenceMetiers">

		<div class="row hr">
			<div class="columns large-9 large-offset-2 medium-12 small-12 "> <hr> </div>
		</div>
		
		<div class="row"> 
			<div class="columns large-9 large-offset-2 medium-12 small-12 entet">
				<div class="h2 black"><?php echo $catName; ?></div>
			</div>
		</div> 

		<div class="sascompetence">
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<div class="row competence">
					<div class="columns large-9 large-offset-2 medium-12 small-12"> <hr> </div> 
					<div class="columns large-3 large-offset-2 medium-5 small-12">
						<div class="img">
							<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('full');
							}else { ?>
								<img class="img_zoom" src="<?php bloginfo('template_directory');?>/images/img_remplace_mt.jpg">
							<?php } ?>
						</div>
					</div> 
					<div class="columns large-5 medium-7 small-12 end">
						<div class="pub">
							<div class="redtitle"><?php the_title(); ?></div>
							<div class="desc"><?php the_field('description'); ?></div>
							<div class="pub_bottom"> 
								<div class="savoir_plus tout">
									<a href="<?php the_permalink(); ?>">En savoir plus <span class="ico_arrow_right"></span></a>
								</div>
							</div>
						</div>
					</div> 
					
				</div>
			<?php endwhile; ?> 
		</div>

	</div>

<?php endif ?>