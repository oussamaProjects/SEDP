<?php 
/* Template Name: Actualites */
require( 'header.php' ); 
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args = array('post_type' => 'actualites', 'posts_per_page' => 7, 'paged' => $paged, 'post_status' => 'publish');

if ( isset($_GET["cat_actualites"]) && $_GET["cat_actualites"] != 0 ) : 
	 $args['tax_query'] =  array(
		array(
			'taxonomy' => 'competences',
			'field' => 'id',
			'terms' => $_GET['cat_actualites']
		)
	);
endif;

if ( isset($_GET["date_actu"]) && !empty($_GET["date_actu"] ) ) :
	// $date = explode("/", $_GET["date_actu"]); 
	$date = $_GET["date_actu"]; 
	$args['date_query'] =  array(
		array(
			'year'  => $date,
			// 'monthnum' => $date[1],
			// 'day'   => $date[0],
		),
	);

endif;

$query = new WP_Query( $args ); 
//print_r($query) ;
?>

	<?php require( 'template_part/header_part.php'); ?>
	<?php require( 'template_part/fil_ariane.php'); ?>

		<section class="pages sas articles">

			<div class="blocfiltre">
				<div class="row">
					<div class="columns medium-12 clearfix">
						<div class="titre">filtrer les articles :<span id="chevron" class="chevron"></span></div>
					</div>
					<div class="filtre">
						<form method="get" action="<?php echo get_permalink(); ?>">
							<div class="columns medium-4"> 

								<?php 
									$args = array(
										'post_type'    => 'actualites',
										'type'         => 'yearly',
										'echo'         => 0,
								        'format' => 'costum', 
								        'before' => '',
								        'after' => '____',
								        'show_post_count' => false
									); ?>


								
								<select name="date_actu" id="dateActu" placeholder="Toutes les dates">
									<option value="0">Toutes les dates</option>
									<?php $years = wp_get_archives( $args );
									$years = trim($years);
									$years = explode('____', $years); ?>

									<?php foreach ($years as $year): $year = trim(strip_tags($year));?>
										<?php if ( !empty($year) ): ?>
										<option 
											value="<?php echo $year; ?>"  
											<?php echo ( isset($_GET["date_actu"])  && $_GET["date_actu"] == $year ) ? 'selected="selected"' : '' ; ?> ><?php echo $year; ?> </option>
										<?php endif ?>
									<?php endforeach ?>
								</select> 
										
							</div>
							<div class="columns medium-4 end">
								<?php wp_dropdown_categories( array( 'taxonomy' => 'competences', 'hide_empty' => false, 'show_option_all' => 'Toutes les compétences','name' => 'cat_actualites', 'selected' => (isset($_GET['cat_actualites']) ? $_GET['cat_actualites'] : 0)) ); ?>
							</div>
							<div class="columns larg-3 medium-4 end">
								<input type="submit" value="Filtrer les actualités">
							</div>
						</form>
					</div>
				</div>
			</div>
 
			<div class="sascompetence sasactualites">
			
				<?php while($query->have_posts()) : $query->the_post(); ?>
					<div class="row competence article">
						<div class="columns medium-12 small-12"> <hr> </div> 
						<a href="<?php echo get_permalink();?>">
							<div class="columns medium-3 small-12">
								<div class="img">
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('medium' , array( 'class' => 'img_zoom' ));
									}else { ?>
										<img class="img_zoom" src="<?php bloginfo('template_directory');?>/images/img_remplace.jpg">
									<?php } ?>
								</div>
							</div> 
						</a>
						<div class="columns medium-7 small-12 end">
							<div class="pub">
								<div class="date"><?php echo get_the_date();?></div>
								<a href="<?php echo get_permalink();?>">
									<div class="redtitle"><?php the_title();?></div>
								</a>
								<div class="desc"><?php the_field('description_courte'); ?></div>
							</div> 
						</div>
					</div>
				<?php endwhile; ?>
	
			</div>
			
			<?php require( 'template_part/navigation.php' ); ?>
			<?php // wp_reset_postdata(); ?>

		</section>

<?php require( 'footer.php' ); ?>