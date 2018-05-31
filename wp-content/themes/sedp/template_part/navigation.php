<?php if ($query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
	<div class="row">
		<div class="columns medium-12 small-12">
			<div class="navigation">
			    <div class="previous"><?php echo get_previous_posts_link( 'Page précédente' ); // display newer posts link ?></div>
			    <div class="next"><?php echo get_next_posts_link( 'Page suivante', $query->max_num_pages ); // display older posts link ?></div>
			</div>
		</div>
</div>
<?php } ?>