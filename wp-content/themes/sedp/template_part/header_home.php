<?php
if ( have_posts() ) : 
	while ( have_posts() ) : the_post(); 

		
		$realisations = get_field('realisation');
		if( isset( $realisations) && is_array( $realisations ) ){
			$nbr = count($realisations) - 1;
			$n = rand(0,$nbr);
			$realisation = $realisations[$n];
		}
		
		$background  = get_field('background', $realisation->ID);
		$architectes = get_field('architectes', $realisation->ID);

		$nbrArch = count($architectes);
		$i = 0 ;
		$architectesNams = "" ;
		if( $architectes )
			foreach ($architectes as $architecte){
				$i++;
				$architectesNams .= $architecte["nom_architectes"];
				if ($i < $nbrArch) {$architectesNams .= " / "; }
			}
		?>

		<header class="home" style="background: transparent url('<?php echo ($background) ? $background["url"] : "" ;?>') no-repeat 50% / cover ">
			
			<div class="top">

				<?php include( realpath(dirname(__FILE__).'/..').'/searchform.php' );  ?>
				
				
				<div id="menu_burger" class="menu_icon">
					<span class="menu_1"></span>
					<span class="menu_2"></span>
					<span class="menu_3"></span>
				</div>
			</div>
			<?php if ($background): ?>
				<!-- <img class="home_header_image" src="<?php echo $background["url"] ?>"> -->
			<?php else: ?>
				<!-- <img class="home_header_image" src="images/home_header_image.jpg"> -->
			<?php endif ?>
			
			<div class="reference">
				<div class="nom"><?php echo get_the_title($realisation->ID); ?></div>
				<div class="nom_architectes"><?php echo $architectesNams; ?></div>
			</div>

			<div class="container_en_tete">
				<div class="en_tete">
					<a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_directory'); ?>/images/logos/logo_sedp.png" class="logo_sedp"></img></a>
					<div class="titre"><?php the_field('titre'); ?></div>
					<img src="<?php bloginfo('template_directory');?>/images/icons/ico_titre.png" class="ico_titre"></img>
					<a href="http://www.ratp.fr/" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/logos/logo_ratp.png"></a>
				</div>
				<a href="#competence" class="ico_arrow"><img src="<?php bloginfo('template_directory');?>/images/icons/ico_arrow.png" ></a>
			</div>
		</header>

	<?php 
	endwhile ; 
endif; ?>
