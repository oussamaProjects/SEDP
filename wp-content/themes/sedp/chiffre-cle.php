<?php 
/* Template Name: chiffre-cle */
require( 'header.php' );  ?>
<?php require( 'template_part/header_part.php'); ?>
<?php require( 'template_part/fil_ariane.php'); ?>

<section class="pages">

		<section class="content">
			<div class="row entet">
				<?php 
				while(have_posts()) : the_post(); ?>
					<div class="columns large-9 large-offset-2 medium-12 small-12">

						<?php the_content(); ?>
					
					</div>
					 <div class="columns medium-12"> <br> </div> 
					<?php
				endwhile;

				$terms = get_terms( 'type_chiffre' );
				$i = 0;
				$j = 0;
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
				    
				    foreach ( $terms as $term ) {
				    	$i = 1; ?>
				        	<div class="row chiffres">
				        		<div class="columns large-3 large-offset-2 medium-6 small-12">
									<div class="chiffre chiffre-cat ">
										<div class="centre">	
											<span><?php echo $term->name ?></span>
										</div>	
									</div>
								</div>
				        		<?php 
				        			$args = array(
									'post_type' => 'chiffres',
									'tax_query' => array(
									    array(
										    'taxonomy' => 'type_chiffre',
										    'field' => 'id',
										    'terms' => $term->term_id
									     )
									  ),
									'orderby'=> 'post_date',
									'order' => 'asc',
									'posts_per_page' => -1
									);
									$query = new WP_Query( $args ); 
									while($query->have_posts()) : $query->the_post();
										
										$classes = "";
										if($i%3 == 0)
											$classes = "large-offset-2";
										if($query->found_posts == $i)
											$classes = "end"; ?>

										<div class="columns large-3 medium-6 small-12 <?php echo $classes ?>">
											<div class="chiffre chiffre-item <?php echo get_field('couleur'); ?>">
												<div class="centrage">	
													<?php the_post_thumbnail('full') ?>
													<p><?php the_title(); ?></p>
													<span><?php echo strip_tags(get_the_content()); ?></span>
												</div>
											</div>
										</div>

									<?php $i++;endwhile; ?>
				        	</div>
				        <?php
				        $i = 0;
				    }
				}
				?>

		</section>

</section>

<?php require( 'footer.php' ); ?>