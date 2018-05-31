<!--*******************************     PROJETS   -->
<?php 
$tag_ids = array();
$postID = get_the_id();
if ( isset($post->metierPrincipal) && $post->metierPrincipal != 0 ){ 

	$tag_ids[] = $post->metierPrincipal;

}else{

	$tags = wp_get_post_tags($postID);
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

}

$args 	= array('post_type' =>'projets', 'posts_per_page' => 3, 'orderby' => 'rand','tag__in' => $tag_ids,'post__not_in' => array($postID));
$query 	= new WP_Query( $args ); ?>
<?php if ($query->have_posts()): $i=0; ?>
	<section class="projets">

		<div class="row">
			<div class="columns medium-12">
				<div class="section_title">
					<img src="<?php bloginfo('template_directory');?>/images/icons/title_ico_arrow.png" >
					Autres références
				</div>
			</div>
		</div>

		<div class="row">
			<div class="columns medium-12">

				<div id="page_slider_projets" class="slider_projets">

					<?php while($query->have_posts()) : $query->the_post(); ?>

						<div class="item single_projet <?php echo ($i % 2 == 0 ) ? 'black' : 'red' ;  ?> ">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('full' , array( 'class' => 'lazyOwl' )); ?>											
							</a>
							<div class="sous">

								<?php 
									$metierTags = get_the_tags(); 

									if ( isset($post->metierPrincipal) ){ 
										foreach ($metierTags as $metierTag){

											if ( $post->metierPrincipal == $metierTag->term_id ) {	
												$posttags = $metierTag ; 
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

						<?php $i++; endwhile; ?>

					</div>

				</div>
			</div>

			<div class="row">
				<div class="columns large-offset-9 large-3 medium-offset-8 medium-4 small-12">
					<div class="tout"><a href="<?php echo get_permalink('46'); ?>">Toutes nos références<span class="ico_arrow_right"></span></a></div>
				</div> 
			</div>
		</section>		
<?php endif ?>

<!--*******************************     END PROJETS   -->