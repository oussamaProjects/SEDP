<?php 
/* Template Name: Metiers */
require( 'header.php' ); 
$taxonomy 	= 'competences';
$taxonomy2 	= 'type_metiers';
?>

	<?php require( 'template_part/header_part.php'); ?>
	<?php require( 'template_part/fil_ariane.php'); ?>

	<section class="pages">

			<div class="blocfiltre">
				<div class="row">

					<div class="columns medium-12 clearfix">
						<div class="titre">filtrer les métiers : <span id="chevron" class="chevron"></span></div>
					</div>

					<div class="filtre">
							<div class="columns large-4 medium-5">
								<form method="get" action="<?php echo get_permalink(); ?>" id="frmCompetences" >
									<?php wp_dropdown_categories( array( 'taxonomy' => $taxonomy, 'hide_empty' => false, 'show_option_all' => 'Toutes les compétences', 'name' => 'cat_competences', 'selected' => (isset($_GET['cat_competences'])) ? $_GET['cat_competences'] : 0) ); ?>
								</form>
							</div>
							<div class="columns medium-4 end">
								<form method="get" action="<?php echo get_permalink(); ?>" id="frmType_metiers" >
									<?php wp_dropdown_categories( array( 'taxonomy' => $taxonomy2, 'hide_empty' => false, 'show_option_all' =>  'Tous les types', 'name' => 'type_metiers', 'selected' => (isset($_GET['type_metiers'])) ? $_GET['type_metiers'] : 0) ); ?>
								</form>
							</div>
						</form>
					</div>

				</div>
			</div>


				<section class="content">
					<?php 

						$args = array('post_type' => 'metiersas', 'order' => 'DESC', 'orderby' => 'date', 'post_status' => 'publish' );

						$categories = get_terms( array('taxonomy' => $taxonomy, 'hide_empty' => false, 'post_type' => 'metiersas') );
						$categories2 = get_terms( array('taxonomy' => $taxonomy2, 'hide_empty' => false, 'post_type' => 'metiersas') );

						if ($categories) {

							if ( isset($_GET["cat_competences"]) && $_GET["cat_competences"] != 0 ) {

								$args['tax_query'] =  array(
									array(
										'taxonomy' => $taxonomy,
										'field' => 'id'
									)
								);

								$id = $_GET['cat_competences'];

								$args['tax_query'][0]['terms'] = $id ;
								$categorieTerm = get_term_by('id', $id, $taxonomy, 'ARRAY_A');
								$catName = $categorieTerm['name'];
								include( 'template_part/post_part/Metiers.php' ); 

							}

						}

						if ($categories2) {

							if ( isset($_GET["type_metiers"]) && $_GET["type_metiers"] != 0 ) {

								$args['tax_query'] =  array(
									array(
										'taxonomy' => $taxonomy2,
										'field' => 'id'
									)
								);

								$id = $_GET['type_metiers'];

								$args['tax_query'][0]['terms'] = $id ;
								$categorieTerm = get_term_by('id', $id, $taxonomy2, 'ARRAY_A');
								$catName = $categorieTerm['name'];
								include( 'template_part/post_part/Metiers.php' ); 

							}

						}

						if ( (!isset($_GET["cat_competences"]) || $_GET["cat_competences"] == 0 )&& (!isset($_GET["type_metiers"]) || $_GET["type_metiers"] == 0) ){

							$args['tax_query'] =  array(
								array(
									'taxonomy' => $taxonomy,
									'field' => 'id'
								)
							);

							foreach ($categories as $categorie): 

								$catName = $categorie->name;
								$args['tax_query'][0]['terms'] = $categorie->term_id;
								include( 'template_part/post_part/Metiers.php' ); 
							endforeach; 

						}


					?>
				</section>


	</section>
	<script type="text/javascript">

		$(document).ready(function () {

			$('#cat_competences').change(function(){
				$('#frmCompetences').submit();
			});

			$('#type_metiers').change(function(){
				$('#frmType_metiers').submit();
			}) ;

		});

	</script>

<?php require( 'footer.php' ); ?>