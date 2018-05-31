
<div class="row" >
	<?php $a = 0 ;
	if ($query->have_posts()) :
		while($query->have_posts()) : $query->the_post(); ?>
			<div class="columns large-4 medium-6 small-12 end">
				<div class="single_projet <?php echo ($a % 2 == 0 ) ? 'black' : 'red' ;  ?> ">
					<a href="<?php echo get_permalink();?>">
						<?php the_post_thumbnail('full' , array( 'class' => 'lazyOwl' )); ?>
					</a>
					<div class="sous">

						<?php 
						$metierTags = get_the_tags(); 
						if ( isset($query->post->metierPrincipal) && $query->post->metierPrincipal != 0 ){ 
							foreach ($metierTags as $metierTag){

								if ( $query->post->metierPrincipal == $metierTag->term_id ) {	
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
			</div>
		<?php $a++; endwhile; 
	endif; ?>

	<?php if($remaining>0){ ?>
		<div class="columns large-4 medium-6 small-12 end">
			<div class="single_projet black autre_realisation">
				<a href="" id="plusProjects">
					<img src="<?php bloginfo('template_directory');?>/images/silder_projets/plus_realisation.jpg">
					<div class="plus_realisation">
						<div class="plus" data-ifremaining="<?php echo $if_remaining ?>" data-viewed="<?php echo $viwed ?>" data-pagination="<?php echo $pagination ?>" data-remaining="<?php echo $remaining ?>"><span>+</span><?php echo $remaining ?></div>
						<div class="slug_plus">autres références</div>
					</div>
				</a>
			</div>
		</div> 
	<?php }else{ ?>

		<input type="hidden" class="plus" data-ifremaining="<?php echo $if_remaining ?>" data-viewed="<?php echo $viwed ?>" data-pagination="<?php echo $pagination ?>" data-remaining="<?php echo $remaining ?>" /> 

	<?php } ?>
</div>