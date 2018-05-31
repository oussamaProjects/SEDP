<?php 
while ( have_posts() ) : the_post(); 
$projets = get_field('realisations');
if($projets): $a=0 ; ?>

<section class="projets slider">

	<div class="row">
		<div class="columns medium-12">
			<div class="section_title">
				<img src="<?php bloginfo('template_directory');?>/images/icons/title_ico_arrow.png" >
				<?php the_field('phrase_accroche'); ?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="slider_projets_container columns medium-12">
			<div id="slider_projets" class="slider_projets">

				<?php 
				foreach($projets as $post):
					setup_postdata($post); ?>
				<div class="item single_projet <?php echo ($a % 2 == 0 ) ? 'black' : 'red' ;  ?> ">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full' , array( 'class' => 'lazyOwl' )); ?></a>
					<div class="sous">
						<?php 
						$metierTags = get_the_tags(); 
						if ( isset($post->metierPrincipal) && $post->metierPrincipal != 0 ){ 
							foreach ($metierTags as $metierTag){

								if ( $post->metierPrincipal == $metierTag->term_id ) {	
									$posttags = $metierTag;
									break;
								}
							}
						}else{	
							$posttags = $metierTags[0] ; 
						}  
						?>
						<a href="<?php bloginfo('url');?>/nos_references/<?php echo $posttags->term_id ?>">
							<div class="titre"><?php echo $posttags->name ?><span class="underline"></span> </div>
						</a>
						<a href="<?php the_permalink(); ?>">
							<div class="description"><?php the_title();?></div>
						</a>
					</div>
				</div>
				<?php $a++; endforeach; ?>

			</div>

			<div class="tout">
				<a href="<?php echo get_permalink('46'); ?>">Toutes nos références <span class="ico_arrow_right"></span></a>
			</div>
		</div>
	</div>

</section>

<?php wp_reset_postdata();  
endif;
endwhile ;  ?>
