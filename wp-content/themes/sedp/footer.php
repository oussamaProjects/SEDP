	<footer>

		<?php require( 'template_part/cross_content.php' ); ?>
		
		<?php if (is_front_page()) require( 'template_part/publication_newsletter.php' ); ?>

		<?php require( 'template_part/footer_part.php' ); ?>
		
	</footer>
	
	<?php require( 'template_part/menu.php' ); ?>
	

</div>

	<script type="text/javascript">   var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>"; </script>
	<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/script.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$carousel.trigger('owl.goTo', <?php echo ( isset($thisCategoryterm_order) && $thisCategoryterm_order != $count_terms ) ? $thisCategoryterm_order : 0 ; ?>) 
		});
	</script>

	<?php wp_footer(); ?>
	<!-- ajax loader -->
	<div id="ajaxShadow">
		<div id="ajaxloader"></div>
	</div>

</body>
</html>