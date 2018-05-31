<?php 
/* Template Name: Plan du site */
get_header(); ?>

	<?php require( 'template_part/header_part.php'); ?>

	<?php require( 'template_part/fil_ariane.php'); ?>

	<?php while (have_posts()) : the_post(); ?>
		
		<section class="pages arbo">
	 
			<div class="row">
				<div class="columns large-3 medium-6">
					<div class="list">
						<div class="page red"> L’entreprise</div>
						<div class="sous_page"> <a href="<?php the_permalink('273'); ?>">Notre histoire</a></div>
						<div class="sous_page"> <a href="<?php the_permalink('275'); ?>">Notre vision</a></div>
						<div class="sous_page"> <a href="<?php the_permalink('278'); ?>">Nos missions</a></div>
						<div class="sous_page"> <a href="<?php the_permalink('207'); ?>">Partenaires</a></div>
						<div class="sous_page"> <a href="<?php the_permalink('383'); ?>">Chiffres clés</a></div>
					</div>
				</div>
				<div class="columns large-3 medium-6">
					<div class="list">
						<div class="page red"> Compétences</div>
						<div class="sous_page"> <a href="<?php echo get_term_link('strategie-de-valorisation-immobiliere', 'competences'); ?>">Stratégie de valorisation immobilière</a></div>
						<div class="sous_page"> <a href="<?php echo get_term_link('audit-et-conseil', 'competences'); ?>">Audit et conseil</a></div>
						<div class="sous_page"> <a href="<?php echo get_term_link('maitrise-douvrage', 'competences'); ?>">Maîtrise d’ouvrage</a></div>
						<div class="sous_page"> <a href="<?php echo get_term_link('exploitation', 'competences'); ?>">Exploitation</a></div>
						<div class="sous_page"> <a href="<?php echo get_term_link('gestion-despaces-evenementiels', 'competences'); ?>">Gestion d’espaces événementiels</a></div>
						<div class="sous_page"> <a href="<?php echo get_term_link('innovation-et-ville-durable', 'competences'); ?>">Innovation et ville durable</a></div>
						<div class="sous_page"> <a href="<?php the_permalink('56'); ?>">Tous les métiers</a></div>
					</div>
				</div>

				<div class="columns large-3 medium-6">
					<div class="list">
						<div class="page red">Références</div>
						<div class="sous_page"> <a href="http://sedp.preprod-wsb.com/nos_references/">Toutes les références</a></div>

						<?php 
							// $query = new WP_Query( array('post_type' => 'projets', 'posts_per_page' => '-1', 'order' => 'DESC', 'orderby' => 'date' ) );
							// while($query->have_posts()) : $query->the_post(); 
						?>
							<!-- <div class="sous_page"> <a href="<?php the_permalink(); ?>"><?php the_title();?></a></div> -->
						<?php //endwhile; ?>  
					</div>
				</div>

				<div class="columns large-3 medium-6">
					<div class="list">
						<div class="page"> <a href="<?php the_permalink('44');  ?>">Actualités</a></div>
						<div class="page"> <a href="<?php the_permalink('186'); ?>">Publications</a></div>
						<div class="page"> <a href="<?php the_permalink('469'); ?>">Recrutement</a></div>
						<div class="page"> <a href="<?php the_permalink('4');   ?>">Contactez-nous</a></div>
						<div class="page"> <a href="<?php the_permalink('85');  ?>">Mensions légales</a></div>
					</div>
				</div>
	 
			</div>
		</section>

	<?php endwhile;?>

<?php get_footer();?>