<?php 
/* Template Name: Postuler */
require( 'header.php' ); ?>

	<?php require( 'template_part/header_part.php'); ?>

	<?php require( 'template_part/fil_ariane.php'); ?>

	<?php 
		$titre = "";
		if(!empty(get_query_var("offre",""))){
			$args = array(
				'numberposts'	=> -1,
				'post_type'		=> 'offre_recrutement',
				'meta_key'		=> 'reference',
				'meta_value'	=> get_query_var("offre","")
			);
			$the_query = new WP_Query( $args );
			while( $the_query->have_posts() ) : $the_query->the_post();
				$titre = "Votre candidature pour le poste de « ".get_the_title()." »";
			endwhile;
		}else{
			$titre = "Votre candidature spontanée";
		}

	?>
	
	<?php while (have_posts()) : the_post(); ?>
		<section class="pages contact postuler">
			<div class="row">

				<div class="columns large-8 large-offset-2 medium-12 small-12">
					
						<div class="entet">
							
							<div class="h2"><?php echo $titre ?></div>
							<p class="first"> Vous êtes intéressé par une de nos offres d’emploi ?  Renseignez ce formulaire, notre équipe vous répondra dans les plus brefs délais.</p>
						</div>

						<div class="form">
							<?php the_content();?>
						</div>

				</div> 

			</div>
		</section>
	<?php endwhile;?>

<?php require( 'footer.php' ); ?>

<script type="text/javascript">
	
	function preloadFunc()
    {
        $('#position_reponse_input').attr('disabled', 'disabled');
        $('#position_reponse').toggleClass( "hide_postuler" );
		$("#offres_spontanee").toggleClass( "hide_postuler" );
		<?php if(!empty(get_query_var("offre",""))){ ?>
			$('#position_reponse_input').val("<?php echo get_query_var("offre","") ?>");
			$('#position_reponse_input').attr('value', '<?php echo get_query_var("offre","") ?>');
			$('#position_reponse').toggleClass( "show_postuler" );
			$("#offres_spontanee").toggleClass( "hide_postuler" );
		<?php }else{ ?>
			$('#position_reponse_input').val("");
			$('#position_reponse').toggleClass( "hide_postuler" );
			$("#offres_spontanee").toggleClass( "show_postuler" );
		<?php } ?>
    }
    window.onpaint = preloadFunc();


    $("#cv-file").change(function(){
	  var filename = $(this).val().split('\\').pop();
	    $("#cv-file-label").html(filename);
	});
	$("#motiv-file").change(function(){
	  var filename = $(this).val().split('\\').pop();
	    $("#motiv-file-label").html(filename);
	});

	

</script>