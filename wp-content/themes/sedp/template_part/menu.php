<div id="menu_container" >
	<div id="shadow"></div>
	<aside id="side-menu" >
		<div class="close"><span></span></div>
		<?php wp_nav_menu( array('theme_location' => 'menu')); ?>
		<?php wp_nav_menu( array(
			'theme_location' => 'menu_bottom',
			'menu_class'=> 'bottom'
			) ); 
		?>
		<img src="<?php bloginfo('template_directory');?>/images/logos/logo_sidebar.png" class="logo_sidebar">
	</aside>
</div>