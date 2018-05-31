<?php 
/* Template Name: Publications */
require( 'header.php' ); 
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args = array('post_type' => 'publicationsas', 'posts_per_page' => 5, 'paged' => $paged, 'post_status' => 'publish');

if ( isset($_GET['cat_pub']) && $_GET['cat_pub'] != 0 ) {
	 $args['tax_query'] =  array(
		array(
			'taxonomy' => 'type_de_document',
			'field' => 'id',
			'terms' => $_GET['cat_pub']
		)
	);
}
$query = new WP_Query( $args );  ?>

	<?php require( 'template_part/header_part.php'); ?>
	<?php require( 'template_part/fil_ariane.php'); ?>

		<section class="pages sas ">

			<div class="blocfiltre">
				<div class="row">
					<div class="columns medium-12 clearfix">
						<div class="titre">filtrer les publications :<span id="chevron" class="chevron"></span></div>
					</div>
					<div class="filtre">
						<form method="GET" action="<?php echo get_permalink(); ?>">
							<div class="columns medium-5">
								<?php wp_dropdown_categories( array( 'taxonomy' => 'type_de_document', 'hide_empty' => false, 'show_option_all' => 'Tout type de document', 'name' => 'cat_pub', 'selected' => ( isset($_GET['cat_pub']) ) ? $_GET['cat_pub'] : 0 ) ); ?>
							</div>
							<div class="columns medium-4 end">
								<input type="submit" value="Filtrer les publications">
							</div>
						</form>
					</div>
				</div>
			</div>
 
			<div class="sascompetence publications">
				<?php while($query->have_posts()) : $query->the_post(); 
					$terms = get_the_terms( get_the_ID(), 'type_de_document' );
					$terms = $terms[0]; ?>
					<div class="row competence">
						
						<div class="columns large-12 small-12"> <hr> </div>

						<div class="columns large-3 medium-4 small-12">
							<a href="<?php echo get_permalink();?>">
								<div class="img">
								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('full');
								}else { ?>
									<img src="<?php bloginfo('template_directory');?>/images/img_remplace.jpg">
								<?php } ?>
								</div>
							</a>
						</div> 
						<div class="columns large-7 medium-8 small-12 end">
							<div class="pub">
								<div class="sous_titre"><?php echo $terms->name ?></div>
								<a href="<?php echo get_permalink();?>">
									<div class="title"><?php the_title();?></div>
								</a>
								<?php if ( get_field('description_courte') ): ?>
									<div class="desc"><?php echo get_field('description_courte'); ?></div>
								<?php endif ?>
								<div class="pub_bottom">
								<?php if ($terms->term_id == 19) : ?>

										<?php if( get_field('prix') ): ?>
											<div class="prix"><span>Prix :</span> <?php the_field('prix'); ?> €</div>
										<?php endif ?>

										<div class="savoir_plus tout">
											<a href="<?php echo get_permalink();?>">Voir la fiche détaillée<span class="ico_arrow_right"></span></a>
										</div>
									<?php else: ?>

										<?php $fichier_pdf = get_field('fichier_pdf');
										if( $fichier_pdf ): ?>
											<div class="savoir_plus tout">
												<a href="<?php echo $fichier_pdf['url']; ?>" download="<?php echo $fichier_pdf['url']; ?>">Télécharger <span class="ico_arrow_right"></span></a>
											</div>
										<?php endif ?>
										
									<?php endif ?>
								</div>

							</div>
						</div> 
					</div> 
				<?php endwhile; ?>

			</div>

			<?php require( 'template_part/navigation.php' ); ?>
			<?php wp_reset_postdata(); ?>
		</section>

<?php require( 'footer.php' ); ?>