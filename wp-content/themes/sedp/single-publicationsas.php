<?php require( 'header.php' ); ?>
	<?php require( 'template_part/header_part.php'); ?>
	<?php require( 'template_part/fil_ariane.php'); ?>
	
	
	<section class="pages">
			<?php while ( have_posts() ) : the_post(); 
				$terms = get_the_terms( get_the_ID(), 'type_de_document' );
				$terms = $terms[0]; ?>
				<section class="content Publication">

					<div class="row">
						<div class="columns large-9 large-offset-2 medium-12 small-12">
							<?php the_content(); ?>
						</div> 

						<div class="padding_30">
							<div class="columns large-3 large-offset-2 medium-4 small-12">
								<div class="img">
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('full');
									}else { ?>
										<img src="<?php bloginfo('template_directory');?>/images/img_remplace.jpg">
									<?php } ?>
								</div>
							</div> 

							<div class="columns large-4 small-12 medium-5">

								<div class="pub">
									<div class="pub_bottom">
										
										<?php if ($terms->term_id == 19) : ?>

											<?php if( get_field('prix') ): ?>
												<div class="prix"><span>Prix :</span> <?php the_field('prix'); ?> €</div>
											<?php endif ?>

											<?php $bon_de_commande = get_field('bon_de_commande');
											if( $bon_de_commande ): ?>
												<div class="telecharger_commande tout">
													<a href="<?php echo $bon_de_commande['url']; ?>" download="<?php echo $bon_de_commande['url']; ?>">Téléchargez le bon de commande <span class="ico_arrow_right"></span></a>
												</div>
											<?php endif ?>

										<?php else: ?>

											<?php $fichier_pdf = get_field('fichier_pdf');
											if( $fichier_pdf ): ?>
												<div class="left tout margeNon">
													<a href="<?php echo $fichier_pdf['url']; ?>" download="<?php echo $fichier_pdf['url']; ?>" >Télécharger <span class="ico_arrow_right"></span></a>
												</div>
											<?php endif ?>

										<?php endif ?>

									</div>
								</div>
 						

							</div>
							<div class="columns large-3 small-12 medium-3">
								<div class="pub">
									<div class="pub_bottom">
										<div class="savoir_plus tout publication">
											<a href="" id="share_publication">Partager<span class="ico_arrow_right"></span></a>
										</div>
									</div>
								</div>
							</div>
						</div> 

					</div>

					 
				</section>
			<?php endwhile; ?>

			<div class="row"><div class="columns medium-12"><hr></div></div>

			<?php require( 'template_part/post_part/blocPublications.php' );  ?>
		

	</section>

<?php require( 'footer.php' ); ?>