<section  class="competences">
	<div class="row">
		<div id="competence" class="slider_padding columns large-offset-1 large-11 medium-offset-1 medium-11">
			<div id="slider_competence" class="slider_competence"> 
				
				<?php 
				$competences = get_terms( array( 'taxonomy' => 'competences', 'hide_empty' => false) );
   				if( $competences ):
					$i = 0;
	   				foreach($competences as $competence):
	   					$image = get_field('image' , $competence);
	   					$i++; ?>

						<div class="img items">
							<img src="<?php echo $image['url']; ?>" title="<?php echo $competence->name;?>">
							<div class="expertiser">
								<span class="num"><?php echo $i; ?></span>
								<div class="titre">
									<?php echo __('nos compétences'); ?>
									<span class="underline"></span> 
								</div>
								<div class="description"><?php echo $competence->name;?></div>
								<div class="desc">
									<?php echo $competence->description;?> 
								</div>
								<div class="tout">
									<!-- <form style="display:none;" id="listMetiers<?php echo '_' . $i; ?>" method="get" action="<?php echo the_permalink( 56 ); ?>">
										<input type="hidden" name="cat_competences" value="<?php echo $competence->term_id; ?>"/>
									</form>
									<a onclick='document.getElementById("listMetiers<?php echo '_' . $i; ?>").submit()'>Découvrez les métiers <span class="ico_arrow_right"></span></a> -->
									<a href="<?php echo get_term_link($competence); ?>" >Découvrez les métiers <span class="ico_arrow_right"></span></a>
								</div>
							</div>
						</div>
						
					<?php endforeach; 
					endif; ?>

			</div>

		</div>
	</div>
</section>