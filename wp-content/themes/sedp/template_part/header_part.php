<?php 
$thisCategory 				= get_queried_object();
if(is_search())
	$BG = get_field('visuel','505');
else if ($thisCategory ) 
	$BG = get_field('visuel',$thisCategory );
else
	$BG = get_field('visuel');
?>
 <!-- bloginfo('template_directory'). "/images/home_header_image_arbo.jpg" -->
<header class="pages" style="background: transparent url('<?php echo ($BG) ? $BG["url"] : "" ;?>') no-repeat 50% 0% / cover ">
	
	<div class="top">
	
		<div class="logo">
			<a href="/index.php">
				<img src="<?php bloginfo('template_directory');?>/images/logos/logo_pages.png"></img>
			</a>
		</div>
		
		
		<?php include( realpath(dirname(__FILE__).'/..').'/searchform.php' );  ?>
		
		
		<div id="menu_burger" class="menu_icon">
			<span class="menu_1"></span>
			<span class="menu_2"></span>
			<span class="menu_3"></span>
		</div>
		
	</div>

	<div class="row">
		<div class="columns medium-8 medium-centered">
			<h1 class="titre_pages">
				<?php 
				if(is_search())
					echo "Résultats de recherche";
				else if ( is_singular( 'projets' ) )
					echo get_the_title(); 
				else if ( $thisCategory && !is_page() && !is_single() )
					echo $thisCategory->name;  
				else
					the_title();
				

				?>
			</h1>
		</div>
	</div>
	
</header>